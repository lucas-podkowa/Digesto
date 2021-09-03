@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="userList" class="table table-striped">
                <thead>
                    <tr>

                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol }}</td>
                            <td width="10px"><a class="btn btn-primay" href="{{ route('usuarios.editar', $user) }}"><i
                                        class="fas fa-edit"></i> Editar</a></td>
                        </tr>
                    @empty
                        <div class="alert alert-info" role="alert">
                            No existen asistentes activos en este momento
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">

        </div>
    </div>


@endsection
