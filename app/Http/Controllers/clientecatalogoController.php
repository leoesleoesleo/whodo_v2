<?php

namespace App\Http\Controllers;

use App\sugerircategoria;
use Illuminate\Http\Request;
use App\User;
use App\Portafolio;
use App\Categoria;
use App\producto;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductoImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class clientecatalogoController extends Controller
{
    public function index (){
        $proveedorNuevo = 0;
        $cantProv = User::where('esEmpresa', '=', 1)->count();
        $provDetails = User::where('esEmpresa', '=', 1)->get();
        $date = date("Y-m-d", strtotime("-2 months"));

        $portafolioCategorias = DB::table('portafolios')
            ->join('categorias', 'portafolios.idCategoria', '=', 'categorias.idCategoria')
            ->select('portafolios.portafolio', 'categorias.nombreCategoria')
            ->where('portafolios.idUser', '=', Auth::id())
            ->get();

        $newDetailsProv = DB::table('users')
            ->where('esEmpresa', '=', 1)
            ->whereBetween('created_at', [$date, date("Y-m-d")])->get();

        foreach ($newDetailsProv as $cant){
            if($cant->esEmpresa == 1)
                $proveedorNuevo += 1;
        }

        $userId = Auth::id();
        $info = User::where('idUser', '=', $userId)->get();
        $categoria = Categoria::all();
        $calificacion = DB::table('calificacion')->get();
        $ciudad = DB::table('users')
            ->select('ciudad', 'idUser')
            ->where('esEmpresa', '=', 1)
            ->distinct()
            ->get();
        $productos = producto::all();
        $portafolio = Portafolio::where('idUser', '=', $userId)->get();

        return view ('cliente.clientecatalogo')
            ->with('cantProv', $cantProv)
            ->with('details', $provDetails)
            ->with('newCantProv', $proveedorNuevo)
            ->with('newDetailsProv', $newDetailsProv)
            ->with('info', $info)
            ->with('categoria', $categoria)
            ->with('portafolioCategoria', $portafolioCategorias)
            ->with('calificacion', $calificacion)
            ->with('ciudad', $ciudad)
            ->with('producto', $productos)
            ->with('portafolio', $portafolio);
    }

    public function createCatalogo(Request $request){
        $portafolio = new Portafolio;
        $portafolio->portafolio = $request->nombreportafolio;
        $portafolio->activo = 1;
        $portafolio->idUser = Auth::id();
        $portafolio->idCategoria = $request->categoriaid;
        $portafolio->save();

        $portafolioCategorias = DB::table('portafolios')
            ->join('categorias', 'portafolios.idCategoria', '=', 'categorias.idCategoria')
            ->select('portafolios.portafolio', 'categorias.nombreCategoria')
            ->where('portafolios.idUser', '=', Auth::id())
            ->get();

        return $portafolioCategorias;
    }

    public function cargarExcel(){
        $request = request()->portafolio;
        Excel::import(new ProductoImport, request()->file('cargaMasivaP'));
        $port = producto::where('nombrePortafolio', '=', $request)->get();
        foreach($port as $productos){
            $idPortafolio = DB::table('portafolios')->where('portafolio', '=', $productos->nombrePortafolio)->get();
            DB::table('portafolioproductos')->insert([
                [
                    'idProducto' => $productos->idProducto,
                    'idPortafolio' => $idPortafolio[0]->idPortafolio
                ]
            ]);
            DB::table('categoriaproductos')->insert([
                [
                    'idCategoria' => $idPortafolio[0]->idCategoria,
                    'idProducto' => $productos->idProducto
                ]
            ]);
        }
        return back();
    }

    public function sugerirCategoria(Request $request){
        $sugerencia = new sugerircategoria;
        $sugerencia->nombreCategoria = $request->nomCategoria;
        $sugerencia->save();
    }

    public function createCategoria(Request $request){
        $categoria = new Categoria;
        $categoria->nombreCategoria = $request->nomCategoria;
        $categoria->activo = 1;
        $categoria->save();
        DB::table('sugerircategorias')->where('idSugerirCategoria', '=', $request->idCategoria)->delete();
    }

    public function deleteCategoria(Request $request){
        sugerircategoria::destroy($request->idCategoria);
    }

    public function searchFilter(Request $request){

        $producto = $request->productoselect;
        $precioini = intval($request->rangoprecioini);
        $preciofin = intval($request->rangopreciofin);
        $calificacion = intval($request->calificacionselect);
        $ciudad = $request->ciudadselect;
        $productoSeleccionado = DB::table('users')
            ->select(DB::raw('users.*'))
            ->join('calificacion', 'users.idUser', '=', 'calificacion.idUser')
            ->join('portafolios', 'users.idUser', '=', 'portafolios.idUser')
            ->join('categorias', 'portafolios.idCategoria', '=','categorias.idCategoria')
            ->join('categoriaproductos', 'categorias.idCategoria', '=', 'categoriaproductos.idCategoria')
            ->join('productos', 'categoriaproductos.idProducto', '=', 'productos.idProducto')
            ->where('productos.nombre', '=', $producto)
            ->whereBetween('productos.precio', [$precioini, $preciofin])
            ->where('calificacion.calificacion', '=', $calificacion)
            ->where('users.ciudad', '=', $ciudad)
            ->get();

        return json_encode($productoSeleccionado);
    }

    public function c_cargaproductos(){
        /*
        $data['producto']    = $request->producto;
        $data['precio']      = $request->precio;

        print_r($data);die();
        */
        print_r('hola');die();


    }
}
