@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="DocsTable" class="table table-striped">
                <thead class="thead-dark">
                    <th>Tipo de Documento</th>
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
                                {{ $documento['tipo_doc_id'] }}
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
                                <a href="{{ route('home', $documento->documento_id) }}" class="btn btn-outline-dark"><i
                                        class="fas fa-file-pdf"></i></a>

                            </td>
                            <td width="10px">
                                @can('documentos.editar')
                                    <a href="{{ route('documentos.editar', $documento) }}" class="btn btn-primay"><i
                                            class="fas fa-edit"></i> Editar</a>
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

        </div>
    </div>
@endsection
