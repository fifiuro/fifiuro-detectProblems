<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Imagenes</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            @foreach ($data as $key => $d)
                <div class="col-md-4">
                    <div class="card" style="{{ ($d->choose) ? 'border: 2px solid rgb(92, 210, 92);' : '' }} ">
                        <div class="card-body">
                            <div class="col-md-12 text-center">
                                <img src="{{ asset('storage/' . $d->path) }}" alt="{{ $d->filename }}"
                                    style="width:200px; height:auto;">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input-group">
                                <div class="row">
                                    <a href="{{ route('photos.choose', [ 'id' => $d->id, 'problem_id' => $header->id ]) }}" class="btn btn-modal {{ ($d->choose) ? 'btn-success' : 'btn-danger' }}">
                                        <i class="{{ ($d->choose) ? 'fas fa-check' : 'fas fa-times' }}"></i>
                                    </a>


                                    <a href="#" class="btn btn-primary btn-modal" data-toggle="modal"
                                        data-target="#modal-eliminar" data-type='view'
                                        data-problem_id="{{ $header->id }}" data-id="{{ $d->id }}"
                                        data-path="{{ asset('storage/' . $d->path) }}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-modal" data-toggle="modal"
                                        data-target="#modal-eliminar" data-type='delete'
                                        data-problem_id="{{ $header->id }}" data-id="{{ $d->id }}"
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
