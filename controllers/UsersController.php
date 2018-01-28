<?php
include_once("../models/User.php");
/*
data.append('matricula', matricula);
data.append('nombre', nombre);
data.append('apellidos', apellido);
data.append('password', password);
data.append('email', email);
data.append('carrera', carrera);
data.append('grado', grado);
data.append('grupo', grupo);
*/
if(isset($_POST["action"])) {
  switch ($_POST["action"]) {
    case 'create':
      $matricula = $_POST['matricula'];
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $carrera = $_POST['carrera'];
      $grado = $_POST['grado'];
      $grupo = $_POST['grupo'];

      $newUser= new User($matricula,$nombre,$apellidos,$password,$email,$carrera,$grado,$grupo);
      if($newUser->save()){
        echo "Registro Exitoso";
      } else{
        echo "Algo salió mal :c";
      }
      break;
    case 'find':
      $matricula = $_POST['matricula'];
      $rows =User::find($matricula);
      $rows = json_encode($rows);

      echo $rows;
      break;
    case 'update':
      $matricula = $_POST['matricula'];
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $carrera = $_POST['carrera'];
      $grado = $_POST['grado'];
      $grupo = $_POST['grupo'];

      $flag = User::update($matricula,$nombre,$apellidos,$password,$email,$carrera,$grado,$grupo);
      if($flag){
        echo "1";
      } else{
        echo "0";
      }
      break;
    case 'delete':
      $matricula = $_POST['matricula'];
      if(User::delete($matricula)) {
        echo "1";
      }else{
        echo "0";
      }
      break;
    default:
      # code...
      break;
  }

} else {
     $products = Product::get();
     $products = json_encode($products);
     echo $products;
}
