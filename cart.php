<?php

    session_start();
    include 'conexion.php';
          $total = 0;
          if(isset($_SESSION["carro"])){
            foreach($_SESSION["carro"] as $indice => $arreglo){
              $total += $arreglo["cant"]*$arreglo["prec"];
              $id = $arreglo['id'];
              $imagen = "img/prod/$id/principal.jpg";

              if (!file_exists($imagen)){
                $imagen = "img/no-photos.png";
              }
            }
          }else{
            echo "<script> alert('El carrito esta vacio'); </script>";
            header('Location:index.php');
          }
          if(isset($_REQUEST["vaciar"])){
            session_destroy();
            header('Location:cart.php');
          }
          if(isset($_REQUEST["item"])){
            $producto = $_REQUEST["item"];
            $cont -= $arreglo["cant"];
            unset($_SESSION["carro"][$producto]);
            echo "<script>alert('Se elimno el producto: $producto');</script>";
            header('Location:cart.php');
           } 
          
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
            <a class="nav-link" href="cart.php"><img src="img/shopping-cart.png" alt="" width="40" height="40" class="d-inline-block"> (<?php echo (empty ($_SESSION["carro"]))?0:count($_SESSION["carro"]);?>) </a>
          </li>
        </ul>
      </div>
    </nav>
    </header>

      <div class="container-md">
        <?php
          $total = 0;
          if(isset($_SESSION["carro"])){
            echo "<table class='table table-striped x-3'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>ID</th>";
            echo "<th scope='col' style = 'width:15%'>Img</th>";
            echo "<th scope='col'>Nombre</th>";
            echo "<th scope='col'>Cantidad</th>";
            echo "<th scope='col'>Precio</th>";
            echo "<th scope='col'>Eliminar</th>";
            echo "</tr>";
            echo "</thead>";
            foreach($_SESSION["carro"] as $indice => $arreglo){
              $total += $arreglo["cant"]*$arreglo["prec"];
              echo "<tbody>";
              echo "<tr>";
              echo "<td>". $arreglo["id"] . "</td>";

              $id = $arreglo['id'];
              $imagen = "img/prod/$id/principal.jpg";

              if (!file_exists($imagen)){
                $imagen = "img/no-photos.png";
              }
              echo "<td><img src=". $imagen ." class ='img-thumbnail rounded mx-auto d-block w-75'></td>";
              echo "<td>". $indice . "</td>";
              echo "<td>". $arreglo["cant"] . "</td>";
              echo "<td>". $arreglo["prec"]*$arreglo["cant"] . "</td>";
              echo "<td><a href='cart.php?item=$indice' class='btn btn-danger' role='button'>X</a></td>";
              echo "</tr>";
              echo "</tbody>";
            }
          }else{
            echo "<script> alert('El carrito esta vacio'); </script>";
            header('Location:index.php');
          }
          if(isset($_REQUEST["vaciar"])){
            session_destroy();
            header('Location:cart.php');
          }
          if(isset($_REQUEST["item"])){
            $producto = $_REQUEST["item"];
            $cont -= $arreglo["cant"];
            unset($_SESSION["carro"][$producto]);
            echo "<script>alert('Se elimno el producto: $producto');</script>";
            header('Location:cart.php');
           } 
          
        ?>
        </table>
        <?php
          echo "</br><h3 class ='text-end'>Total: $ ". number_format($total, 0, ',', '.'). "</h3>";
          echo "</br><h4 class ='text-end'>Abono: $ ". number_format($total*0.4, 0, ',', '.'). " / a la entrega: $ ". number_format($total*0.6, 0, ',', '.')." </h4></br>";
          echo '<div class="d-grid gap-2 d-md-flex justify-content-md-end">';
          echo '<a href="cart.php?vaciar=true" class="btn btn-danger me-md-2" role="button"> Vaciar carrito </a>';
          echo '<form action = "cart.php" method = "POST"><a href="formul.php?precio='.$total*0.4.'" class="btn btn-success me-md-2" role="button"> Comprar </a></form>';
          echo '</div>';
        ?>
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