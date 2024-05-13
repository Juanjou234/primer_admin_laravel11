@extends('layouts.app')
  
@section('title', 'Crear usuario')
  
@section('contents')
    <h1 class="mb-0">Add Product</h1>
    <hr />
    <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="nombre">
            </div>
            <div class="col">
                <input type="text" name="lastname" class="form-control" placeholder="apellido">
            </div>
            <div class="col">
                <input type="text" name="email" class="form-control" placeholder="correo">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="password" class="form-control" placeholder="contra">
            </div>
            <div class="col">
                <input type="text" name="jobtitle" class="form-control" placeholder="cargo">
            </div>
            <div class="col">
                <input type="text" name="salary" class="form-control" placeholder="salario">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection