@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="DocsTable" class="table table-striped">
                <thead class="thead-dark">
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Resúmen</th>
                    <th>Fecha</th>
                    <th>Archivo</th>
                    <th>Editar</th>
                </thead>
                <tbody>
                    @forelse ($documentos as $documento)
                        <tr>
                            <td>
                                {{ $documento->tipo->nombre }}
                            </td>
                            <td>
                                {{ $documento['numero'] }}
                            </td>
                            <td>
                                {{ $documento['resumen'] }}
                            </td>
                            <td>
                                {{ $documento['fecha'] }}
                            </td>

                            <td class="text-center py-0 align-middle">
                                <a href="{{ $documento->archivo }}" target="_blank" class="btn btn-outline-dark"><i
                                        class="fas fa-file-pdf"></i></a>

                                {{-- <button type="button" class="btn"
                                    onclick="showFile('{{ $documento->archivo }}')"><i
                                        class="fas fa-file-pdf"></i></button> --}}

                            </td>
                            <td width="10px">
                                @can('documentos.editar')
                                    <a href="{{ route('documentos.editar', $documento) }}" class="btn btn-primay"><i
                                            class="fas fa-edit"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-secondary" role="alert">
                            El Digesto esta vacio
                        </div>
                    @endforelse
                </tbody>
            </table>
            {{ $documentos->links() }}
        </div>
    </div>
@endsection
