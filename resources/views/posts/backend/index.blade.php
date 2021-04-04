@extends('layouts.panel')

@section('title', 'Posts')

@section('css')
<!-- CDN DataTable con Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous" />
@endsection

@section('content')
    <div class="px-5 py-5">
        <div class="card">
            <div class="card-header">
                Posts
                <a class="btn btn-primary float-right" href="{{ route('posts.create') }}" target="_blank" rel="noopener noreferrer">Crear post</a>
            </div>

            <div class="card-body">
                <div class="datatable table-responsive">
                    <table id="indexPosts" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning d-inline-block" 
                                                target="_blank"
                                                data-toggle="tooltip" data-placement="top" title="Editar post">
                                            <i class="far fa-edit"></i> 
                                        </a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button id="delete" name="delete" type="submit" 
                                                    class="btn btn-danger" 
                                                    data-toggle="tooltip" data-placement="top" title="Eliminar post"
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
                                <th>Titulo</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
        $('#indexPosts').DataTable();
    } );
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@endsection