<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Login/login.css">
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-7 d-flex justify-content-center" id="left_background">
          <img src="Img/Tgus ico render.png" alt="Login_background">
        </div>
        <div class="col-sm-12 col-md-5" id="right_background">
          <h3 class="d-flex justify-content-center">Login</h3>
          <!-- FORMULARIO PARA PHP -->
          <form class="d-flex flex-column" action="" method="post">
            <input type="text" placeholder="Usuario" name="nombre" value="">
            <input type="password" placeholder="Contraseña" name="password" value="">
            <input class="d-flex justify-content-center" type="submit" value="Submit">
            <a href="index.html">Regresar</a>
          </form>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
  </body>
</html>
