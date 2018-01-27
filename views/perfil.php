<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION['matricula']) || $_SESSION['matricula'] === -1)
    header("Location: http://localhost/LobosConectados");
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0">
    <title>Inicio</title>

    <link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" type="image/x-icon" href="https://www.upemor.edu.mx/favicon.ico"/>
 		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <nav class="wrapper">
      <div class="nav-wrapper container">
        <a href="#!" class="brand-logo center">Lobos conectados</a>
      </div>
    </nav>
    <aside>
      <ul id="slide-out" class="side-nav fixed" style="transform: translateX(0%);">
        <div class="user-view">
          <img src="img/logo-nav.jpg">
        </div>
        <br><br>
        <div class="divider" style="margin: 20px 0;"></div>
        <li><a href="dashboard.php" class="waves-effect waves-light white-text"><i class="material-icons white-text">home</i>Inicio</a></li>
        <li><a href="perfil.php" class="waves-effect waves-light white-text"><i class="material-icons white-text white-text">person</i>Perfil</a></li>
        <li><a href="#" class="waves-effect waves-light white-text"><i class="material-icons white-text">power_settings_new</i>Cerrar sesión</a></li>
      </ul>
    </aside>

    <main>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <h5>Perfil</h5>
            <div class="divider"></div>
            <div class="perfil">
              <h6>Nombre/s: Marco Alejandro</h6>
              <h6>Apellidos: Vargas Bedoya</h6>
              <h6>Matrícula: VBMO150192</h6>
              <h6>Correo: vbmo150192@upemor.edu.mx</h6>
              <h6>Carrera: IIF</h6>
              <h6>Grado: 8</h6>
              <h6>Grupo: A</h6>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="page-footer">
      <div class="footer-copyright">
        <div class="container">
          Desarrolladores: Vargas Bedoya Marco Alejandro - González rojas Iván Uriel
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	  <script src="js/materialize.js"></script>
  </body>
</html>
