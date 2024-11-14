<div class="modal fade" id="modal-eliminar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">¿Esta seguro de eliminar el Problema?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td><strong>Problema:</strong></td>
                        <td class="problem"></td>
                    </tr>
                    <tr>
                        <td><strong>Coordinadas:</strong></td>
                        <td class="coordinates"></td>
                    </tr>
                    <tr>
                        <td><strong>Zona:</strong></td>
                        <td class="zone"></td>
                    </tr>
                    <tr>
                        <td><strong>Calle:</strong></td>
                        <td class="street"></td>
                    </tr>
                    <tr>
                        <td><strong>Fecha / Hora:</strong></td>
                        <td class="date"></td>
                    </tr>
                    <tr>
                        <td><strong>Otras:</strong></td>
                        <td class="other"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="#" class="btn btn-danger" id="btn-eliminar">SI</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->