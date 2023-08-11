<?php
include('../database.php');
$db = new Database();
$con = $db->conectar();
  
    if (isset($_POST['btn'])) {
      
      if(strlen($_POST['nombre']) >= 1 &&  
      strlen($_POST['correo']) >= 1 &&
      strlen($_POST['asunto']) >= 1 &&
      strlen($_POST['mensaje']) >= 1
      ){

      $name = trim($_POST['nombre']);
      $email = trim($_POST['correo']);
      $subject = trim($_POST['asunto']);
      $message = trim($_POST['mensaje']);

      $query = $con->prepare("INSERT INTO contacto (fecha,user_name,correo,asunto,comentario) VALUES ((SYSDATE()),'$name','$email', '$subject', '$message')");
        $result = $query->execute();
      
      if($result){
       echo'<center><h3>El formulario ha sido enviado, muchas gracias por su comentario. Puede regresar a la ventana anterior.</h3></center>';
       exit();

      } else {

        echo'<center><h3>Ha ocurrido un error</h3></center>';
        exit();

      }
           
    } else {

     echo '<center><h3>No se han completado todos los campos.</h3></center>';
     exit();

    }

  } 
  
?>
