<?php
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
session_start();
$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost","root","@7295","pasteleria");

$consulta = "SELECT * FROM usuarios WHERE nombre = '$usuario' AND contraseña = '$contrasena'";
$resultado = mysqli_query($conexion,$consulta);

$filas = mysqli_num_rows($resultado);

if($filas){
    header("location:mesa.php");
    
}else{
    ?>
    <?php
    include('index.php');
    ?>
    <div class="container text-center w-75">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error</strong> Datos no validos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);