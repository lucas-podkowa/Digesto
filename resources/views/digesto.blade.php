@extends('layout')

@section('content')
    {{-- <div class="card">
        <div class="card-block">
            <label for="selectTipo">Tipo de Documento</label>
            <select class="browser-default custom-select" name="selectTipo" id="selectTipo">
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->tipo_doc_id }}" @if ($tipo == "{{ $tipo->tipo_doc_id }}") selected @endif>
                        {{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

    </div> --}}

    <div class="card">
        <div class="card-body">
            <nav class="navbar navbar-light float-right">
                <form class="form-inline">
                    {{--
                    <label for="selectTipo">Año</label>
                    
                    <select class="browser-default custom-select" name="year">
                        @foreach ($periodos as $p)
                            <option value="{{ $p->year }}" >
                                {{ $p->year }}
                            </option>
                        @endforeach
                    </select> 
                    --}}
                    <input name="buscarpor" style="width:500px" class="form-control mr-sm-2" type="search"
                        placeholder="Ingresar el texto a buscar y presionar la tecla ENTER" aria-label="Search">
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
