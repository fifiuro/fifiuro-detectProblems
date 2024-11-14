<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Comentarios</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Comentario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr>
                        <td>
                            @if ($d->type == 'C')
                                Comentario
                            @elseif ($d->type == 'O')
                                Oficial
                            @endif
                        </td>
                        <td>
                            @isset($d->user->name)
                                {{ $d->user->name }} {{ $d->user->last_name }}
                            @else
                                No hay nombre...
                            @endisset
                        </td>
                        <td>{{ $d->comment }}</td>
                        <td>
                            <a href="{{ route('comments.edit', $d->id) }}" class="btn btn-info">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="#" class="btn btn-danger btn-modal" data-toggle="modal"
                                data-target="#modal-eliminar" data-id="{{ $d->id }}"
                                data-type="{{ $d->type }}" data-comment="{{ $d->comment }}">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
