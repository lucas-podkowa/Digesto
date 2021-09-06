@extends('layout')

@section('content')

    <form action="{{ route('documentos.guardar') }}" method="post" enctype="multipart/form-data">
        @csrf
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
                    <input type="text" class="form-control" name=numero id="inputNumero" placeholder="000-0000"
                        data-inputmask="'mask': '999-999-9999 '" data-mask>
                </div>
            </div>

            <div class="col-sm-8">
                <label>Resúmen</label>
                <textarea class="form-control" name=resumen rows="3" placeholder="Redactar ..."></textarea>
            </div>

            <div class="col-sm-8">
                <label>Fecha:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="fecha" class="form-control" data-inputmask-alias="datetime"
                        data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                </div>
            </div>


            <div class="col-sm-8">
                <label for="inputPdf">Archivo correspondiente</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="urlpdf" class="custom-file-input" id="inputPdf">
                        <label class="custom-file-label" for="inputPdf">seleccione un archivo</label>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>


@endsection
