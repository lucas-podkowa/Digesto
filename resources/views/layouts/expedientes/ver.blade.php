@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="ml-4 text-lg leading-7 font-semibold">
                <a class="text-gray-900 dark:text-white">{{ $documento->tipo->nombre . ' Nº ' . $documento->numero }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-text">
                <pre style="white-space:pre-line">{{ $documento['texto'] }}</pre>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-danger float-right" href="{{ route('digesto.index') }}">
                <i class="fas fa-undo-alt"></i> Volver</a>
        </div>
    </div>
@endsection
