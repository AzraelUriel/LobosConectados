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
              <input type="text" readonly id="matricula" value="<?php echo $_SESSION['matricula']?>">
              <div class="row">
                <div class="input-field col s6">
                  <input id="pregunta" type="text" data-length="20">
                  <label for="pregunta">Pregunta</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="pregunta_descripcion" class="materialize-textarea" data-length="200" required></textarea>
                  <label for="pregunta">Escribe</label>
                </div>
              </div>
            </form>
              <button onclick="makeQuestion()" name="pregunta" class="btn btn-floating waves-effect waves-light">
                <i class="material-icons">send</i>
              </button>
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
            <button class="dropdown-button btn waves-effect waves-light white-text" href="#" data-activates="dropdown">Categorías<i class="material-icons white-text right">arrow_drop_down</i></button>
            <div class="divider"></div>
            <div id="container" class="container-box">
              <div class="item">
                <h6>usuario</h6>
                <div class="divider"></div>
                <p>categoría</p>
                <div class="divider"></div>
                <p>¿donde esta tal salon?</p>
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

<!--Todas las funciones javascript-->
  <script type="text/javascript">
  window.document.onload = fillContainer();
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
    function makeQuestion() {
        var xhr = new XMLHttpRequest();
        var url = 'http://localhost/LobosConectados/controllers/QuestionsController.php';
        xhr.open('POST', url, true);
                    var matricula = document.querySelector("#matricula").value;
                    var pregunta_descripcion = document.querySelector("#pregunta_descripcion").value;
                    var pregunta = document.querySelector("#pregunta").value;
                    var datos = new FormData();
                    datos.append('matricula', matricula);
                    datos.append('pregunta_descripcion', pregunta_descripcion);
                    datos.append('pregunta', pregunta);
                    datos.append('action', "create");
        xhr.addEventListener('error', function(e) {
        					        console.log('Un error ocurrió', e);
        });
        xhr.addEventListener('loadend', function() {
                    var respuesta = xhr.responseText;
                    console.log("Respuesta",xhr.responseText);
                    if (respuesta === '1') {
                      alert('Pregunta hecha');
                      location.reload();
                    }else{
                      alert('Algo pasó :c');
                    //  location.reload();
                    }
        });
        xhr.send(datos);
    }
    function fillContainer() {
        var xhr = new XMLHttpRequest();
        var url = "http://localhost/LobosConectados/controllers/QuestionsController.php";
        xhr.open('GET',url,true);
        xhr.addEventListener('error',function() {
            console.log('Ocurrió un error');
        });
        xhr.addEventListener('loadend',function() {

          if (xhr.responseText!='false') {
            questions = eval(xhr.responseText);
            questions.forEach(function(question) {
                  cajaPregunta = document.createElement('div');
                  cajaPregunta.classList.add('item');

                  matricula = document.createTextNode(question.user_matricula);
                  user = document.createElement("h6");
                  user.appendChild(matricula);
                  cajaPregunta.appendChild(user);

                  divider = document.createElement('div');
                  divider.classList.add('divider');
                  cajaPregunta.appendChild(divider);

                  parrafo = document.createElement("p");
                  pregunta = document.createTextNode(question.question);
                  b = document.createElement("b");
                  b.appendChild(pregunta);
                  parrafo.appendChild(b);
                  cajaPregunta.appendChild(parrafo);

                  cajaPregunta.appendChild(divider);

                  parrafo = document.createElement("p");
                  question_descripcion = document.createTextNode(question.question_description);
                  parrafo.appendChild(question_descripcion);
                  cajaPregunta.appendChild(parrafo);

                  document.querySelector("#container").appendChild(cajaPregunta);

            });}
            console.log(xhr.responseText);
        });
        xhr.send();
    }
</script>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	  <script src="js/materialize.js"></script>
  </body>
</html>
