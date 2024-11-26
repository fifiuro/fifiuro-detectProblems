@extends('adminlte::page')

@section('title', 'Detección de Problemas')

@section('content_header')
    <h1>BIENVENIDO AL SISTEMA DETECTOR DE PROBLEMAS</h1>
@stop

@section('content')
    <div class="row">
        @foreach ($data as $key => $d)
            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{ $d->problem }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12 text-center">
                                    @isset($d->path)
                                        <img src="{{ asset('storage/' . $d->path) }}" alt="{{ $d->filename }}"
                                            style="width:200px; height:auto;">
                                    @endisset
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Problem: </label> {{ $d->problem }}
                            </div>
                            <div class="col-md-6">
                                <label for="">Coordenadas: </label> <a href="{{ $d->coordinates }}" target="_blank">
                                    <i class="fas fa-map-marked-alt" style="font-size: 20px;"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <label for="">Zona: </label> {{ $d->zone }}
                                </a>
                            </div>
                            <div class="col-md-6">
                                <label for="">Calle / Avenida: </label> {{ $d->street }}
                                </a>
                            </div>
                            <div class="col-md-12">
                                <label for="">Calle / Avenida: </label> {{ $d->street }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('comments.list', $d->id) }}" class="btn bg-indigo">
                            <i class="fa fa-comment-dots text-white"></i>
                        </a>
                        <a href="{{ route('photos.list', $d->id) }}" class="btn bg-yellow">
                            <i class="fas fa-camera-retro text-black"></i>
                        </a>
                        <a href="{{ route('problem.preview', $d->id) }}" class="btn bg-success">
                            <i class="far fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
