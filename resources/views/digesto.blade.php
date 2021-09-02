@extends('layout')

@section('content')

    <table id="DocsTable" class="table table-bordered table-hover">

        <thead class="thead-dark">
            <th>Tipo de Documento</th>
            <th>Número</th>
            <th>Resúmen</th>
            <th>Fecha</th>
            <th>Archivo</th>
            <th>Editar</th>
            {{-- <th><button>nuevo</button></th> --}}

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
                        <a href="{{ route('asistentes.show', $f->documento_id) }}" class="btn btn-outline-dark"><i
                                class="fas fa-file-pdf"></i></a>

                        {{-- <a target="_blank" href="{{ asset('files/nombreDeTuPdf.pdf') }}">PDF</a>
                        Si quieres ver el pdf en la misma página lo puedes hacer con iframe: --}}

                        {{-- <iframe width="400" height="400" src="{{ asset('files/nombreDeTuPdf.pdf') }}"
                            frameborder="0"></iframe> --}}
                    </td>
                    <td class="text-right py-0 align-middle">
                        <a href="#" class="btn btn-outline-dark btn-sm"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            @empty
                <div class="alert alert-secondary" role="alert">
                    No existen sesiones activas en este momento
                </div>
            @endforelse
        </tbody>
    </table>
    <div>


        {{-- <div class="alert alert-light" role="alert">
            Sesiones activas:
            <b>{{ $totales['reuniones'] }}</b>
        </div>
        <div class="alert alert-light" role="alert">
            Total de participantes:
            <b>{{ $totales['personas'] }}</b>
        </div> --}}
    </div>
@endsection
