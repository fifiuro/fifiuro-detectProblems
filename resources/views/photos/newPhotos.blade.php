@extends('adminlte::page')

@section('title', 'Administación de Imágenes')

@section('content_header')
    <h1 class="m-0 text-dark">Administación de Imágenes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1 col-sm-12"></div>
        <div class="col-md-10 col-sm-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Nueva Imagen</h3>
                </div>
                <form action="{{ route('photos.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="problem_id" id="problem_id" value="{{ $problem_id }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="images">Seleccionar hasta 5 imágenes <span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="images[]" id="images" multiple
                                            accept="image/jpeg,image/png,image/jpg" class="form-control">
                                            {{-- <button type="submit" class="btn btn-primary">Subir</button> --}}
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
                                    <a href="{{ route('photos.list', $problem_id) }}" class="btn btn-danger">
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
