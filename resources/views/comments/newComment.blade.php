@extends('adminlte::page')

@section('title', 'Administación de Problemas')

@section('content_header')
    <h1 class="m-0 text-dark">Administación de Problemas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1 col-sm-12"></div>
        <div class="col-md-10 col-sm-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Nuevo Problema</h3>
                </div>
                <form action="{{ route('comments.create') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="problem_id" id="problem_id" value="{{ $problem_id }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type">Tipo <span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="C" selected>Comnentario</option>
                                            <option value="O">Oficial</option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="comment">Comentario <span class="text-danger">*</span></label>
                                        <textarea name="comment" id="summernoteComentario">{{ old('comment') }}</textarea>
                                        @error('comment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="solution">Posible Solución <span class="text-danger">*</span></label>
                                        <textarea name="solution" id="summernoteSolucion">{{ old('solution') }}</textarea>
                                        @error('solution')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        GUARDAR
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('comments.list', $problem_id) }}" class="btn btn-danger">
                                        CANCELAR
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1 col-sm-12"></div>
    </div>
    <script type="module">
        $(document).ready(function() {
            $('#summernoteComentario').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['codeview']]
                ]
            });

            $('#summernoteSolucion').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['codeview']]
                ]
            });

            $('#type').change(function() {
                var id = $("#problem_id").val();
                if ($(this).val() == 'O') {
                    $.ajax({
                        url: '{{ route('comments.all') }}',
                        type: 'GET',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            $.each(response, function(index, item) {
                                console.log(response[0]);
                                $('#summernoteComentario').summernote('code', response[
                                    0]);
                                $('#summernoteSolucion').summernote('code', response[
                                1]);
                            });
                        }
                    });
                } else {
                    $('#summernoteComentario').summernote('code', '');
                    $('#summernoteSolucion').summernote('code', '');
                }
            });

        });
    </script>
@stop
