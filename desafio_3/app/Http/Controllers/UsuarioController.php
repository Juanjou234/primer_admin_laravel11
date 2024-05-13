<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // validator para func. make 
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{

    public function register() {
        return view('auth/register');
    }

    public function registerSave(Request $request) { // funcion para registrar un nuevo usuario
        Validator::make($request->all(), [ // para validar que todos los campos esten llenos
            'name'=> 'required', 
            'lastname'=> 'required', 
            'email'=> 'required', 
            'password'=> 'required|confirmed'

        ])->validate();

        Usuario::create([ // crear un nuevo User, con todos estos campos de $request 
            'name' => $request->name, 
            'lastname' => $request->lastname, 
            'email' => $request->email, 
            'password' => Hash::make($request->password), 
            'nivel' => 'Admin'
        ]);  

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth/login');
    }
  
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
  
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
  
        $request->session()->regenerate();

        $usuario = Auth::user();  // Ahora devuelve una instancia de Empleado

        if ($usuario->jobtitle === 'Admin') {
            return redirect()->route('dashboard'); // Redirección para administradores
        } else {
            //return redirect('/');  // Redirección para otros empleados
            return redirect()->route('views.perfil', ['id' => $usuario->id]);
        }

    }
  
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }
 
    public function profile()
    {
        return view('profile');
    }

    public function showProfile($id){
        $usuarios = Usuario::findOrFail($id); // Busca el empleado por ID, lanza error 404 si no lo encuentra
        return view('perfil', ['usuarios' => $usuarios]); // Cambia 'profile' a 'perfil'
    }
    
    public function index()
    {
        $usuarios= Usuario::orderBy('created_at', 'DESC')->get(); // Fetch all employees from the database
        return view('usuarios.index', compact('usuarios'));
    }

    
    public function create()
    {
        return view('usuarios.create');
    }

    
    public function store(Request $request)
    {
        Usuario::create($request->all());
 
        return redirect()->route('usuarios')->with('success', 'agregado');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuarios = Usuario::findOrFail($id);
  
        return view('usuarios.show', compact('usuarios'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuarios = Usuario::findOrFail($id);
  
        return view('usuarios.edit', compact('usuarios'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuarios = Usuario::findOrFail($id);
  
        $usuarios->update($request->all());
  
        return redirect()->route('usuarios')->with('success', 'actualizado');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuarios = Usuario::findOrFail($id);
  
        $usuarios->delete();
  
        return redirect()->route('usuarios')->with('success', 'eliminado');
    }

}
