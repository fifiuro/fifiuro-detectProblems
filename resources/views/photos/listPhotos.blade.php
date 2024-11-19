@section('plugins.Sweetalert2', true)

@extends('adminlte::page')

@section('title', 'Administración de Imágenes')

@section('content_header')
    <h1 class="m-0 text-dark">Administración de Imágenes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @include('photos.partials.header')
        </div>
        @if (isset($data))
            <div class="col-12">
                @include('photos.partials.resultList')
            </div>
        @endif
    </div>

    @include('photos.partials.windowDelete')

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
                let problem_id = $(this).data("problem_id");
                let path = $(this).data("path");
                let type = $(this).data('type');
                $('#img-unico').attr('src', path);

                if (type == 'delete') {
                    var ruta = "{{ route('photos.destroy', ['id' => ':id', 'problem_id' => ':p']) }}";
                    ruta = ruta.replace(':id', id);
                    ruta = ruta.replace(':p', problem_id);
                    $('#btn-eliminar').attr("href", ruta)
                    $('#title').html("¿Esta seguro de eliminar la Imágen?");
                    $('#footer').attr("style", "display:inline");
                    $('#img-unico').attr("style", "width:300px")
                }
                if (type == 'view') {
                    $('#title').html("Vista Previa");
                    $('#footer').attr("style", "display:none");
                    $('#img-unico').attr("style", "width:600px")
                }
            });

        });
    </script>
@stop
