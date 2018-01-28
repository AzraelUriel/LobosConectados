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
            <h5>Perfil</h5>
            <div class="divider"></div>
            <div class="perfil">
              <label for="anuncio" id="anuncio"></label>
              <input type="text" readonly hidden="true" id="password" value="<?php echo $_SESSION['password']?>">
              <h6>Nombre/s:</h6> <input readonly type="text" id="nombre" value="">
              <h6>Apellidos:</h6> <input readonly type="text" id="apellidos" value="">
              <h6>Matrícula:</h6> <input readonly type="text" id="matricula" value="<?php echo $_SESSION['matricula']?>">
              <h6>Correo:</h6> <input readonly type="text" id="correo" value="">
              <h6>Carrera:</h6> <input readonly type="text" id="carrera" value="">
              <h6>Grado:</h6> <input readonly type="text" id="grado" value="">
              <h6>Grupo:</h6> <input readonly type="text" id="grupo" value="">
              <button type="button" id="boton" name="button" onclick="allowChanges()">Habilitar Edición</button>
              <button type="button" id="deleteButton" onclick="deleteUser()">Borrar cuenta</button>
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
window.document.onload = findUser();
  function findUser() {
    var matricula = document.getElementById('matricula').value;
    var xhr = new XMLHttpRequest();
    var url = 'http://localhost/LobosConectados/controllers/UsersController.php';
    var parametros = "action=find&matricula="+matricula;
    xhr.open('POST', url, true);
    xhr.addEventListener('error', function(e) {
  					        console.log('Un error ocurrió', e);
    });
    xhr.addEventListener('loadend', function() {
        user = eval(xhr.responseText);
        user.forEach(function(userAux){
            document.querySelector("#nombre").value = userAux.name;
            document.querySelector("#apellidos").value = userAux.lastname;
            document.querySelector("#correo").value = userAux.email;
            document.querySelector("#carrera").value = userAux.career;
            document.querySelector("#grado").value = userAux.grade;
            document.querySelector("#grupo").value = userAux.group;
        });
    });
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send(parametros);
  }
  function allowChanges(){
    alert('Se ha habilitado el modo de edición');
    anuncio = document.createElement("text");
    anuncio.innerHTML = "Nota: El único campo que no se puede modificar es la matricula";
    document.querySelector("#anuncio").appendChild(anuncio);
    document.querySelector("#boton").innerHTML = "Guardar Cambios";
    document.querySelector("#boton").setAttribute( "onClick", "javascript: update();" );

    document.querySelector("#nombre").readOnly = false;
    document.querySelector("#apellidos").readOnly = false;
    document.querySelector("#correo").readOnly = false;
    document.querySelector("#carrera").readOnly = false;
    document.querySelector("#grado").readOnly = false;
    document.querySelector("#grupo").readOnly = false;
  }
  function update() {
    var xhr = new XMLHttpRequest();
    var url = 'http://localhost/LobosConectados/controllers/UsersController.php';
    var password = document.querySelector("#password").value;
    // var confirmation = prompt("Por favor confirme su contraseña:", "HarryPotter124");
    // if (confirmation === password) {
    //     alert('Los cambios se realizaaron');
    // }
    xhr.open('POST', url, true);
                var data = new FormData();
                var matricula = document.querySelector("#matricula").value;
                var nombre = document.querySelector("#nombre").value;
                var apellido = document.querySelector("#apellidos").value;
                var email = document.querySelector("#correo").value;
                var carrera = document.querySelector("#carrera").value;
                var grado = document.querySelector("#grado").value;
                var grupo = document.querySelector("#grupo").value;
                data.append('matricula', matricula);
                data.append('password', password);
                data.append('nombre', nombre);
                data.append('apellidos', apellido);
                data.append('email', email);
                data.append('carrera', carrera);
                data.append('grado', grado);
                data.append('grupo', grupo);
                data.append('action', "update");
                //alert(password);
    xhr.addEventListener('loadend', function() {
                     console.log("Petición realizada",xhr.responseText);
                     if (xhr.responseText === '1') {
                       alert('Cambios realizados');
                       location.reload();
                     } else{
                        alert('Algo salió mal');
                     }
    });
    xhr.send(data);
  }
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
  function deleteUser() {
    var xhr = new XMLHttpRequest();
    var url = 'http://localhost/LobosConectados/controllers/UsersController.php';
    xhr.open('POST', url, true);
    var data = "action=delete&matricula="+document.querySelector("#matricula").value;
    xhr.addEventListener('error', function(e) {
            console.log('Un error ocurrió', e);
    });
    xhr.addEventListener('loadend', function() {
            var respuesta = xhr.responseText;
            if (respuesta === '1') {
              alert('El usuario se eliminó');
              closeSesion();
              //location.href = "http://localhost/LobosConectados";
            }
    });
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    console.log(data);
    if (confirm("Press a button!")) {
      xhr.send(data);
    }
  }
</script>

<!--Fin de envío de datos-->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	  <script src="js/materialize.js"></script>
  </body>
</html>
