<?php
  session_start();
  include "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
    



    <!-- Header -->
    <header>
    <nav class="navbar navbar-expand-lg bg-light m-3">
      <div class="container-fluid">
        <a class="navbar-brand text-dark m-2 fw-bold" href="home.php">
          <img src="img/caro.png" alt="" width="45" height="48" class="d-inline-block">
          Caro's Cakes
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Catalogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="us.php">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><img src="img/shopping-cart.png" alt="" width="40" height="40" class="d-inline-block">(<?php echo (empty ($_SESSION["carro"]))?0:count($_SESSION["carro"]);?>) </a>
          </li>
        </ul>
      </div>
    </nav>
    </header>

    <main>
      <h5 class = "card-title  text-center text-dark fs-3">Productos</h5> 

      <!-- Contenedor de productos -->
      <div class="container">
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 p-4">
                <?php
                  $resultado = $conexion -> query("SELECT * FROM productos WHERE activo = 1");
                  while ($fila = mysqli_fetch_array($resultado)){ ?>
                <div class="col d-flex justify-content-center mb-4">
                    <div class="card shadow mb-1 rounded" style="width: 15rem;">
                        <h5 class="card-title pt-2 text-center text-primary"><?php echo $fila['nombre']?></h5>
                        <?php
                        
                        $id = $fila['id'];
                        $imagen = "img/prod/$id/principal.jpg";

                        if (!file_exists($imagen)){
                            $imagen = "img/no-photos.png";
                        }
                        
                        ?>
                        <img src= "<?php echo $imagen; ?>">
                        <div class="card-body">
                          <p class="card-text text-black-50 description"><?php echo $fila['descripcion'];?></p>
                          <h5 class="text-primary">Precio: $<span class="precio"><?php echo number_format($fila['precio'], 0, ',', '.'); ?></span></h5>
                          <div class="d-grid gap-2">
                            <form action="index.php" method="POST">
                              <input type="hidden" name="txtproducto" value="<?php echo $fila['nombre'];?>">
                              <input type="hidden" name="txtprecio" value="<?php echo $fila['precio'];?>">
                              <input type="hidden" name="txtid" value="<?php echo $fila['id'];?>">
                              <input type="number" class="form-control w-25" name="cantidad" value="1" min="1"></br>
                              <input type="submit" class="btn btn-primary btn-sm " value="Agregar al carrito" name="btnagregar">
                              <a class="btn btn-success btn-sm" href="detalles.php?id=<?php echo $fila['id'];?>" role="button">Detalles</a>
                            </form> 
                          </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

      </div>
    </main>




    <!-- Footer -->

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


      <?php

        if(isset($_REQUEST["btnagregar"])){
          $producto = $_REQUEST["txtproducto"];
          $precio = $_REQUEST["txtprecio"];
          $id = $_REQUEST["txtid"];
          $cantidad = $_REQUEST["cantidad"] + $_SESSION["carro"][$producto]["cant"]; 


          $_SESSION["carro"][$producto]["prec"] = $precio;
          $_SESSION["carro"][$producto]["id"] = $id;
          $_SESSION["carro"][$producto]["cant"] = $cantidad;
          echo "<script> alert('$producto agregado exitosamente'); </script>";
        }
      ?>

  </body>
</html>
