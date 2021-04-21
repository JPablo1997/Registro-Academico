<div class="container">
    <div class="offset-2 col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Formulario de Grado</h5>
                <form action="<?= 'http://localhost/escuela/index.php/grado/edit/'.$grado['grd_id'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $grado['grd_id'] ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="<?= (set_value('nombre') != '') ? set_value('nombre') : $grado['grd_nombre']  ?>">
                        <?= form_error('nombre', '<li class="text-danger">', '</li>') ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>