<div class="card">
    <div class="card-header">
        <h3 class="card-title">Resultado de la Busqueda</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre Área</th>
                    <th>Slug</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr>
                        <td>{{ $d->problem }}</td>
                        <td>{{ $d->coordinates }}</td>
                        <td>{{ $d->zone }}</td>
                        <td>{{ $d->street }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($d->date)->format('d/m/Y h:m:s') }}
                        </td>
                        <td>{{ $d->other }}</td>
                        <td>
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    Opciones
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <a href="{{ route('problem.edit', $d->id) }}">Editar</a>
                                    </li>

                                    <li class="dropdown-item">
                                        <a href="#" class="btn-modal" data-toggle="modal"
                                            data-target="#modal-eliminar" data-id="{{ $d->id }}"
                                            data-problem="{{ $d->problem }}" data-coordinates="{{ $d->coordinates }}"
                                            data-zone="{{ $d->zone }}" data-street="{{ $d->street }}" 
                                            data-date="{{ $d->date }}" data-other="{{ $d->other }}">Eliminar</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('partialsGlobal.pagination')

</div>
