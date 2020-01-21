<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;
use Illuminate\Http\Request;
use App\sugerircategoria;

class adminPanelController extends Controller
{
    public function index (){
        $user = User::all()->where('esEmpresa', '=', '0');
    	return view ('admin.adminpanel')->with('data', $user);
    }

    public function createUser(Request $request){
        if($request->rol == 1){
            Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'pais' => ['required', 'string', 'max:255'],
                'ciudad' => ['required', 'string', 'max:255'],
                'nit' => ['required', 'string', 'max:255'],
                'telefono' => ['required', 'string', 'max:255'],
                'direccion' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'descripcion' => ['required', 'string']
            ])->validate();

            $user = User::create([
                'nombreEmpresa' => $request['name'],
                'pais' => $request['pais'],
                'ciudad' => $request['ciudad'],
                'nit' => $request['nit'],
                'telefono' => $request['telefono'],
                'direccion' => $request['direccion'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'active' => 1,
                'esEmpresa' => 1,
                'descripcion' => $request['descripcion']
            ]);
            $user->assignRole('proveedor');
        }else if($request->rol == 2){
            Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'apellidos' => ['required', 'string', 'max:255'],
                'pais' => ['required', 'string', 'max:255'],
                'ciudad' => ['required', 'string', 'max:255'],
                'cedula' => ['required', 'string', 'max:255'],
                'fechaN' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ])->validate();

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'apellidos' => $request['apellidos'],
                'pais' => $request['pais'],
                'ciudad' => $request['ciudad'],
                'cc' => $request['cedula'],
                'fechaN' => $request['fechaN'],
                'active' => 1,
                'esEmpresa' => 0
            ]);

            $user->assignRole('usuario');
        }
    }

    public function editUser(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        $user->pais = $request->pais;
        $user->ciudad = $request->ciudad;
        $user->cc = $request->cedula;
        $user->fechaN = $request->fechaN;
        if(!$request->password == "")
            $user->password = Hash::make($request->password);
        $user->save();
    }

    public function deleteUser(Request $request){
        User::destroy($request->id);
    }

    public function proveedorindex(){
        $user = User::all()->where('esEmpresa', '=', '1');
        return view('admin.adminpanelproveedores')->with('data', $user);
    }

    public function editProveedor(Request $request){
        $user = User::find($request->id);
        $user->nombreEmpresa = $request->name;
        $user->email = $request->email;
        $user->pais = $request->pais;
        $user->ciudad = $request->ciudad;
        $user->nit = $request->nit;
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->descripcion = $request->descripcion;
        if(!$request->password == "")
            $user->password = Hash::make($request->password);
        $user->save();
    }

    public function deleteProveedor(Request $request){
        User::destroy($request->id);
    }

    public function indexSugerencias(){
        $sugerirCategoria = sugerircategoria::all();
        return view('admin.adminpanelsugerencias')->with('data', $sugerirCategoria);
    }
}
