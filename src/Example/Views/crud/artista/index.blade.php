@extends("crud.layout")
@section("contenido")
@php
  {{  header("Cache-Control: no-cache, must-revalidate"); }}
  {{  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); }}
@endphp
<div class="bg-contact2" style="background-image: url('{{ asset('template/images/bg-01.jpg') }}');">
        <div class="container-contact2">
            <div class="wrap-contact2">
                <div class="contact2-form validate-form">
                    <a href="{{ url('/') }}" class="btn btn-secondary" style="float: left !important;">
                    Index
                    </a>
                    <a href="{{ route('create-artista',['date'=>FunctionPkg::current_day()]) }}" class="btn btn-primary" style="float: right !important;">
                    Crear
                    </a>
                    <span class="contact2-form-title">
                        Gestión de artistas
                    </span>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Nacionalidad</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artistas as $artista)
                                <tr>
                                    <td>{{ $artista->nombre }}</td>
                                    <td>{{ $artista->apellido }}</td>
                                    <td>{{ $artista->nacionalidad }}</td>
                                    <td>
                                        <a href="{{ route('edit-artista',['date'=>FunctionPkg::current_day(),'id'=>FunctionPkg::encrypt($artista->id_a)]) }}" class="btn btn-info btn-sm mt-1 ml-1">
                                                Editar
                                        </a>
                                        @if ($artista->activo == 1)
                                            <a href="{{ route('delete-artista',['date'=>FunctionPkg::current_day(),'id'=>FunctionPkg::encrypt($artista->id_a)]) }}" class="btn btn-danger btn-sm mt-1 ml-1">
                                                Desactivar
                                            </a>
                                        @endif
                                        @if ($artista->activo == 0)
                                            <a href="{{ route('active-artista',['date'=>FunctionPkg::current_day(),'id'=>FunctionPkg::encrypt($artista->id_a)]) }}" class="btn btn-success btn-sm mt-1 ml-1">
                                                Activar
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection