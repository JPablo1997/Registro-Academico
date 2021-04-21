<div class="container">
    <div class="offset-2 col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Formulario de Alumno</h5>
                <?= form_open('alumno/create') ?>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="<?= set_value('nombre') ?>" placeholder="Ingrese el Nombre...">
                        <?= form_error('nombre', '<li class="text-danger">', '</li>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Edad:</label>
                        <input type="number" name="edad" class="form-control" value="<?= set_value('edad') ?>" min="1">
                        <?= form_error('edad', '<li class="text-danger">', '</li>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Sexo:</label>
                        <input type="text" name="sexo" class="form-control" value="<?= set_value('sexo') ?>" placeholder="Ingrese el Sexo...">
                        <?= form_error('sexo', '<li class="text-danger">', '</li>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Grado:</label>
                        <select name="grado" class="form-control">
                            <option value="0">--- Seleccione Grado ---</option>
                            <?php foreach($grados as $grado): ?>
                                <option value="<?= $grado['grd_id'] ?>" <?= (set_value('grado') == $grado['grd_id']) ? 'selected' : '' ?>><?= $grado['grd_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('grado', '<li class="text-danger">', '</li>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Observacion:</label>
                        <input type="text" name="observacion" class="form-control" value="<?= set_value('observacion') ?>" placeholder="Ingrese una Observacion...">
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