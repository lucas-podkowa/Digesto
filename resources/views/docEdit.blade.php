@extends('layout')

@section('content')

    <form action="{{ route('documentos.actualizar', $documento) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tipo de Documento</label>
                        <select class="form-control" name=tipo_doc>
                            <option>Conclusion</option>
                            <option>Convenio</option>
                            <option>Convocatoria</option>
                            <option>Ordenanza</option>
                            <option>Resolucion</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label for="inputNumero">Número</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        </div>
                        <input type="text" class="form-control" name="numero" id="numero"
                            data-inputmask="'mask': ['999-9999']" data-mask>
                    </div>

                </div>
            </div>

            <div class="col-sm-8">
                <label>Resúmen</label>
                <textarea class="form-control" name=resumen rows="3"
                    placeholder="Redactar ...">{{ $documento->resumen }}</textarea>
            </div>


            <div class="col-sm-8">
                <div class="form-group">
                    <label>Fecha:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" id="datemask" data-inputmask-alias="datetime"
                            data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <label for="inputPdf">Archivo correspondiente</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="urlpdf" id="urlpdf">
                        <label class="custom-file-label" for="urlpdf">seleccione un archivo</label>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button class="btn btn-default float-right" href="{{ route('digesto.index') }}">
                <i class="fas fa-undo"></i> Cancelar</button>
        </div>
    </form>


@endsection
