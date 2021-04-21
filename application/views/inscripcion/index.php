<div class="container">
    <?php if(count($inscripcionesData) > 0): ?>

    <div class="form-group col-md-4">
        <label for="alumnos_select">Alumnos</label>   
        <select name="alumnos_select" id="alumnos_select" class="form-control">
            <option value="0">Todos</option>

            <?php foreach($inscripcionesData as $inscripcionData): ?>
                <option <?= "value='".$inscripcionData['alumno']['alm_id']."'"; ?>>
                    <?= $inscripcionData['alumno']['alm_nombre'] ?>
                </option>
            <?php endforeach; ?>

        </select>
    </div>
    <br>

    <table class="table table-bordered table-hover table-striped">
        <thead>
            <th>Alumno</th>
            <th>Grado</th>
            <th>Materias</th>
        </thead>
        <tbody id="tbody">

            <?php foreach($inscripcionesData as $inscripcionData): ?>
                <tr>
                    <td><?= $inscripcionData['alumno']['alm_nombre'] ?></td>
                    <td><?= $inscripcionData['grado']['grd_nombre'] ?></td>
                    <td><?= $inscripcionData['materias'] ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <?php else: ?>

    <div class="alert alert-warning">
        No hay datos de inscripcion en el sistema.
    </div>

    <?php endif; ?>
</div>

<script type="text/javascript">
window.onload = function() {
    $('#alumnos_select').on('change', function(e){
    const alumnoId = $(this).val();

    $.ajax({
        url: "http://localhost/escuela/index.php/inscripcion/inscripciones/" + alumnoId,
        success: function(data){
            var html = "";
            console.log(data);

            if(data.length > 0){
                for(var i = 0; i < data.length; i++){
                    html += "<tr>";
                    html += "<td>" + data[i].alumno.alm_nombre + "</td>";
                    html += "<td>" + data[i].grado.grd_nombre + "</td>";
                    html += "<td>" + data[i].materias + "</td>";
                    html += "</tr>";
                }
            }
            
            $('#tbody').html(html);
        }
    });
});
}
</script>
