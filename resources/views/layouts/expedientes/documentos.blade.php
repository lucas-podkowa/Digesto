@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <nav class="navbar navbar-light flex justify-between items-center px-4">
                <h1 class="text-xl font-bold">Expedientes del Consejo Directivo</h1>
                <form class="form-inline">
                    <input name="buscarpor" style="width:500px" class="form-control w-full" type="search"
                        placeholder="Buscar al presionar ENTER" aria-label="Search">
                </form>
            </nav>


            <table id="DocsTable" class="table table-striped">
                <thead class="thead-dark">
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Resúmen</th>
                </thead>
                <tbody>
                    @forelse ($documentos as $documento)
                        <tr>
                            <td>
                                {{ $documento->fecha->format('d/m/Y') }}
                            </td>
                            <td>
                                {{ $documento->tipo->nombre }}
                            </td>
                            <td>
                                {{ $documento['numero'] }}
                            </td>
                            <td>
                                {{ $documento['resumen'] }}
                                <a href="{{ route('documentos.ver', $documento) }}" title="Leer el texto completo"
                                    class="btn btn-primay btn-lg">
                                    <i class="fas fa-folder-open"></i>
                                </a>
                                <a href="{{ $documento->archivo }}" title="Descargar Documento" target="_blank"
                                    class="btn btn-primay btn-lg">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                                @can('documentos.editar')
                                    <a href="{{ route('documentos.editar', $documento) }}" title="Editar"
                                        class="btn btn-primay"><i class="fas fa-edit"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $documentos->links() }}
            </div>
        </div>
    </div>
@endsection
