<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Comentarios</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
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
                                {{-- {{ dd(asset($d->path)) }} --}}
                            <img src="{{ asset('storage/'.$d->path) }}" alt="{{ $d->filename }}" style="width:200px; height:auto;">
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
        </table>
    </div>

</div>
