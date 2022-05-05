<?php 
include("../template/header.php");
include("../config/db.php");

//declaracion de variables ternarias
$textID=(isset($_POST['textID']))?$_POST['textID']:"";
$textNombre=(isset($_POST['textNombre']))?$_POST['textNombre']:"";
$textImg=(isset($_FILES['textImg']['name']))?$_FILES['textImg']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

//logica
switch ($accion) {
    case 'Agregar':
        echo "Presionado Agregar";
        $sql = "INSERT INTO libros (nombre, imagen) VALUES (:nombre, :img);";
        $sentencia = $conexion->prepare($sql);
        //recepcion de parametros desde formuario
        $sentencia->bindParam(':nombre', $textNombre);
        $sentencia->bindParam(':img', $textImg);
        $sentencia->execute();

        break;
    case 'Modificar':
        echo "Presionado Modificar";
        break;
    case 'Cancelar':
        echo "Presionado Cancelar";
        break;
    default:
        # code...
        break;
}
?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos de libro
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="textID">ID:</label>
                    <input type="text" class="form-control" id="textID" name="textID" aria-describedby="textID" placeholder="ID">
                </div>
                <div class="form-group">
                    <label for="textNombre">Nombre:</label>
                    <input type="text" class="form-control" id="textNombre" name="textNombre" aria-describedby="textNombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="textImg">Imagen:</label>
                    <input type="file" class="form-control" id="textImg" name="textImg" aria-describedby="textImg">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button id="" name="accion" value="Agregar" type="submit" class="btn btn-success">Agregar</button>
                    <button id="" name="accion" value="Modificar" type="submit" class="btn btn-warning">Modificar</button>
                    <button id="" name="accion" value="Cancelar" type="submit" class="btn btn-info">Cancelar</button>
                </div>
            </form>
        </div>
    </div>    
</div>

<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    2
                </td>
                <td>
                    aprende.php
                </td>
                <td>
                    imagen.png
                </td>
                <td>
                    Seleccionar | Borrar
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php include("../template/footer.php")?>