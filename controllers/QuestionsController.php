<?php
include_once("../models/Question.php");

if (isset($_POST["action"])) {
  switch (isset($_POST["action"])) {
    case 'create':
      $pregunta = $_POST['pregunta'];
      $pregunta_descripcion = $_POST['pregunta_descripcion'];
      $matricula = $_POST['matricula'];
      $newQuestion = new Question($pregunta,$pregunta_descripcion,$matricula);
      if ($newQuestion->save()) {
        echo "1";
      } else{
        echo "0";
      }
      break;

    default:
      # code...
      break;
  }
} else{
  $questions = Question::get();
  $questions = json_encode($questions);
  echo $questions;
}
