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
                    <h3 class="card-title">Editar Problema</h3>
                </div>
                <form action="{{ route('comments.update', $id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="problem_id" id="problem_id" value="{{ $problem_id }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type">Tipo <span class="text-danger">*</span> {{ $data->type }} </label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="C" {{ old('comment', $data->type) == 'C' ? 'selected' : '' }}>Comnentario</option>
                                            <option value="O" {{ old('comment', $data->type) == 'O' ? 'selected' : '' }}>Oficial</option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="comment">Comentario <span class="text-danger">*</span></label>
                                        <textarea name="comment" id="comment" cols="30" rows="5" class="form-control">{{ old('comment', $data->comment) }}</textarea>
                                        @error('comment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="solution">Posible Solución <span class="text-danger">*</span></label>
                                        <textarea name="solution" id="solution" cols="30" rows="5" class="form-control">{{ old('solution', $data->solution) }}</textarea>
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
                                        EDITAR
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
@stop
