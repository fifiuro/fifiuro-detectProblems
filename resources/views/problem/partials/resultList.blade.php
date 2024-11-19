<div class="card">
    <div class="card-header">
        <h3 class="card-title">Resultado de la Busqueda</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Problema</th>
                    <th class="text-center">Mapa</th>
                    <th>Zona</th>
                    <th>Calle / Avenida</th>
                    <th>Fecha Regsitro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr>
                        <td>{{ $d->problem }}</td>
                        <td class="text-center">
                            <a href="{{ $d->coordinates }}" target="_blank">
                                <i class="fas fa-map-marked-alt" style="font-size: 20px;"></i>
                            </a>
                        </td>
                        <td>{{ $d->zone }}</td>
                        <td>{{ $d->street }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($d->date)->format('d/m/Y H:i:s') }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('problem.edit', $d->id) }}" class="btn btn-info">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="#" class="btn btn-danger btn-modal" data-toggle="modal" data-target="#modal-eliminar"
                                data-id="{{ $d->id }}" data-problem="{{ $d->problem }}"
                                data-coordinates="{{ $d->coordinates }}" data-zone="{{ $d->zone }}"
                                data-street="{{ $d->street }}" data-date="{{ \Carbon\Carbon::parse($d->date)->format('d/m/Y H:i:s') }}"
                                data-other="{{ $d->other }}">
                                <i class="far fa-trash-alt"></i>
                            </a>

                            <a href="{{ route('comments.list', $d->id) }}" class="btn bg-indigo">
                                <i class="fa fa-comment-dots text-white"></i>
                            </a>

                            <a href="{{ route('photos.list', $d->id) }}" class="btn bg-yellow">
                                <i class="fas fa-camera-retro text-black"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('partialsGlobal.pagination')

</div>
