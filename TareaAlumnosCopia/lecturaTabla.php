<HTML>
<HEAD>
<TITLE>lectura.php</TITLE>
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
<h1><div align="center">Lectura de la tabla</div></h1>
<br>
<br>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "alumnos";
//Conexion con la base
mysql_connect($host,$user,$pass);

//Ejecutamos la sentencia SQL
$result=mysql_db_query($db ,"select * from datos ");
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
//Mostramos los registros
while ($row=mysql_fetch_array($result))
{
echo'<tr><td>'.$row["nombre"].'</td>';
echo'<td>'.$row["pseudo"].'</td>';
echo'<td>'.$row["password"].'</td>';
echo'<td>'.$row["telefono"].'</td>';
echo'<td>'.$row["email"].'</td>';
echo'<td>'.$row["fecha_nac"].'</td>';
echo'<td>'.$row["fecha_alta"].'</td>';
echo'<td>editar</td>';
echo'<td>update</td></tr>';
echo'<td>borrar</td></tr>';
}

?>
</table>
<br>
<div align="center">
<div align="center"><a href="index.php">Principal</a></div>
<div align="center"><a href="formulario.php">Zum formulario</a></div>
<div align="center"><a href="listaralumnosOneform.php">Visualizar el contenido de cada alumno</a></div>
<div align="center"><a href="listarAlumnos.php">Visualizar el contenido de la base</a></div>
<div align="center"><a href="buscaralumnosform.php">buscar alumno</a></div>
<div align="center"><a href="borraralumnosOneform.php">borrar alumno</a></div>

</BODY>
</HTML>
