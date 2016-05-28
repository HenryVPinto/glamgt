<!--<META HTTP-EQUIV="Refresh" CONTENT="6; URL=index.html">-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="css/all.css">
  <link rel="stylesheet" type="text/css" href="css/fonts.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<style type="text/css">

html {
  font-size: 62.5%;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.428571429;
  color: #333333;
  background-color: #ffffff;
}
#agradecimiento {
  text-align: center;
  width: 500px;
  margin-right: auto;
  margin-left: auto;
}
h1 {
  margin: 0.67em 0;
  font-size: 2em;
}
</style>
<head>
<meta charset="utf-8">
<title>Agradecimiento</title>
</head>

<body>

<?php
 
if(isset($_POST['email'])) {
 
    
 
    $email_to = "jesus@glam.gt";
 
    $email_subject = "Contactando a Glam.gt";
 
         
 
    function died($error) {
 
        // codigo de error disparado
 
        echo "Lo sentimos mucho, pero hay errores(s) encontrado de la forma que ha enviado. ";
 
        echo "Estos errores aparecen debajo.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Por favor, vuelva atrás y corrija estos errores.<br /><br />";
 
        die();
 
    }
 
     
 
    // validacion de datos esperados
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['comments'])) {
 
        died('Lo sentimos, pero parece que hay un problema con la forma que ha enviado.');       
 
    }
 
     
 
    $first_name = $_POST['first_name']; // necesarios
 
    $last_name = $_POST['last_name']; // necesarios
 
    $email_from = $_POST['email']; // necesarios
 
    $telephone = $_POST['telephone']; // no necesarios
 
    $comments = $_POST['comments']; // necesarios
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'La dirección de correo electrónico que ha introducido no parece ser válido.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'El primer nombre que ha introducido no parece ser válido.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'El apellido que escribió no parece ser válido.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'Los comentarios que ha entrado no parecen ser válidos.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Detalle del formulario.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Nombres: ".clean_string($first_name)."\n";
 
    $email_message .= "Apellidos: ".clean_string($last_name)."\n";
 
    $email_message .= "Correo Electrónico: ".clean_string($email_from)."\n";
 
    $email_message .= "Teléfono: ".clean_string($telephone)."\n";
 
    $email_message .= "Comentario: ".clean_string($comments)."\n";
 
     
 
     
 
// Encabezado del Correo
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
<!--- END php>
    
<!--planes-->
<hr>
<div id="contacto">

<center><h2>Gracias por contactarnos le atenderemos lo mas pronto posible</h2></center>
<?php
 
}
 
?>
<div id="agradecimiento">
<img src="images/logo.png" width="auto" height="auto" alt="logo">
<h1>Sus datos fueron enviados satisfactoriamente.</h1>
<a href="index.html" class="send">Volver al sitio principal</a>


</div>
</body>
</html>