<?php
include_once('../models/Database.php');

//En caso de que el usuario exista, manda una respuesta de 1
//En caso contrario manda un 0, por lo tanto no se encontró
if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'login':
        $matricula = $_POST['matricula'];
        $password = $_POST['password'];
        if(login($matricula,$password)){
          session_start();
          $_SESSION['matricula'] = $matricula;
          echo "1";
        } else{
          echo "0";
        }
      break;
    case 'close':
      echo "1";
      killSesion();
      break;

    default:
      # code...
      break;
  }
}


/********************************************/
function login($matricula , $password){
  $sql = "SELECT matricula, password FROM Users
          where matricula = '$matricula' and password = '$password'";
  $db = new Database();
  if ($rows = $db->query($sql)) {
    $db->close();
    return true;
  }
  $db->close();
  return false;
}
#Cerrar sesión
function killSesion(){
  session_start();
  $_SESSION = array();
  session_destroy();

}
