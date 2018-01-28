<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
		<meta name="description" content="sitio web creado por lobos para lobos, con la finalidad de concentrarnuestra comunidad en un solo lugar">
		<meta name="author" content="Vargas Bedoya Marco Alejandro y Gonzalez Rojas Iván Uriel">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0">

		<title>Registro</title>

		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/materialize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" type="image/x-icon" href="https://www.upemor.edu.mx/favicon.ico"/>
 		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

	<body>
		<nav class="navbar">
		    <div class="nav-wrapper">
						<span class="brand-logo center">Lobos conectados</span>
		    </div>
		</nav>
    <center >
  	  <div class="container-register">
        <div style="margin:15px 0;">
            <i class="material-icons" style="font-size: 60px"><img src="img/logoRed.png" id="logo" alt="logo"></i>
            <p>Registro</p>
        </div>
        <div class="row">
          <form class="col s12" action="index.php" id="registro" method="post">
              <div class="row">
                <div class="input-field col s6">
                  <input id="nombre" type="text" class="validate" required>
                  <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s6">
                  <input id="apellidos" type="text" class="validate" required>
                  <label for="apellidos">Apellidos</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="matricula" type="text" class="validate" required>
                  <label for="disabled">Matrícula</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" type="password" class="validate" required>
                  <label for="password">Contraseña</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="email" type="email" class="validate" required>
                  <label for="email">Correo</label>
                </div>
              </div>
              <div class="row">
                <select class="browser-default" id="carrera" required>
                  <option value="" disabled selected >Carrera</option>
                  <option value="IIF">IIF</option>
                  <option value="IFI">IFI</option>
                  <option value="IBT">IBT</option>
                  <option value="IET">IET</option>
                  <option value="ITA">ITA</option>
                  <option value="LAG">LAG</option>
                </select>
                <label></label>
              </div>
              <div class="row">
                <select class="browser-default" id="grupo" required>
                  <option value="" disabled selected>Grupo</option>
                  <option value="1">A</option>
                  <option value="2">B</option>
                  <option value="3">C</option>
                  <option value="4">D</option>
                </select>
                <label></label>
              </div>
              <div class="row">
                <select class="browser-default" id="grado" required>
                    <option value="" disabled selected>Grado</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <label></label>
              </div>
        </form>
        <button class="btn waves-effect waves-light teal" onclick="save()">Registrar</button>
        <p>¿Ya tienes cuenta?<a href="index.php">&nbsp;&nbsp;Inicia sesión</a></p>
       </div>
  	  </div>
    </center>
    <script type="text/javascript">
    /*
    +-----------+-------------+------+-----+---------+-------+
    | Field     | Type        | Null | Key | Default | Extra |
    +-----------+-------------+------+-----+---------+-------+
    | matricula | varchar(10) | NO   | PRI | NULL    |       |
    | name      | varchar(20) | YES  |     | NULL    |       |
    | lastname  | varchar(20) | YES  |     | NULL    |       |
    | password  | varchar(45) | YES  |     | NULL    |       |
    | email     | varchar(45) | YES  |     | NULL    |       |
    | career    | varchar(3)  | YES  |     | NULL    |       |
    | grade     | int(11)     | YES  |     | NULL    |       |
    | group     | char(1)     | YES  |     | NULL    |       |
    +-----------+-------------+------+-----+---------+-------+
    */
      function save() {
        var xhr = new XMLHttpRequest();
        var url = 'http://localhost/LobosConectados/controllers/UsersController.php';
        xhr.open('POST', url, true);
                    var data = new FormData();
                    var matricula = document.querySelector("#matricula").value;
                    var nombre = document.querySelector("#nombre").value;
                    var apellido = document.querySelector("#apellidos").value;
                    var password = document.querySelector("#password").value;
                    var email = document.querySelector("#email").value;
                    var carrera = document.querySelector("#carrera").value;
                    var grado = document.querySelector("#grado").value;
                    var grupo = document.querySelector("#grupo").value;
                    data.append('matricula', matricula);
                    data.append('nombre', nombre);
                    data.append('apellidos', apellido);
                    data.append('password', password);
                    data.append('email', email);
                    data.append('carrera', carrera);
                    data.append('grado', grado);
                    data.append('grupo', grupo);
                    data.append('action', "create");
                    //alert(password);
        xhr.addEventListener('loadend', function() {
                         console.log("Petición realizada");
                         if (xhr.responseText==='1') {
                           alert('Registro existoso');
                           location.href = "http://localhost/LobosConectados/views/";
                         }else{
                           alert('Algo salió mal');
                           location.reload();
                         }
        });
        xhr.send(data);
      }
    </script>
    </script>
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	  <script src="js/materialize.js"></script>
  </body>
</html>
