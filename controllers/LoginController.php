<?php
include_once('../models/Database.php');

if (isset($_POST['action'])) {
  $matricula = $_POST['matricula'];
  $password = $_POST['password'];
  if(login($matricula,$password)){
    $_SESSION['matricula'] = $matricula;
    header("Location: ../views/dashboard.php");
    #echo "<script>location.href = http://localhost/LobosConectados/views/dashboard.php</script>";
    #header("Location: http://localhost/LobosConectados/views/dashboard.php");
  } else{
    echo "Algo pasó :c Sin acceso";
    $_SESSION['matricula'] = -1;
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
