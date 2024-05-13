@extends('layouts.app')
  
@section('title', 'Home usuarios')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Cargo</th>
                <th>Salario</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($usuarios) && $usuarios->count() > 0)
                @foreach($usuarios as $usuario)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $usuario->name }}</td>
                        <td class="align-middle">{{ $usuario->lastname }}</td>
                        <td class="align-middle">{{ $usuario->email }}</td>
                        <td class="align-middle">{{ $usuario->jobtitle }}</td>
                        <td class="align-middle">{{ $usuario->salary }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('usuarios.show', $usuario->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">user not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection