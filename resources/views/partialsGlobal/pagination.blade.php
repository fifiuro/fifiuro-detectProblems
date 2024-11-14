<div class="card-footer clearfix">
    @if ($data->hasPages())
        <ul class="pagination pagination-sm m-0 float-left">
            {{-- Botón "Anterior" --}}
            @if ($data->onFirstPage())
                <li class="disabled page-item"><span>Anterior</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $data->previousPageUrl() }}"
                        rel="pev">Anterior</a></li>
            @endif
            {{-- Elementos de página --}}
            @foreach ($data->getUrlRange(1, $data->lastPage()) as $pagina => $url)
                @if ($data->currentPage() == $pagina)
                    <li>
                        <a style="pointer-events: none; background-color: gray; color: white;" class="page-link"
                            href="{{ $url }}">{{ $pagina }}</a>
                    </li>
                @else
                    <li class="">
                        <a class="page-link" href="{{ $url }}">{{ $pagina }}</a>
                    </li>
                @endif
            @endforeach
            {{-- Botón "Siguiente" --}}
            @if ($data->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}"
                        rel="next">Siguiente</a></li>
            @else
                <li class="disabled page-item"><span>Siguiente</span></li>
            @endif
        </ul>
    @endif
    <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item"><strong>Página actual:</strong> {{ $data->currentPage() }}</li>
        <li class="page-item" style="color: white;">---</li>
        <li class="page-item"><strong>Total de registros:</strong> {{ $data->total() }}</li>
    </ul>
</div>