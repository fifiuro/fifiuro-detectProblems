@section('plugins.Sweetalert2', true)

@extends('adminlte::page')

@section('title', 'Administración de Comentarios')

@section('content_header')
    <h1 class="m-0 text-dark">Administración de Comentarios</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @include('comments.partials.header')
        </div>
        @if (isset($data))
            <div class="col-12">
                @include('comments.partials.resultList')
            </div>
        @endif
    </div>

    @include('comments.partials.windowDelete')

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
                let type = $(this).data("type");
                let comment = $(this).data("comment");
                var ruta = "{{ route('comments.destroy', ['id' => ':id', 'problem_id' => ':p']) }}";
                ruta = ruta.replace(':id', id);
                ruta = ruta.replace(':p', problem_id);
                if (type == 'C') {
                    $('.type').html("Comentario");
                }
                if (type == 'O') {
                    $('.type').html("Oficial");
                }
                $('.comment').html(comment);
                $('#btn-eliminar').attr("href", ruta)
            });

        });
    </script>
@stop
