@extends("crud.layout")
@section("contenido")
@php
  {{  header("Cache-Control: no-cache, must-revalidate"); }}
  {{  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); }}
@endphp
<div class="bg-contact2" style="background-image: url('{{ asset('template/images/bg-01.jpg') }}');">
    <div class="container-contact2">
        <div class="wrap-contact2">
            <form method="POST" action="{{ route('update-artista',["date"=>FunctionPkg::current_day(),"id"=>FunctionPkg::encrypt($artista->id_a)]) }}" class="contact2-form validate-form">
                @csrf
                <span class="contact2-form-title">
                    Formulario de edición de artista
                </span>

                <div class="wrap-input2 validate-input" data-validate="Campo nombre es requerido.">
                    <input class="input2" type="text" name="name" value="{{ $artista->nombre }}">
                </div>

                <div class="wrap-input2 validate-input" data-validate="Campo apellido es requerido.">
                    <input class="input2" type="text" name="lastname" value="{{ $artista->apellido }}">
                </div>

                <div class="wrap-input2 validate-input" data-validate="Campo nacionalidad es requerido.">
                    <input class="input2" type="text" name="nationality" value="{{ $artista->nacionalidad }}">
                </div>

                <button class="btn btn-primary btn-lg" type="submit">Actualizar</button>
                <a href="{{ url('validate',['param'=>FunctionPkg::encrypt('getter/artista'),'date'=>FunctionPkg::current_day()]) }}" class="btn btn-success btn-lg" style="float: right !important;">
                Inicio
                </a>

            </form>
        </div>
    </div>
</div>
@endsection