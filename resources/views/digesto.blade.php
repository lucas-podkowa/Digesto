@extends('layout')

@section('content')

    <div class="card">
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

    </div>

    <div class="card">
        <div class="card-body">
            <table id="DocsTable" class="table table-striped">
                <thead class="thead-dark">
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Resúmen</th>
                    <th>Archivo</th>
                    @can('documentos.editar')
                        <th>Editar</th>
                    @endcan
                </thead>
                <tbody>
                    @forelse ($documentos as $documento)
                        <tr>
                            <td>
                                {{ $documento->fecha->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $documento->tipo->nombre }}
                            </td>
                            <td>
                                {{ $documento['numero'] }}
                            </td>
                            <td>
                                {{ $documento['resumen'] }}
                            </td>

                            <td class="text-center py-0 align-middle">
                                <a href="{{ $documento->archivo }}" target="_blank" class="btn btn-outline-dark"><i
                                        class="fas fa-file-pdf"></i></a>
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
            {{ $documentos->appends(['tipo' => $tipo])->links() }}
        </div>
    </div>
@endsection

@section('jsdigesto')
    <script>
        $(function() {
            $selectTipoDoc = $('selectTipo');
            $('.switch').on('click', onClickSwitchselectTipoDoc)
            $selectTipoDoc.change(onChangeFilter);
        });

        function onClickSwitchselectTipoDoc() {
            const tipo_doc_id = $(this).data('id');
            location.href = '/documentos/?{tipo_doc_id}';
        }

        function onChangeFilter() {
            const tipo = $selectTipoDoc.val();
            location.href = '/documentos/?tipodoc=${tipo}';
        }
    </script>

@endsection
