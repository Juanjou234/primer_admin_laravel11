@extends('layouts.app')
  
@section('title', 'Edit Product')
  
@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('usuarios.update', $usuarios->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Title" value="{{ $usuarios->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" name="lastname" class="form-control" placeholder="Price" value="{{ $usuarios->lastname }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Product Code" value="{{ $usuarios->email }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Cargo</label>
                <textarea class="form-control" name="jobtitle" placeholder="Descriptoin" >{{ $usuarios->jobtitle }}</textarea>
            </div>
            <div class="col mb-3">
                <label class="form-label">Salario</label>
                <textarea class="form-control" name="salary" placeholder="Descriptoin" >{{ $usuarios->salary }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection