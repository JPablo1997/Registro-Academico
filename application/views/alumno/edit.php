<div class="container">
    <div class="offset-2 col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Formulario de Alumno</h5>
                <form action="<?= 'http://localhost/escuela/index.php/alumno/edit/'.$alumno['alm_id'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $alumno['alm_id'] ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="<?= (set_value('nombre') != '') ? set_value('nombre') : $alumno['alm_nombre'] ?>">
                        <?= form_error('nombre', '<li class="text-danger">', '</li>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Edad:</label>
                        <input type="number" name="edad" class="form-control" value="<?= (set_value('edad') != '') ? set_value('edad') : $alumno['alm_edad'] ?>" min="1">
                        <?= form_error('edad', '<li class="text-danger">', '</li>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Sexo:</label>
                        <input type="text" name="sexo" class="form-control" value="<?= (set_value('sexo') != '') ? set_value('sexo') : $alumno['alm_sexo'] ?>">
                        <?= form_error('sexo', '<li class="text-danger">', '</li>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Grado:</label>
                        <select name="grado" class="form-control">
                            <option value="0">--- Seleccione Grado ---</option>
                            <?php foreach($grados as $grado): ?>
                                <option value="<?= $grado['grd_id'] ?>" <?= (set_value('grado') == $grado['grd_id'] || $grado['grd_id'] == $alumno['alm_id_grd']) ? 'selected' : '' ?>><?= $grado['grd_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('grado', '<li class="text-danger">', '</li>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Observacion:</label>
                        <input type="text" name="observacion" class="form-control" value="<?= (set_value('observacion') != '') ? set_value('observacion') : $alumno['alm_observacion'] ?>">
                        <?= form_error('observacion', '<li class="text-danger">', '</li>') ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>