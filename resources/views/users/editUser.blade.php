@extends('adminlte::page')

@section('title', 'Administación de Problemas')

@section('content_header')
    <h1 class="m-0 text-dark">Administación de Usuarios</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-1 col-sm-12"></div>
        <div class="col-md-10 col-sm-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Editar Usuario</h3>
                </div>
                <form action="{{ route('users.update', $id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{-- {{ dd(Auth::user()) }} --}}
                                    <label for="type">Tipo de Usuario <span class="text-danger">*</span></label>
                                    @if (Auth::user()->type == 'user')
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Selecionar una opción</option>
                                            <option value="user"
                                                {{ old('type', $data->type) == 'user' ? 'selected' : '' }}>Usuario</option>
                                        </select>
                                    @elseif(Auth::user()->type == 'admin')
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Selecionar una opción</option>
                                            <option value="user"
                                                {{ old('type', $data->type) == 'user' ? 'selected' : '' }}>Usuario</option>
                                            <option value="admin"
                                                {{ old('type', $data->type) == 'admin' ? 'selected' : '' }}>Administrador
                                            </option>
                                        </select>
                                    @endif
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre(s) <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nombre(s)" value="{{ old('name', $data->name) }}" autocomplete="off">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Apellidos <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control" id="last_name"
                                        placeholder="Apellidos" value="{{ old('last_name', $data->last_name) }}"
                                        autocomplete="off">
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="username">Nombre de Usuario <span class="text-danger">*</span></label>
                                    <input type="text" name="username" class="form-control" id="username"
                                        placeholder="Nombre de Usuario" value="{{ old('username', $data->username) }}"
                                        autocomplete="off">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" id="email"
                                        placeholder="Correo Electrónico" value="{{ old('email', $data->email) }}"
                                        autocomplete="off">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Contraseña <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Contraseña">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmar Contraseña <span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" placeholder="Contraseña">
                                    @error('password_confirmation')
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
                                        GUARDAR
                                    </button>
                                </div>
                                @if (Auth::user()->type == 'user')
                                    <div class="col-md-6">
                                        <a href="{{ route('problem.list') }}" class="btn btn-danger">
                                            CANCELAR
                                        </a>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <a href="{{ route('users.list') }}" class="btn btn-danger">
                                            CANCELAR
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1 col-sm-12"></div>
    </div>
@stop
