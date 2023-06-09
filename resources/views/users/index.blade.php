@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Usuarios'])
@section('content')
<div class="content">
    <div class="conteiner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Usuarios</h4>
                        <p class="card-category">Usuarios registrados</p>                      
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success" role=success>
                            {{ session('success') }}
                        </div>
                        @endif  
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-facebook">agregar usuario</a>
                            </div>
                        </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text primary">
                                        <th>ID</th>
                                        <th>cedula</th>
                                        <th>nombre</th>
                                        <th>apellido</th>
                                        <th>piso</th>
                                        <th>apartamento</th>
                                        <th>correo</th>
                                        <th class="text-right">acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->cedula }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->apellido }}</td>
                                            <td>{{ $user->piso }}</td>
                                            <td>{{ $user->apartamento }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="td-actions text-right">
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('estas seguro?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" rel="tooltip">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer mr-auto">
                            {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection