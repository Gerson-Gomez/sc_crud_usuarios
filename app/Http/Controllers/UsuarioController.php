<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsuarioController extends Controller
{
    public function index()
{
    if (request()->ajax()) {
        return datatables()->of(Usuario::query())
            ->addColumn('action', function ($usuario) {
                return '
                    <a href="' . route('usuarios.edit', $usuario->id) . '" class="btn btn-sm btn-primary">Edit</a>
                    <form action="' . route('usuarios.destroy', $usuario->id) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este usuario?\');">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>';
            })
            ->make(true);
    }
    return view('dashboard');
}


    



    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:usuarios',
            'pais' => 'required'
        ]);

        Usuario::create($request->all());

        return redirect()->route('usuarios.index');
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'pais' => 'required'
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index');
    }
}
