<div class="container">
    <a href="http://localhost/escuela/index.php/materia/create" class="btn btn-primary mb-2">
        <i class="fas fa-plus-circle"></i> Agregar
    </a>
    <table class="table table-bordered table-striped">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php foreach($materias as $materia): ?>
                <tr>
                    <td><?= $materia['mat_id'] ?></td>
                    <td><?= $materia['mat_nombre'] ?></td>
                    <td>
                        <a href="<?= 'http://localhost/escuela/index.php/materia/edit/'.$materia['mat_id'] ?>" class="btn btn-sm btn-success">
                            <span><i class="fas fa-pencil-alt"></i></span>
                        </a>
                        <button onclick="eliminarMateria('<?= $materia['mat_id'] ?>', '<?= $materia['mat_nombre'] ?>')"" class="btn btn-sm btn-danger">
                            <span><i class="fas fa-trash"></i></span>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Modal Confirmacion -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea eliminar la materia <b id="nombre"></b>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="#" id="btn_eliminar" class="btn btn-danger">Eliminar</a>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
    function eliminarMateria(id, nombre){
        $('#nombre').text(nombre);
        $('#btn_eliminar').attr("href", "http://localhost/escuela/index.php/materia/delete/" + id);
        $('#exampleModal').modal();
    }
</script>