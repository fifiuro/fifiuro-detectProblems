@extends('adminlte::page')

@section('title', 'Administación de Problemas')

@section('content_header')
    <h1 class="m-0 text-dark">Vista Previa del Problemas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del Problema</h3>
                </div>
                <form action="{{ route('problem.create') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="problem">Problema <span class="text-danger">*</span></label>
                                    {{ $problem->problem }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="coordinates">Coordenadas <span class="text-danger">*</span></label>
                                    <a href="{{ $problem->coordinates }}" target="_blank">
                                        <i class="fas fa-map-marked-alt" style="font-size: 20px;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="zone">Zona <span class="text-danger">*</span></label>
                                    {{ $problem->zone }}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="zone">Calle <span class="text-danger">*</span></label>
                                    {{ $problem->street }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="other">Otros </label>
                                    {{ $problem->other }}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Lista de Fotos</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Lista de Fotos</h3>
                            @foreach ($photo as $key => $d)
                                <div class="col-md-12">
                                    <img src="{{ asset('storage/' . $d->path) }}" alt="{{ $d->filename }}"
                                        style="width:200px; height:auto;">
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">Columna de Mensajes</div>
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
                                <a href="{{ route('problem.list') }}" class="btn btn-danger">
                                    CANCELAR
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Lista de Comentarios</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Lista de Fotos</h3>
                            @foreach ($photo as $key => $d)
                                <div class="col-md-12">
                                    <img src="{{ asset('storage/' . $d->path) }}" alt="{{ $d->filename }}"
                                        style="width:200px; height:auto;">
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">Columna de Mensajes</div>
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
                                <a href="{{ route('problem.list') }}" class="btn btn-danger">
                                    CANCELAR
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop