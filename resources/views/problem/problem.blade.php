@extends('adminlte::page')

@section('title', 'Detección de Problemas')

@section('content_header')
    <h1>REGISTRO DE PROBLEMAS</h1>
@stop

@section('content')
    <form action="{{ route('principal') }}" method="POST">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Problema</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="problem">Problema: </label>
                                    <input type="text" name="problem" id="problem" class="form-control"
                                        placeholder="Problema">
                                    @error('problem')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="razon_social">Razon Social: </label>
                                    <input type="text" name="razon_social" id="razon_social" class="form-control"
                                        placeholder="Razon Social">
                                    @error('razon_social')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        GENERAR QR
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('principal') }}" class="btn btn-danger">
                                        CANCELAR
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
