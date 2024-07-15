@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1 class="text-center">Editando el usuario: {{ $usuario->nombres }}</h1>
@stop

@section('content')
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ $usuario->nombres }}" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ $usuario->apellidos }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
        </div>
        <div class="form-group">
            <label for="pais">País</label>
            <input type="text" name="pais" class="form-control" value="{{ $usuario->pais }}" required>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@stop
