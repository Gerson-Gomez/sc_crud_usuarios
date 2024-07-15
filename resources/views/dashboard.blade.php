@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Crud de clientes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de Usuarios</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Añadir Usuario</a>
            <table id="usuarios-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>País</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usuarios-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('usuarios.index') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nombres', name: 'nombres' },
                    { data: 'apellidos', name: 'apellidos' },
                    { data: 'email', name: 'email' },
                    { data: 'pais', name: 'pais' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@stop
