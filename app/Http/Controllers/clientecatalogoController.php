<?php

namespace App\Http\Controllers;

use App\sugerircategoria;
use Illuminate\Http\Request;
use App\User;
use App\Portafolios;
use App\Categorias;
use App\productos;
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

        $newDetailsProv = DB::table('users')
            ->where('esEmpresa', '=', 1)
            ->whereBetween('created_at', [$date, date("Y-m-d")])->get();

        foreach ($newDetailsProv as $cant){
            if($cant->esEmpresa == 1)
                $proveedorNuevo += 1;
        }

        $userId = Auth::id();
        $info = User::where('idUser', '=', $userId)->get();
        $categoria = Categorias::all();
        $calificacion = DB::table('calificacion')->get();
        $ciudad = DB::table('users')
            ->select('ciudad')
            ->where('esEmpresa', '=', 1)
            ->distinct()
            ->get();
        $productos = productos::all();
        $portafolio = Portafolios::where('idUser', '=', $userId)->get();

        return view ('cliente.clientecatalogo')
            ->with('cantProv', $cantProv)
            ->with('details', $provDetails)
            ->with('newCantProv', $proveedorNuevo)
            ->with('newDetailsProv', $newDetailsProv)
            ->with('info', $info)
            ->with('categoria', $categoria)
            ->with('calificacion', $calificacion)
            ->with('ciudad', $ciudad)
            ->with('producto', $productos)
            ->with('portafolio', $portafolio);
    }

    public function createCatalogo(Request $request){
        $portafolio = new Portafolios;
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

    /*public function cargarExcel(){
        $request = request()->portafolio;
        Excel::import(new ProductoImport, request()->file('cargaMasivaP'));
        $port = productos::where('nombrePortafolio', '=', $request)->get();
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
    }*/

    public function sugerirCategoria(Request $request){
        $sugerencia = new sugerircategoria;
        $sugerencia->nombreCategoria = $request->nomCategoria;
        $sugerencia->save();
    }

    public function createCategoria(Request $request){
        $categoria = new Categorias;
        $categoria->nombreCategoria = $request->nomCategoria;
        $categoria->activo = 1;
        $categoria->save();
        DB::table('sugerircategorias')->where('idSugerirCategoria', '=', $request->idCategoria)->delete();
    }

    public function deleteCategoria(Request $request){
        sugerircategoria::destroy($request->idCategoria);
    }

    public function searchFilter(Request $request){
        $calificacion = intval($request->calificacionselect);
        $producto = $request->productoselect;
        $ciudad = $request->ciudadselect;
        $precioInicial = $request->texrangoprecioini;
        $precioFinal = $request->texrangopreciofin;
        if($calificacion == "-- Calificación --" && $ciudad == "-- Ciudad --"  && $precioInicial == null){
            $productoSeleccionado = DB::table('users')
            ->select(DB::raw('users.*'))
            ->leftJoin('calificacion', 'users.idUser', '=', 'calificacion.idUser')
            ->leftJoin('portafolios', 'users.idUser', '=', 'portafolios.idUser')
            ->leftJoin('categorias', 'portafolios.idCategoria', '=','categorias.idCategoria')
            ->leftJoin('categoriaproductos', 'categorias.idCategoria', '=', 'categoriaproductos.idCategoria')
            ->leftJoin('productos', 'categoriaproductos.idProducto', '=', 'productos.idProducto')
            ->where('productos.nombre', '=', $producto)
            ->distinct()
            ->get();

            return json_encode($productoSeleccionado);
        }else if($calificacion == "-- Calificación --" && $producto == "-- Producto --" && $precioInicial == null){
            $productoSeleccionado = DB::table('users')
            ->select(DB::raw('users.*'))
            ->leftJoin('calificacion', 'users.idUser', '=', 'calificacion.idUser')
            ->leftJoin('portafolios', 'users.idUser', '=', 'portafolios.idUser')
            ->leftJoin('categorias', 'portafolios.idCategoria', '=','categorias.idCategoria')
            ->leftJoin('categoriaproductos', 'categorias.idCategoria', '=', 'categoriaproductos.idCategoria')
            ->leftJoin('productos', 'categoriaproductos.idProducto', '=', 'productos.idProducto')
            ->where('users.ciudad', '=', $ciudad)
            ->distinct()
            ->get();

            return json_encode($productoSeleccionado);
        }else if($ciudad == "-- Ciudad --" && $producto == "-- Producto --" && $precioInicial == null){
            $productoSeleccionado = DB::table('users')
            ->select(DB::raw('users.*'))
            ->leftJoin('calificacion', 'users.idUser', '=', 'calificacion.idUser')
            ->leftJoin('portafolios', 'users.idUser', '=', 'portafolios.idUser')
            ->leftJoin('categorias', 'portafolios.idCategoria', '=','categorias.idCategoria')
            ->leftJoin('categoriaproductos', 'categorias.idCategoria', '=', 'categoriaproductos.idCategoria')
            ->leftJoin('productos', 'categoriaproductos.idProducto', '=', 'productos.idProducto')
            ->where('calificacion.calificacion', '=', $calificacion)
            ->distinct()
            ->get();

            return json_encode($productoSeleccionado);
        }else if($ciudad == "-- Ciudad --" && $producto == "-- Producto --" && $calificacion == "-- Calificación --" && $precioInicial != null){
          $productoSeleccionado = DB::table('users')
              ->select(DB::raw('users.*'))
              ->join('calificacion', 'users.idUser', '=', 'calificacion.idUser')
              ->join('portafolios', 'users.idUser', '=', 'portafolios.idUser')
              ->join('categorias', 'portafolios.idCategoria', '=','categorias.idCategoria')
              ->join('categoriaproductos', 'categorias.idCategoria', '=', 'categoriaproductos.idCategoria')
              ->join('productos', 'categoriaproductos.idProducto', '=', 'productos.idProducto')
              ->whereBetween('productos.precio', [$precioInicial, $precioFinal])
              ->distinct()
              ->get();
              return json_encode($productoSeleccionado);
        }else{
          $productoSeleccionado = DB::table('users')
              ->select(DB::raw('users.*'))
              ->join('calificacion', 'users.idUser', '=', 'calificacion.idUser')
              ->join('portafolios', 'users.idUser', '=', 'portafolios.idUser')
              ->join('categorias', 'portafolios.idCategoria', '=','categorias.idCategoria')
              ->join('categoriaproductos', 'categorias.idCategoria', '=', 'categoriaproductos.idCategoria')
              ->join('productos', 'categoriaproductos.idProducto', '=', 'productos.idProducto')
              ->where('productos.nombre', '=', $producto)
              ->whereBetween('productos.precio', [$precioInicial, $precioFinal])
              ->where('calificacion.calificacion', '=', $calificacion)
              ->where('users.ciudad', '=', $ciudad)
              ->distinct()
              ->get();
              return json_encode($productoSeleccionado);
        }
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
