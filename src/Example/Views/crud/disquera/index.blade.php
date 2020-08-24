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
                    <button class="btn btn-primary" style="float: right !important;" id="open-modal">
                        Crear
                    </button>
                    <span class="contact2-form-title">
                        Gestión de disqueras
                    </span>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Siglas</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="tabla">
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crear disquera</h5>
        <button type="button" class="close cerrar-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="contact2-form validate-form">
            <div class="wrap-input2 validate-input" data-validate="El campo nombre es requerido.">
                <input class="input2" type="text" id="nombre">
                <span class="focus-input2" data-placeholder="Nombre"></span>
            </div>
            <div class="wrap-input2 validate-input" data-validate="El campo siglas es requerido.">
                <input class="input2" type="text" id="siglas">
                <span class="focus-input2" data-placeholder="Siglas"></span>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" style="float: left !important;" id="create">Crear</button>
        <button type="button" class="btn btn-secondary cerrar-modal" data-dismiss="modal" style="float: right !important;">
        Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modal-edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar disquera</h5>
        <button type="button" class="close cerrar-modal-edit" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="contact2-form validate-form">
            <div class="wrap-input2 validate-input" data-validate="El campo nombre es requerido." disabled="true" hidden="true">
                <input class="input2" type="text" id="xdn-edit" disabled="true" hidden="true">
            </div>
            <div class="wrap-input2 validate-input" data-validate="El campo nombre es requerido.">
                <input class="input2" type="text" id="nombre-edit">
            </div>
            <div class="wrap-input2 validate-input" data-validate="El campo siglas es requerido.">
                <input class="input2" type="text" id="siglas-edit">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" style="float: left !important;" id="update">Actulizar</button>
        <button type="button" class="btn btn-secondary cerrar-modal-edit" data-dismiss="modal" style="float: right !important;">
        Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        registers();

        function registers(){

            $("#tabla").empty();

            $.ajax({
                url: '{{ route('show-disquera',['date'=>FunctionPkg::current_day()]) }}',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: 'POST',
                success: function(data){
                    $("#tabla").html(data.success);
                }
            });

        }

        function clean_modal(){
            $("#nombre").val("");
            $("#siglas").val("");
        }

        function clean_modal_edit(){
            $("#xdn-edit").val("");
            $("#nombre-edit").val("");
            $("#siglas-edit").val("");
        }

        $("#open-modal").on("click",function(){
            $('#modal').modal('show');
            clean_modal();
        });

        $(".cerrar-modal").on("click",function(){
            clean_modal();
        });

        $(".cerrar-modal-edit").on("click",function(){
            clean_modal_edit();
        });

        $("#create").on("click",function(){
            let nombre = $("#nombre").val();
            let siglas = $("#siglas").val();
            if(nombre != "" && siglas != ""){

                $.ajax({
                    url: '{{ route('store-disquera',['date'=>FunctionPkg::current_day()]) }}',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'POST',
                    data: {nombre:nombre,siglas:siglas},
                    success: function(data){
                        if(data.success != "" && data.success != null){
                            location.reload();
                        } 
                    }
                });
                
            }else{

                alert("No puede dejar campos vacios.");

            }
        });

        $(document).on('click','.delete',function(){

            let xdn = $(this).attr("name");

            $.ajax({
                url: '{{ route('delete-disquera',['date'=>FunctionPkg::current_day()]) }}',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {xdn:xdn},
                type: 'POST',
                success: function(data){
                    if(data.success != "" && data.success != null){
                        location.reload();
                    }                
                }
            });

        });

        $(document).on('click','.active',function(){

            let xdn = $(this).attr("name");

            $.ajax({
                url: '{{ route('active-disquera',['date'=>FunctionPkg::current_day()]) }}',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {xdn:xdn},
                type: 'POST',
                success: function(data){
                    if(data.success != "" && data.success != null){
                        location.reload();
                    }              
                }
            });

        });

        $(document).on('click','.edit',function(){

            let xdn = $(this).attr("name");

            clean_modal_edit();

            $.ajax({
                url: "{{ url('getter/edit-disquera') }}"+"/"+"{{ FunctionPkg::current_day() }}"+"/"+xdn,
                type: 'GET',
                success: function(data){
                    $("#xdn-edit").val(data.xdn);
                    $("#nombre-edit").val(data.nombre);
                    $("#siglas-edit").val(data.siglas);
                }
            });

            $('#modal-edit').modal('show');

        });

        $("#update").on("click",function(){

            let xdn = $("#xdn-edit").val();

            let nombre = $("#nombre-edit").val();

            let siglas = $("#siglas-edit").val();

            if(xdn != "" && nombre != "" && siglas != ""){

                $.ajax({
                    url: '{{ route('update-disquera',['date'=>FunctionPkg::current_day()]) }}',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'POST',
                    data: {xdn:xdn,nombre:nombre,siglas:siglas},
                    success: function(data){
                        if(data.success != "" && data.success != null){
                            location.reload();
                        } 
                    }
                });
                
            }else{

                alert("No puede dejar campos vacios.");

            }
        });
    });
</script>
@endsection