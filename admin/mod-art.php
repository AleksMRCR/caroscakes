<?php
    include '../conexion.php';
    $busqueda = mysqli_query($conexion,"SELECT * FROM productos WHERE id = '".$_REQUEST['id']."'");
    if($resultado = mysqli_fetch_assoc($busqueda)){}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#bla"  />
    <title>Pasteleria Caro's Cakes</title>
    

    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body class="m-4">
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <header>
    <nav class="navbar navbar-expand-lg bg-light m-3">
      <div class="container-fluid">
        <a class="navbar-brand text-dark m-2 fw-bold" href="mesa.php">
        <img src="../img/caro.png" alt="" width="45" height="48" class="d-inline-block">
        Caro's Cakes
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="mesa.php">Volver</a>
        </li>
        </ul>
      </div>
    </nav>
    </header>

    <form class="g-3 " action="modif.php" method="POST">
    <input type="hidden" name="dato" value="modificar">
    <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
        <div class="container m-5">
            <div class="row">
                <div class="col">
                <label for="nom" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $resultado['nombre'] ?>">
                </div>
                <div class="col">
                <label for="prec" class="form-label">Precio</label>
                    <input type="text" class="form-control" id="prec" name="prec" value="<?php echo $resultado['precio'] ?>">
                </div>
                <div class="mb-3">
                    <label for="des" class="form-label">Descripcion</label>
                    <input type="text-area" class="form-control" id="des" name="des" value="<?php echo $resultado['descripcion'] ?>">
                </div>
                <div class="mb-3">
                    <label for="est" class="form-label">Estado (1 = visible / 0 = oculto)</label>
                    <input class="form-control" sytle="width:30%;" type="number" max="1" min="0" id="est" name="est" value="<?php echo $resultado['activo'] ?>">
                </div>
                <div class="g-12">
                  <button class="btn btn-primary col align-self-center" type="submit">Modificar</button>
                </div>
            </div>
        </div>

    </form>

    
    <footer class="p-3 mt-5">
        <p class="text-center m-0 text-mute">Proyecto en desarrollo - Taller de Sistemas</p>
      </footer>
      <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"
      ></script>
      <!-- JavaScript Bundle with Popper -->
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"
      ></script>
      <script src="js/scripts.js"></script>
</body>