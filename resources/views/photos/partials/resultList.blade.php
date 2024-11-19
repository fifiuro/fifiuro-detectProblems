<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Comentarios</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {{-- <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre de Archivo</th>
                    <th>Ruta</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr>
                        <td>
                            {{ $d->filename }}
                        </td>
                        <td>
                            {{ $d->path }}
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $d->path) }}" alt="{{ $d->filename }}"
                                style="width:200px; height:auto;">
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger btn-modal" data-toggle="modal"
                                data-target="#modal-eliminar" data-problem_id="{{ $header->id }}"
                                data-id="{{ $d->id }}" data-type="{{ $d->type }}"
                                data-comment="{{ $d->comment }}">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
        <div class="row">
            @foreach ($data as $key => $d)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $d->path) }}" alt="{{ $d->filename }}"
                                style="width:200px; height:auto;">
                        </div>
                        <div class="card-footer">
                            <div class="input-group">
                                <div class="row">
                                    <a href="#" class="btn btn-primary btn-modal" data-toggle="modal"
                                        data-target="#modal-eliminar" data-type='view' data-problem_id="{{ $header->id }}"
                                        data-id="{{ $d->id }}"
                                        data-path="{{ asset('storage/' . $d->path) }}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-modal" data-toggle="modal"
                                        data-target="#modal-eliminar" data-type='delete' data-problem_id="{{ $header->id }}"
                                        data-id="{{ $d->id }}"
                                        data-path="{{ asset('storage/' . $d->path) }}">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
