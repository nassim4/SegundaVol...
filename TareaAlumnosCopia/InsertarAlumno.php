<HTML>
<HEAD>
<TITLE>Insertar.php</TITLE>
</HEAD>
<BODY>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $telefonoErr = $pseudoErr = $fecha_nacErr = $aceptarErr= $passwordErr="";
$nombre = $email = $telefono = $fecha_nac = $pseudo = $aceptar= $password="";
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $errores = [];
if (empty($_POST["aceptar"])) {
     $aceptarErr = "Debe aceptar nuestras conducciones de uso.";

echo '<div align="center">Losentimos, vuelve a aceptar nuestars condicciónes de uso.</a></div><br>
      <div align="center"><a href="index.php">Principal</a></div>
      <div align="center"><a href="formulario.php">Zum formulario</a></div>
      <div align="center"><a href="listaralumnosOneform.php">Visualizar el contenido de cada alumno</a></div>
      <div align="center"><a href="listarAlumnos.php">Visualizar el contenido de la base</a></div>
      <div align="center"><a href="buscaralumnosform.php">buscar alumno</a></div>
      <div align="center"><a href="borraralumnosOneform.php">borrar alumno</a></div>';
      return false;    
    }  else {  
       if (empty($_POST["nombre"])) {
    $nameErr = "Name is required.";
    }  else {
     $nombre = test_input($_POST["nombre"]);
     // check if name only contains letters and whitespace
       if(!preg_match("/^[A-Za-z\_\-\.\s\xF1\xD1]+$/",$nombre)) {
       $nameErr = "Solo letras..name error.";
   echo '<div align="center"><a>Losentimos, vuelve a introducir el nombre.</a></div><br>' ;   
     }
   }
   if (empty($_POST["password"])) {
     $passwordErr = "Name is required.";
   } else {
     $password = test_input($_POST["password"]);
     //$password= sha1($_POST['pass']);
     // check if name only contains letters and whitespace
     if (!preg_match("/^([a-zA-Z0-9]{8,})$/",$password)) {
       $passwordErr = "Solo letras y numeros..passw.";
echo '<div align="center"><a>Losentimos, vuelve a intr el passwd.</a></div><br>';
     }
   }  
   if (empty($_POST["email"])) {
     $emailErr = "Email is required.";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format.";
 echo '<div align="center"><a>Losentimos, vuelve a intr el email.</a></div><br>' ;     
     }
   }
    if (empty($_POST["telefono"])) {
     $telefonoErr = "Name is required.";
   } else {
     $telefono = test_input($_POST["telefono"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[6|9][0-9]{8}$/",$telefono)) {
       $telefonoErr = "Solo numeros.";
 echo '<div align="center"><a>Losentimos, vuelve a intr el telefono.</a></div><br>';      
     }
   }
    if (empty($_POST["pseudo"])) {
     $pseudoErr = "Name is required.";
   } else {
     $pseudo = test_input($_POST["pseudo"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z0-9]{4,}$/",$pseudo)) {
       $pseudoErr = "Más de 4 letras & numeros.";
 echo '<div align="center"><a>Losentimos, vuelve a intr el pseudo.</a></div><br>';      
     }
   } 
     if (empty($_POST["fecha_nac"])) {
     $fecha_nacErr = "Name is required.";
   } else {
     $fecha_nac = $_POST["fecha_nac"];
     $cad = preg_split("/-/",$fecha_nac);
    //$sub_cad = preg_split(“/-/”,$cad[0]);
    //$cad_hora = preg_split(“/:/”,$cad[1]);
    //$hora_formateada = $cad[0].”:”.$cad_hora[1].”:”.$cad_hora[2];
    $fecha_formateada = $cad[0].'-'.$cad[1].'-'.$cad[2];
    $fecha_nac = $fecha_formateada;
     // check if name only contains letters and whitespace
     if (!preg_match("/^\d{4}\-\d{2}\-\d{2}$/",$fecha_nac) || checkdate($cad[2],$cad[1],$cad[0]) == false) {
       $fecha_nacErr = "La fecha_nac no esta correcta.";
echo '<div align="center"><a>Losentimos, vuelve a intr la fecha.</a></div><br>';
     
     }
   }
//Conexion con la base
//mysql_connect("localhost","root","");
//Ejecucion de la sentencia SQL
//mysql_db_query("ejemplo","insert into clientes ('$nombre','$telefono') values ($nombre,$telefono)");
//mysql_db_query("ejemplo",$sSQL);
 $conexion=mysql_connect("localhost","root","") or
    die("Problemas en la conexion");

	mysql_select_db("alumnos",$conexion) or
    die("Problemas en la seleccion de la base de datos");

  mysql_query("insert into datos (nombre, pseudo, password, telefono, email, fecha_nac, fecha_alta) values 
  ('$nombre','$pseudo', '$password', '$telefono', '$email', '$fecha_nac',NOW())", $conexion) or
    die("Problemas en el select".mysql_error());
  
  mysql_close($conexion);
  //echo "El usuario fue dado de alta.";
   }  
}
?>
<fieldset align="center">
<span class="error">* <?php if ($nameErr != '') {
  echo $nameErr;
} ?></span>
   <br>
   <span class="error">* <?php if ($pseudoErr != '') {
     echo $pseudoErr;
   } ?></span>
   <br>
   <span class="error">* <?php if ($passwordErr != '') {
     echo $passwordErr;
   } ?></span>
   <br>
   <span class="error">* <?php if ($telefonoErr != '') {
     echo $telefonoErr;
   } ?></span>
   <br>
   <span class="error">* <?php if ($emailErr != '') {
     echo $emailErr;
   } ?></span>
   <br>
   <span class="error">* <?php if ($fecha_nacErr != '') {
     echo $fecha_nacErr;
   } ?></span>
   <br>
   <span class="error">* <?php if ($aceptarErr != '') {
     echo $aceptarErr;
   } ?></span>
   <br>
   <span class="error">* <?php if ($aceptarErr == '' &
    $nameErr == '' & $passwordErr == '' & 
    $telefonoErr == '' & $pseudoErr == '' & 
    $emailErr == '' & $fecha_nacErr == '') {
     echo 'Los datos estan validos.';
   } ?></span>
   <br>
   </fieldset>
<div align="center"><a href="index.php">Principal</a></div>
<div align="center"><a href="formulario.php">Zum formulario</a></div>
<div align="center"><a href="listaralumnosOneform.php">Visualizar el contenido de cada alumno</a></div>
<div align="center"><a href="listarAlumnos.php">Visualizar el contenido de la base</a></div>
<div align="center"><a href="buscaralumnosform.php">buscar alumno</a></div>
<div align="center"><a href="borraralumnosOneform.php">borrar alumno</a></div>
</BODY>
</HTML>
