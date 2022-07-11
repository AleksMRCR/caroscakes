<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#bla"  />
    <title>Formulario</title>
    

    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="style.css" />
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
            <a class="nav-link" href="cart.php"><img src="img/shopping-cart.png" alt="" width="40" height="40" class="d-inline-block"> () </a>
          </li>
        </ul>
      </div>
    </nav>
    </header>


    <h1 class="d-flex flex-wrap justify-content-center m-4"> Por favor ingrese sus datos de contacto </h1></br>
        <form action="done.html" class="m-4">
            <div class="row">
                <div class="col">
                  <label for="nom" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nom" placeholder="Nombre" aria-label="Nombre" required>
                </div>
                <div class="col">
                  <label for="ape" class="form-label">Apellido</label>
                  <input type="text" class="form-control" id="ape" placeholder="Apellido" aria-label="Apellido" required>
                </div>
            </div></br>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">Nunca compartiremos tu inromacion con otros.</div>
            </div>
            <label class="form-label">Numero de contacto</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">+56</span>
                <input type="text" class="form-control" id="cel" placeholder="Telefono" aria-label="Telefono" aria-describedby="basic-addon1" required>
            </div>
            <div class="mb-3">
              <label for="dir" class="form-label">Lugar de entrega</label>
              <input type="text" class="form-control" id="dir" placeholder="Direccion" aria-describedby="basic-addon2" required>
            </div>
            <div class="mb-3">
              <label for="fec" class="form-label">Fecha de entrega</label>
              <input type="date" class="form-control" id="fec" placeholder="fecha" aria-describedby="basic-addon3" required>
            </div>
            <div class="mb-3">
              <label for="com" class="form-label">Comentarios</label>
              <textarea class="form-control" id="com" rows="3"></textarea>
            </div>
            </br>

            <button type="submit" class="btn btn-primary">Enviar</button>
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
  </body>
</html>