@extends('layout')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documentos.actualizar', $documento) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tipo de Documento</label>
                        <select class="form-control" name=tipo_doc id="tipo_doc">
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->tipo_doc_id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label for="inputNumero">Número</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        </div>
                        <input type="text" name="numero" class="form-control" id="numero"
                            value="{{ old('numero', $documento->numero) }}" data-inputmask="'mask': ['999-9999']"
                            data-mask>
                    </div>
                    @error('numero')
                        <small>*{{ $message }}</small>
                    @enderror

                </div>
            </div>

            <div class="col-sm-8">
                <label>Resúmen</label>
                <textarea class="form-control" name=resumen rows="3"
                    placeholder="Redactar ...">{{ old('resumen', $documento->resumen) }}</textarea>
                @error('resumen')
                    <small>*{{ $message }}</small>
                @enderror
            </div>


            <div class="col-sm-8">
                <div class="form-group">
                    <label>Fecha del Documento</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" name="fecha" value="{{ old('fecha', $documento->fecha->format('d-m-Y')) }}"
                            class="form-control" id="datemask" data-inputmask-alias="datetime"
                            data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                    @error('fecha')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-sm-8">
                <label for="inputPdf">Archivo correspondiente</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="archivo" id="urlpdf">
                        <label class="custom-file-label" for="archivo">seleccione un archivo</label>
                    </div>

                </div>
                @error('archivo')
                    <small>*{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Actualizar</button>

            <a class="btn btn-danger float-right" href="{{ route('digesto.index') }}">
                <i class="fas fa-undo"></i> Cancelar</a>
        </div>
    </form>
@endsection

@section('jsdoc')
    <script>
        $(function() {
            $("#tipo_doc").val({{ $documento->tipo->tipo_doc_id }})
        });
    </script>

@endsection
