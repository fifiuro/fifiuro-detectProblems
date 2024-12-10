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
                    <th>Solución</th>
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
                                NN
                            @endisset
                        </td>
                        <td>{!! $d->comment !!}</td>
                        <td>{!! $d->solution !!}</td>
                        <td>
                            @if ($d->type == 'O')
                                @if ($data->oficial)
                                    <a href="{{ route('comments.edit', $d->id) }}" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-modal" data-toggle="modal"
                                        data-target="#modal-eliminar" data-problem_id="{{ $header->id }}"
                                        data-id="{{ $d->id }}" data-type="{{ $d->type }}"
                                        data-comment="{{ $d->comment }}">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                @endif
                            @endif

                            @if ($d->type == 'C')
                                @if (!$data->oficial)
                                    @if ($d->user_id == Auth::user()->id)
                                        <a href="{{ route('comments.edit', $d->id) }}" class="btn btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-modal" data-toggle="modal"
                                            data-target="#modal-eliminar" data-problem_id="{{ $header->id }}"
                                            data-id="{{ $d->id }}" data-type="{{ $d->type }}"
                                            data-comment="{{ $d->comment }}">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    @endif
                                @endif
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
