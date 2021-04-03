@extends('layouts.app')

@section('title', 'Index')

@section('css')
<!-- CDN DataTable con Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous" />



@endsection

@section('content')

<div class="card">
    <div class="card-header">Listado de usuarios</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <table id="indexUsers" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button id="delete" name="delete" type="submit" 
                                            class="btn btn-danger" 
                                            data-toggle="tooltip" data-placement="top" title="Eliminar usuario"
                                            onclick="return confirm('Desea eliminar...?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acción</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

    
@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#indexUsers').DataTable();
    } );
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@endsection