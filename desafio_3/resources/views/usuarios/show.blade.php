@extends('layouts.app')
  
@section('title', 'Show Product')
  
@section('contents')
    <h1 class="mb-0">usuario </h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Title" value="{{ $usuarios->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" name="lastname" class="form-control" placeholder="Price" value="{{ $usuarios->lastname }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Product Code" value="{{ $usuarios->email }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Cargo</label>
            <textarea class="form-control" name="description" placeholder="Descriptoin" readonly>{{ $usuarios->jobtitle }}</textarea>
        </div>
        <div class="col mb-3">
            <label class="form-label">Salario</label>
            <textarea class="form-control" name="salary" placeholder="Descriptoin" readonly>{{ $usuarios->salary }}</textarea>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $product->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $product->updated_at }}" readonly>
        </div>
    </div> --}}
@endsection