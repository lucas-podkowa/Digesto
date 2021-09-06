@extends('layout')

@section('content')

    <h5>Usuario: <b>{{ $user->name }}</h5>
    <h5>Rol Activo: <b>{{ $suRol->first() }}</b></h5>
    <form action="{{ route('usuarios.actualizar', $user) }}" method="post"
        class="border border-secondary rounded p-3 mb-2 bg-secondary text-white">
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
                        <option value="" selected disabled>Seleccionar...</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-default"><i class="fas fa-save"></i> Actualizar</button>
            <button class="btn btn-default float-right" href="{{ route('usuarios.listar') }}">
                <i class="fas fa-undo"></i> Volver</button>

        </div>
    </form>


@endsection
