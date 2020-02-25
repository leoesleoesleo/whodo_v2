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

class proveedorcatalogoController extends Controller
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
        $categoria = Categorias::all();

        $portafolio = Portafolios::where('idUser', '=', $userId)->get();

    	return view ('proveedor.proveedorcatalogo')
            ->with('cantProv', $cantProv)
            ->with('details', $provDetails)
            ->with('newCantProv', $proveedorNuevo)
            ->with('newDetailsProv', $newDetailsProv)
            ->with('info', $info)
            ->with('categoria', $categoria)
            ->with('portafolioCategoria', $portafolioCategorias)
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

    public function cargarExcel(){
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
    }

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
}
