<?php

    session_start();
    include '../conexion.php';

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
        <a class="navbar-brand text-dark m-2 fw-bold" href="home.php">
        <img src="../img/caro.png" alt="" width="45" height="48" class="d-inline-block">
        Caro's Cakes
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../home.php">Ir a Home</a>
          </li>
        </ul>
      </div>
    </nav>
    </header>

      <div class="container-md table-responsive">
        <h2>Productos mostrados en catalogo</h2></br>
      <table class='table table-striped x-3'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col' style = 'width:15%'>Img</th>
                    <th scope='col'>Nombre</th>
                    <th scope='col'>Precio</th>
                    <th scope='col'>Descripción</th>
                    <th scope='col'>Modificar</th>
                    <th scope='col'>Eliminar</th>
                </tr>
            </thead>
        <?php
            $resultado = $conexion -> query("SELECT * FROM productos WHERE activo = 1");
            while ($fila = mysqli_fetch_array($resultado)){ ?>
                    <tbody>
        	            <tr>
                      <td><?php echo $fila['id']?></td>
                        <?php
                        $id = $fila['id'];
                        $imagen = "../img/prod/$id/principal.jpg";

                        if (!file_exists($imagen)){
                            $imagen = "../img/no-photos.png";
                        }?>
                        <td><img src="<?php echo $imagen?>" class ='img-thumbnail rounded mx-auto d-block w-75'></td>
                        <td><?php echo $fila['nombre']?></td>
                        <td><?php echo $fila['precio']?></td>
                        <td><?php echo $fila['descripcion']?></td>
                        <td style="width: 20%;"><a href="mod-art.php?id=<?php echo $fila['id'];?>" class='btn btn-secondary' role='button' style="width: 30%;"><img src="../img/gear.png" style = 'width:60%'></a></td>
                        <td style="width: 20%;"><a href='modif.php?dato=eliminar&ref=<?php echo $fila['id'];?>' class='btn btn-danger' role='button' style="width: 30%;">X</a></td>
                        </tr>
                    </tbody>
            <?php } ?>
      </table>
        </br>

        <h2>Productos Ocultos</h2></br>
        <table class='table table-striped x-3'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col' style = 'width:15%'>Img</th>
                    <th scope='col'>Nombre</th>
                    <th scope='col'>Precio</th>
                    <th scope='col'>Descripción</th>
                    <th scope='col'>Modificar</th>
                    <th scope='col'>Eliminar</th>
                </tr>
            </thead>
        <?php
            $resultado = $conexion -> query("SELECT * FROM productos WHERE activo = 0");
            while ($fila = mysqli_fetch_array($resultado)){ ?>
                    <tbody>
        	            <tr>
                            <td><?php echo $fila['id']?></td>

                            <?php
                            $id = $fila['id'];
                            $imagen = "../img/prod/$id/principal.jpg";

                            if (!file_exists($imagen)){
                                $imagen = "../img/no-photos.png";
                            }?>
                            <td><img src="<?php echo $imagen?>" class ='img-thumbnail rounded mx-auto d-block w-75'></td>
                            <td><?php echo $fila['nombre']?></td>
                            <td><?php echo $fila['precio']?></td>
                            <td><?php echo $fila['descripcion']?></td>
                            <td style="width: 20%;"><a href="mod-art.php?id=<?php echo $fila['id'];?>" class='btn btn-secondary' role='button' style="width: 30%;"><img src="../img/gear.png" style = 'width:60%'></a></td>
                            <td style="width: 20%;"><a href='modif.php?dato=eliminar&ref=<?php echo $fila['id'];?>' class='btn btn-danger' role='button' style="width: 30%;">X</a></td>
                        </tr>
                    </tbody>
            <?php } ?>
      </table></br>

      </div></br>

      
      <div class="container-md">
      <h3>Ingresar nuevo producto</h3></br>
        <form class="g-3 " action="modif.php" method="POST">
          <input type="hidden" name="dato" value="agregar">
          <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
          <div class="mb-3">
            <label for="nom" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Ej: Torta">
          </div>
          <div class="mb-3">
            <label for="prec" class="form-label">Precio</label>
            <input type="text" class="form-control" id="prec" name="prec" placeholder="Ej: 15000">
          </div>
          <div class="mb-3">
            <label for="est" class="form-label">Estado (1 = visible / 0 = oculto)</label>
            <input class="form-control" sytle="width:30%;" type="number" max="1" min="0" id="est" name="est">
          </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Descripcion</label>
            <textarea class="form-control" id="des" name="des" rows="3" placeholder="Ingrese una descripcion del producto"></textarea>
          </div>
          <div class="mb-3">
            <button class="btn btn-primary" type="submit">Agregar</button>
          </div>
        </form>
      </div>

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