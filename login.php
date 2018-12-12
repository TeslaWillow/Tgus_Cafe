<?php session_start();
  require "admin/config.php";
  require "funciones.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["usuario"]) && isset($_POST["password"])){
      $conn = conexion($bd_config);
      if(!$conn){
        header("Location: 404.php");
      }

      $usuario = limpiar_Datos($_POST["usuario"]);
      $pass = limpiar_Datos($_POST["password"]);
      $resultado = acceso_Usuario($usuario, $pass, $conn);

      if(empty($resultado)){
        echo "Usuario o Contraseña incorrectos";
        $conn = null;
      }else{
        $_SESSION["admin"] = $arrayName = array('NOMBRE' => $resultado[0]['NOMBRE_USUARIO'], 'ROL' => $resultado[0]['TIPO_USUARIO']);
        header('Location:'. RUTA . "admin/" . $resultado[0]['TIPO_USUARIO'] . ".php");
      }

    }
  };
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Login/login.css">
    <link rel="shortcut icon" href="Img/favicon.ico" type="image/x-icon">
  	<link rel="icon" href="Img/favicon.ico" type="image/x-icon">
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
          <form class="d-flex flex-column" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="text" placeholder="Usuario" name="usuario" required>
            <input type="password" placeholder="Contraseña" name="password" required>
            <input class="d-flex justify-content-center" type="submit" value="Iniciar sesion">
            <a href="index.html">&lt;&lt;   Regresar</a>
          </form>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
  </body>
</html>
