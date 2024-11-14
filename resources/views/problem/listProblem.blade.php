@extends('adminlte::page')

@section('title', 'Detección de Problemas')

@section('content_header')
    <h4><strong>ADMINISTRADOR DE PROBLEMAS DETECTADOS</strong></h4>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('problem.partials.searchPanel')
        </div>

        <div class="col-md-12">
            @if (isset($data))
                @include('problem.partials.resultList')
            @endif
        </div>
    </div>

    @include('problem.partials.windowDelete')

    <script type="module">
        $(document).ready(function() {

            if ("{{ $message }}" != '') {
                $(document).Toasts('create', {
                    class: '{{ $tipo }}',
                    title: '{{ $titulo }}',
                    autohide: true,
                    delay: 3000,
                    body: "{{ $message }}",
                    icon: 'error'
                });
            }

            $(".btn-modal").click(function() {
                let id = $(this).data("id");
                let problem = $(this).data("problem");
                let coordinates = $(this).data("coordinates");
                let zone = $(this).data("zone");
                let street = $(this).data("street");
                let date = $(this).data("date");
                let other = $(this).data("other");

                var ruta = "{{ route('problem.destroy', ['id' => ':id']) }}";
                ruta = ruta.replace(':id', id);

                $('.problem').html(problem);
                $('.coordinates').html(coordinates);
                $('.zone').html(zone);
                $('.street').html(street);
                $('.date').html(date);
                $('.other').html(other);
                $('#btn-eliminar').attr("href", ruta)
            });

        });
    </script>
@stop
