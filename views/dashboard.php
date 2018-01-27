<!DOCTYPE html>
<?php
   session_start();
   if(!isset($_SESSION['matricula']))
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
        <li><a onclick="closeSesion()" class="waves-effect waves-light white-text"><i class="material-icons white-text">power_settings_new</i>Cerrar sesión</a></li>
      </ul>
    </aside>

    <main>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <h5>¡Haz una pregunta!</h5>
            <div class="divider"></div>
            <form>
              <div class="row">
                <div class="input-field col s6">
                  <input id="categoria" type="text" data-length="20">
                  <label for="categoria">Categoría</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="pregunta" class="materialize-textarea" data-length="200" required></textarea>
                  <label for="pregunta">Escribe</label>
                </div>
              </div>
              <button type="sumbit" name="pregunta" class="btn btn-floating waves-effect waves-light">
                <i class="material-icons">send</i>
              </button>
            </form>
          </div>
        </div>
        <!-- Dropdown Structure Aqui va el for-->
        <ul id="dropdown" class="dropdown-content">
          <li><a href="#!">one</a></li>
          <li><a href="#!">two</a></li>
        </ul>
        <div class="col s12">

          <div class="card">
            <h5>Comunidad</h5>
            <button class="dropdown-button btn waves-effect waves-light white-text" href="#!" data-activates="dropdown">Categorías<i class="material-icons white-text right">arrow_drop_down</i></button>
            <div class="divider"></div>
            <div class="container-box">
              <div class="item">
                <h6>usuario</h6>
                <div class="divider"></div>
                <p>¿donde esta tal salon?</p>
                <div class="divider"></div>
                <p>categoría</p>
              </div>
              <div class="item">
                <h6>usuario</h6>
                <div class="divider"></div>
                <p>¿donde esta tal salon?</p>
                <div class="divider"></div>
                <p>categoría</p>
              </div>
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

<!--Envío de datos para inicio de sesión-->
  <script type="text/javascript">
    function closeSesion() {
      var xhr = new XMLHttpRequest();
      var url = 'http://localhost/LobosConectados/controllers/LoginController.php';
      xhr.open('POST', url, true);
      var data = "action=close";
      xhr.addEventListener('error', function(e) {
			        console.log('Un error ocurrió', e);
      });
      xhr.addEventListener('loadend', function() {
              var respuesta = xhr.responseText;
              if (respuesta === '1') {
                location.href = "http://localhost/LobosConectados";
              }
      });
      xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      console.log(data);
      xhr.send(data);
    }
</script>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	  <script src="js/materialize.js"></script>
  </body>
</html>
