<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Buscar Problemas Registrados</h3>
    </div>
    <form action="{{ route('problem.find') }}" method="GET">
        @csrf
        @method('GET')
        <div class="card-body">
            <div class="row">
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="problem">Problema</label>
                                <input type="text" name="problem" class="form-control" id="problem"
                                    placeholder="Problema" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="zone">Zona</label>
                                <input type="text" name="zone" class="form-control" id="zone"
                                    placeholder="Zona" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="finicio">Fecha Inicio</label>
                                <input type="date" name="finicio" class="form-control" id="finicio"
                                    placeholder="Fecha Inicio" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ffin">Fecha Fin</label>
                                <input type="date" name="ffin" class="form-control" id="ffin"
                                    placeholder="Fecha Fin" value="" autocomplete="off">
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
                        <a href="{{ route('problem.new') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i><br>Nuevo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
