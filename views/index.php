<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
		<meta name="description" content="sitio web creado por lobos para lobos, con la finalidad de concentrarnuestra comunidad en un solo lugar">
		<meta name="author" content="Vargas Bedoya Marco Alejandro y Gonzalez Rojas Iván Uriel">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0">

		<title>Lobos conectados</title>

		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" type="image/x-icon" href="https://www.upemor.edu.mx/favicon.ico"/>
 		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

	<body class="font-cover">
		<nav class="navbar">
		    <div class="nav-wrapper">
						<span class="brand-logo center">Lobos conectados</span>
		    </div>
		</nav>
	    <div class="container-login center-align">
	        <div style="margin:15px 0;">
	            <i class="material-icons" style="font-size: 60px"><img src="img/logoRed.png" id="logo" alt="logo"></i>
	            <p>Inicia sesión</p>
	        </div>
	        <form>
	            <div class="input-field">
	                <input id="matricula" type="text" class="validate" required>
	                <label for="matricula"><i class="material-icons">person</i>&nbsp; Matrícula</label>
	            </div>
	            <div class="input-field col s12">
	                <input id="password" type="password" class="validate" required>
	                <label for="Password"><i class="material-icons">lock</i>&nbsp; Contraseña</label>
	            </div>
            </form>
	            <button class="btn waves-effect waves-light teal" onclick="sendData()"><i class="material-icons">lock_open</i>&nbsp;Ingresar</button>
	        <div class="divider" style="margin: 20px 0;"></div>
	        <a href="register.php">Crear cuenta</a>
	    </div>
<!--Envío de datos para inicio de sesión-->
    <script type="text/javascript">
      function sendData() {
        var xhr = new XMLHttpRequest();
        var url = 'http://localhost/LobosConectados/controllers/LoginController.php';
        xhr.open('POST', url, true);
                    var data = new FormData();
                    var matricula = document.querySelector("#matricula").value;
                    var password = document.querySelector("#password").value;
                    data.append('matricula', matricula);
                    data.append('password', password);
                    data.append('action', "login");
        xhr.addEventListener('loadend', function() {
                          console.log("Petición realizada");
        });
        xhr.send(data);
      }
    </script>
<!--Fin de envío de datos-->
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	  <script src="js/materialize.js"></script>
  </body>
</html>
