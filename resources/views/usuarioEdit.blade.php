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
                <input type="text" class="form-control" name=nombre value="{{ old('nombre', $user->name) }}">
            </div>

            <div class="col-sm-4">
                <label>Email</label>
                <input type="text" class="form-control" name=email value="{{ old('email', $user->email) }}">
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label>Rol</label>
                    <select class="form-control" name=rol id=rol>
                        <option value="" selected disabled>Seleccionar...</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-default"><i class="fas fa-save"></i> Actualizar</button>
            <a class="btn btn-danger float-right" href="{{ route('usuarios.listar') }}">
                <i class="fas fa-undo"></i> Cancelar</a>
        </div>
    </form>


@endsection

@section('jsuser')
    <script>
        $(function() {
            $("#rol").val({{ $user->roles[0]->id }})
        });
    </script>

@endsection
