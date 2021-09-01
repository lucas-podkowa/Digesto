@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>Nombre</th>
                        <th>Email</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $user)
                        <tr>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                        </tr>
                    @empty
                        <div class="alert alert-info" role="alert">
                            No existen asistentes activos en este momento
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>


@endsection
