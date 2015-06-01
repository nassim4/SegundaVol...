<HTML>
<HEAD>
<TITLE>lecturaOneByOne.php</TITLE>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style type="text/css">

table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}
</style>
</HEAD>
<BODY>
<h1><div align="center">Lectura de datos</div></h1>
<div align="center"><form  action="#" method="post">
	<input type="text" name="nom">
	<input type="submit" value="listar">
</form></div>
<br>
<br>

<?php
// define variables and set to empty values
$nameErr =  "";
$nombre = "";

   if (empty($_POST["nom"])){
     $nameErr = "Name is required";
   } else {
     $nombre = test_input($_POST["nom"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[A-Za-z\_\-\.\s\xF1\xD1]+$/",$nombre)) {
       $nameErr = "Only letters and white space allowed";
     }
   }

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=alumnos;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

echo $nombre;
$req = $bdd->prepare('SELECT * FROM datos WHERE nombre = ?  ');
$req->execute(array($nombre));
?>
<table align="center">
<tr>
<th>nombre</th>
<th>pseudo</th>
<th>password</th>
<th>telefono</th>
<th>email</th>
<th>fecha_nac</th>
<th>fecha_alta</th>
</tr>

<?php

function convertir1($fecha)
{
    $cad = preg_split('/-/',$fecha);
    
    $fecha_formateada = $cad[0].'/'.$cad[1].'/'.$cad[2];
    return $fecha_formateada;
}

function convertir2($fecha)
{
    $cad = preg_split('/ /',$fecha);
    $sub_cad = preg_split('/-/',$cad[0]);
    //$cad_hora = preg_split(“/:/”,$cad[1]);
    //$hora_formateada = $cad[0].”:”.$cad_hora[1].”:”.$cad_hora[2];
    $fecha_formateada = $sub_cad[2].'-'.$sub_cad[1].'-'.$sub_cad[0];
    return $fecha_formateada;
}

while ($donnees = $req->fetch())
{  
echo'<tr><td>'.$donnees["nombre"].'</td>';
echo'<td>'.$donnees["pseudo"].'</td>';
echo'<td>'.$donnees["password"].'</td>';
echo'<td>'.$donnees["telefono"].'</td>';
echo'<td>'.$donnees["email"].'</td>';
echo'<td>'.convertir1($donnees["fecha_nac"]).'</td>';
echo'<td>'.convertir2($donnees["fecha_alta"]).'</td>';
echo'<td>update</td>';
echo'<td>borrar</td></tr>';
}

$req->closeCursor();
if($nameErr != '')
echo $nameErr;
?>

</table>
<div align="center">
<div align="center"><a href="index.php">Principal</a></div>
<div align="center"><a href="formulario.php">Zum formulario</a></div>
<div align="center"><a href="listaralumnosOneform.php">Visualizar el contenido de cada alumno</a></div>
<div align="center"><a href="listarAlumnos.php">Visualizar el contenido de la base</a></div>
<div align="center"><a href="buscaralumnosform.php">buscar alumno</a></div>
<div align="center"><a href="borraralumnosOneform.php">borrar alumno</a></div>
</BODY>
</HTML>