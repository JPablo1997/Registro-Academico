<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Academico</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    
    <style>
        .footer {
        position: fixed;
        left: 0px;
        bottom: 0px;
        right: 0px;
        width: 100%;
        text-align: center;
        margin-bottom: 0px;
        }

        body {
            margin-bottom:50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="http://localhost/escuela/index.php">Registro Academico</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($op == 'A') ? 'active' : '' ?>">
                <a class="nav-link" href="http://localhost/escuela/index.php/alumno/index">Alumnos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?= ($op == 'G') ? 'active' : '' ?>">
                <a class="nav-link" href="http://localhost/escuela/index.php/grado/index">Grados</a>
            </li>
            <li class="nav-item <?= ($op == 'M') ? 'active' : '' ?>">
                <a class="nav-link" href="http://localhost/escuela/index.php/materia/index">Materias</a>
            </li>
            <li class="nav-item <?= ($op == 'I') ? 'active' : '' ?>">
                <a class="nav-link" href="http://localhost/escuela/index.php/inscripcion/index">Inscripciones</a>
            </li>
        </div>
    </nav>
    <h3 class="mt-3 mb-3 ml-5"><?= $title ?></h3>