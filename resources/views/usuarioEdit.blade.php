@extends('layout')

@section('content')

    <h5>Edición del Usuario: {{ $user->name }}</h5>
    <form action="{{ route('usuarios.actualizar', $user) }}" method="post">
        @csrf
        @method('put')

        <div class="card-body">
            <div class="col-sm-4">
                <label>Nombre</label>
                <input type="text" class="form-control" name=name value="{{ $user->name }}">
            </div>

            <div class="col-sm-4">
                <label>Email</label>
                <input type="text" class="form-control" name=email value="{{ $user->email }}">
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label>Rol</label>
                    <select class="form-control" name=rol>
                        <option>Administrador</option>
                        <option>Ayudante</option>
                        <option>Visor</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Actualizar Datos</button>
            <button class="btn btn-default float-right" href="{{ route('usuarios.listar') }}">
                <i class="fas fa-undo"></i> Volver</button>

        </div>
    </form>


@endsection
