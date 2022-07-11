<?php

    include '../conexion.php';
    
    if($_POST['dato']=='modificar'){
        $ref = $_POST['id'];
        $n_nombre = $_POST['nom'];
        $n_precio = $_POST['prec'];
        $n_descripcion = $_POST['des'];
        $n_estado = $_POST['est'];
        $ref = str_replace("'","", $ref);
        mysqli_query($conexion,"UPDATE productos SET nombre = '$n_nombre',precio = '$n_precio',descripcion = '$n_descripcion',activo = '$n_estado' WHERE id =$ref");
        header('Location:mesa.php');
    }
    echo $_GET;
    if($_GET['dato']=='eliminar'){
        $ref = $_GET['ref'];
        mysqli_query($conexion,"DELETE FROM productos WHERE id = '$ref'");
        header('Location:mesa.php');
    }
    if($_POST['dato']=='agregar'){
        $a_nombre = $_POST['nom'];
        $a_precio = $_POST['prec'];
        $a_descripcion = $_POST['des'];
        $a_estado = $_POST['est'];
        mysqli_query($conexion,"INSERT INTO productos (nombre,precio,descripcion,activo) VALUES ('$a_nombre','$a_precio','$a_descripcion','$a_estado')");
        header('Location:mesa.php');
    }

?>