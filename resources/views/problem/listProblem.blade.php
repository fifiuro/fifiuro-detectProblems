@extends('adminlte::page')

@section('title', 'Detección de Problemas')

@section('content_header')
    {{-- @include('utils.header') --}}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('problem.partials.searchPanel')
        </div>

        <div class="col-md-12" style="color: white">
            @if (isset($data))
                @include('problem.partials.resultList')
            @endif
        </div>
    </div>
    <script type="module">
        $(document).ready(function() {

            $(".btn-modal").click(function() {
                let id = $(this).data("id");
                let header_id = $(this).data("header_id");
                let first_name = $(this).data("first_name");
                let last_name = $(this).data("last_name");
                let mother_name = $(this).data("mother_name");
                let brithdate = $(this).data("brithdate");
                let dni = $(this).data("dni");
                let extension = $(this).data("extension");
                let email = $(this).data("email");

                var ruta = "{{ route('beneficiaries.destroy', ['header_id' => ':h', 'id' => ':id']) }}";

                ruta = ruta.replace(':h', header_id);
                ruta = ruta.replace(':id', id);

                $('.problem').html(first_name);
                $('.coordinates').html(last_name);
                $('.zone').html(mother_name);
                $('.street').html(brithdate);
                $('.date').html(dni);
                $('.other').html(extension);
                $('#btn-eliminar').attr("href", ruta)
            });

        });
    </script>
@stop