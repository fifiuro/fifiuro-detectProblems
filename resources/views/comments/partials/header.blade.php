<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Datos del Problema</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="problem">Problema: </label>
                            {{ $header->problem }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="zone">Zona: </label>
                            {{ $header->zone }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="street">Calle: </label>
                            {{ $header->street }}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="coordinates">Ubicación: </label>
                            <a href="{{ $header->coordinates }}" target="_blank">
                                <i class="fas fa-map-marked-alt" style="font-size: 20px;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Fecha Registro: </label>
                            {{ \Carbon\Carbon::parse($header->date)->format('d/m/Y H:i:s') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="other">Otros: </label>
                            {{ $header->other }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 text-right">
                <a href="{{ route('comments.new', $header->id) }}" class="btn btn-success">
                    <i class="fas fa-plus"></i>
                </a>
                <a href="{{ route('problem.list') }}" class="btn btn-danger">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</div>
