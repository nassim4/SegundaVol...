<HTML>
<HEAD>
<TITLE>lecturaOneByOne.php</TITLE>
<style type="text/css">
table {
    border-collapse: collapse;

}

table, th, td {
    border: 1px solid black;
    margin-left: 25%;
}
p{
	margin-left: 25%;
}
</style>
</HEAD>
<BODY>
<h3 align="center">Datos pro alumno</h3>
<table align="center">
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=alumnos;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT nombre, pseudo, telefono, email, fecha_nac, YEAR(fecha_alta) AS year, MONTH(fecha_alta) AS mes, DAY(fecha_alta) AS dia FROM datos LIMIT 0, 25');

print "<table>\n";
print "<tr><th>Nombre</th><th>Pseudo</th><th>Telefono</th><th>Email</th><th>fecha_nac</th><th>fecha_alta</th></tr>\n";    
while ($donnees = $reponse->fetch())
{
     print  '<tr><td>'.$donnees['nombre'].'</td><td>'.$donnees['pseudo'].'</td><td>'.$donnees['telefono'].'</td><td>'.$donnees['email'].'</td><td>'.$donnees['fecha_nac'].'</td><td>'.$donnees['dia'].'/'.$donnees['mes'].'/'.$donnees['year'].'</td><td>update</td><td>borrar</td></tr><br/>';  
}
print "</table>";
$reponse->closeCursor();
?>
</table>
<div align="center"><a href="index.php">Principal</a></div>
<div align="center"><a href="formulario.php">Zum formulario</a></div>
<div align="center"><a href="listaralumnosOneform.php">Visualizar el contenido de cada alumno</a></div>
<div align="center"><a href="listarAlumnos.php">Visualizar el contenido de la base</a></div>
<div align="center"><a href="buscaralumnosform.php">buscar alumno</a></div>
<div align="center"><a href="borraralumnosOneform.php">borrar alumno</a></div>
</BODY>
</HTML>