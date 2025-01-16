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
                <form action="{{ route('users.update', $id) }}" method="POST" id="userForm" onsubmit="return validatePasswords()">
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
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Contraseña">
                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="button" id="togglePassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmar Contraseña <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="password_confirmation" placeholder="Contraseña">
                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="button" id="toggleConfirmPassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
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
                                        EDITAR
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

@section('js')
<script>
    function togglePasswordVisibility(inputId, buttonId) {
        const input = document.getElementById(inputId);
        const button = document.getElementById(buttonId);
        const icon = button.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    document.getElementById('togglePassword').addEventListener('click', function() {
        togglePasswordVisibility('password', 'togglePassword');
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        togglePasswordVisibility('password_confirmation', 'toggleConfirmPassword');
    });

    function validatePasswords() {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        
        // Remove any existing error messages
        const existingError = document.getElementById('password-match-error');
        if (existingError) {
            existingError.remove();
        }

        // Check if passwords match
        if (password.value !== confirmPassword.value) {
            // Create error message
            const errorDiv = document.createElement('div');
            errorDiv.id = 'password-match-error';
            errorDiv.className = 'alert alert-danger mt-2';
            errorDiv.textContent = 'Las contraseñas no coinciden';
            
            // Insert error after confirm password field
            confirmPassword.parentNode.parentNode.insertBefore(errorDiv, confirmPassword.parentNode.nextSibling);
            
            return false;
        }
        
        return true;
    }

    // Add input event listeners to validate in real-time
    document.getElementById('password').addEventListener('input', validatePasswords);
    document.getElementById('password_confirmation').addEventListener('input', validatePasswords);
</script>
@stop
