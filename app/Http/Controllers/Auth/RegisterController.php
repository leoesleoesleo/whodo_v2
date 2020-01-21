<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Array $data)
    {

        //Validador de información que viene de los inputs
        if($data['rol'] == 1){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }else if($data['rol'] == 2){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['rol'] == 1){
            $user = User::create([
                'nombreEmpresa' => $data['name'],
                'nit' => $data['proveedorNit'],
                'email' => $data['email'],
                'telefono' => $data['proveedorTelefono'],
                'direccion' => $data['direccionProveedor'],
                'active' => 1,
                'esEmpresa' => 1,
                'pais' => $data['proveedorPais'],
                'ciudad' => $data['proveedorCiudad'],
                'password' => Hash::make($data['password']),
                'descripcion' => $data['descripcion']
            ]);
            $user->assignRole('proveedor');
            return $user;
        }else if($data['rol'] == 2){
            $user = User::create([
                'name' => $data['name'],
                'apellidos' => $data['clienteApellidos'],
                'email' => $data['email'],
                'pais' => $data['clientePais'],
                'ciudad' => $data['clienteCiudad'],
                'cc' => $data['clienteCc'],
                'fechaN' => $data['fechaNCliente'],
                'active' => 1,
                'esEmpresa' => 0,
                'password' => Hash::make($data['password']),
            ]);
            $user->assignRole('usuario');
            return $user;
        }
    }
}
