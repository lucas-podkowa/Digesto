@extends('layout')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Documentos</h3>
        </div>

        <form>
            <div class="card-body">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tipo de Documento</label>
                        <select class="form-control">
                            <option>Conclusion</option>
                            <option>Convenio</option>
                            <option>Convocatoria</option>
                            <option>Ordenanza</option>
                            <option>Resolucion</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputNumero">Email address</label>
                    <input type="email" class="form-control" id="inputNumero" placeholder="000-0000">
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Resuen</label>
                        <textarea class="form-control" rows="5" placeholder="Redactar ..."></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPdf">Archivo correspondiente</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputPdf">
                            <label class="custom-file-label" for="inputPdf">seleccione un archivo</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Subir</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Fecha:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" data-inputmask-alias="datetime"
                            data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

@endsection
