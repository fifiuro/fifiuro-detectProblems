<div class="card">
    <div class="card-header">
        <h3 class="card-title">Resultado de la Busqueda</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Nombre de Usuario</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr>
                        <td>{{ $d->name }} {{ $d->last_name }}</td>
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('users.edit', $d->id) }}" class="btn btn-info">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="#" class="btn btn-danger btn-modal" data-toggle="modal" data-target="#modal-eliminar"
                                data-id="{{ $d->id }}" data-problem="{{ $d->problem }}"
                                data-coordinates="{{ $d->coordinates }}" data-zone="{{ $d->zone }}"
                                data-street="{{ $d->street }}" data-date="{{ \Carbon\Carbon::parse($d->date)->format('d/m/Y H:i:s') }}"
                                data-other="{{ $d->other }}">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('partialsGlobal.pagination')

</div>
