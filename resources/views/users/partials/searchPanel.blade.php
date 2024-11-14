<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Buscar Usuarios Registrados</h3>
    </div>
    <form action="{{ route('users.find') }}" method="GET">
        @csrf
        @method('GET')
        <div class="card-body">
            <div class="row">
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="username">Nombre de Usuario</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Nombre de Usuario" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="btn-group">
                        <button type="submit" class="btn bg-primary btn-default">
                            <i class="fas fa-search"></i><br>Buscar
                        </button>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('users.new') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i><br>Nuevo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
