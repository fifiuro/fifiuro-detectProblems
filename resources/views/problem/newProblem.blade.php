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
                <form action="{{ route('problem.create') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="problem">Problema <span class="text-danger">*</span></label>
                                        <input type="text" name="problem" class="form-control" id="problem"
                                            placeholder="Problema" value="{{ old('problem') }}" autocomplete="off">
                                        @error('problem')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <label for="coordinates">Coordenadas <span class="text-danger">*</span></label>
                                            <input type="text" name="coordinates" class="form-control" id="coordinates"
                                                placeholder="Coordenadas" value="{{ old('coordinates') }}"
                                                autocomplete="off">
                                            @error('coordinates')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1 text-center" style="margin-top: auto; margin-bottom: auto;">
                                        <a href="https://www.google.com/maps/@-16.5047299,-68.1550654,13z?authuser=0&entry=ttu&g_ep=EgoyMDI0MTExMy4xIKXMDSoASAFQAw%3D%3D"
                                            target="_blank" class="text-primary">
                                            <i class="fas fa-globe-americas" style="font-size: 35px"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="zone">Zona <span class="text-danger">*</span></label>
                                            <input type="text" name="zone" class="form-control" id="zone"
                                                placeholder="Zona" value="{{ old('zone') }}" autocomplete="off">
                                            @error('zone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="street">Calle <span class="text-danger">*</span></label>
                                            <input type="text" name="street" class="form-control" id="street"
                                                placeholder="Calle" value="{{ old('street') }}" autocomplete="off">
                                            @error('street')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="other">Otros </label>
                                        <input type="text" name="other" class="form-control" id="other"
                                            placeholder="Otros" value="{{ old('other') }}" autocomplete="off">
                                        @error('other')
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
        <div class="col-md-1 col-sm-12"></div>
    </div>
@stop
