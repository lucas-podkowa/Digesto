@extends('layout')

@section('content')
    <h1>
        Titulo
        {{-- {{ $title }} --}}
    </h1>

    <table id="rtimetable" class="table table-bordered table-hover">

        <thead class="thead-dark">
            <th>Tipo de Documento</th>
            <th>Número</th>
            <th>Resúmen</th>
            <th>Fecha</th>
            <th>Archivo</th>
        </thead>
        <tbody>
            @forelse ($filas as $f)
                <tr>
                    <td>
                        {{ $f['tipo_doc_id'] }}
                    </td>
                    <td>
                        {{ $f['numero'] }}
                    </td>
                    <td>
                        {{ $f['resumen'] }}
                    </td>
                    <td>
                        {{ $f['fecha'] }}

                        {{-- @foreach ($f['moderadores'] as $m)
                            <li>
                                {{ $m }}
                            </li>
                        @endforeach --}}
                    </td>

                    <td class="text-center py-0 align-middle">
                        {{-- <div class="btn-group btn-group-sm"> --}}
                            <a href="#" class="btn btn-outline-dark"><i class="fas fa-file-pdf"></i></a>
                            {{-- <a href="#" class="btn btn-outline-dark"><i class="fas fa-edit"></i></a> --}}
                        {{-- </div> --}}
                    </td>
                    <td class="text-right py-0 align-middle">
                        {{-- <div class="btn-group btn-group-sm"> --}}
                            <a href="#" class="btn btn-outline-dark btn-sm"><i class="fas fa-edit"></i></a>
                        {{-- </div> --}}
                    </td>
                    {{-- <a class="btn btn-block btn-outline-primary btn-sm" href="{{ route('asistentes.show', $f['meetingID']) }}" role="button">
                            <strong> {{ $f['cantParticipantes'] }}</strong> </a> --}}

                </tr>
            @empty
                <div class="alert alert-secondary" role="alert">
                    No existen sesiones activas en este momento
                </div>
            @endforelse
        </tbody>
    </table>
    <div>
        <div class="alert alert-light" role="alert">
            Sesiones activas:
            {{-- <b>{{ $totales['reuniones'] }}</b> --}}
        </div>
        <div class="alert alert-light" role="alert">
            Total de participantes:
            {{-- <b>{{ $totales['personas'] }}</b> --}}
        </div>
        <div class="alert alert-light" role="alert">
            Microfonos con permiso de activación:
            {{-- <b>{{ $totales['microfonos'] }}</b> --}}
        </div>
    </div>
@endsection
