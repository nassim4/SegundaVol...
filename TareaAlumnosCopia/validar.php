<?php
// define variables and set to empty values
$nameErr = $emailErr = $telefonoErr = $pseudoErr = $fecha_nacErr = $aceptar= "";
$nombre = $email = $telefono = $fecha_nac = $pseudo = $aceptarErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["aceptar"])) {
     $aceptarErr = "Debe aceptar nuestras conducciones de uno.";
   } else {
    
   
   if (empty($_POST["nombre"])) {
     $nameErr = "Name is required";
   } else {
     $nombre = test_input($_POST["nombre"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[A-Za-z\_\-\.\s\xF1\xD1]+$/",$nombre)) {
       $nameErr = "Only letters and white space allowed";
     }
   }
  
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
     }
   }

    if (empty($_POST["telefono"])) {
     $telefonoErr = "Name is required";
   } else {
     $telefono = test_input($_POST["telefono"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[6|9][0-9]{8}*$/",$telefono)) {
       $telefonoErr = "Only letters and white space allowed";
     }
   }

    if (empty($_POST["pseudo"])) {
     $pseudoErr = "Name is required";
   } else {
     $pseudo = test_input($_POST["pseudo"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z0-9]{4,}$/",$pseudo)) {
       $pseudoErr = "Only letters and white space allowed";
     }
   } 
 }  
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>