
<?php
//Conexion con la base
//mysql_connect("localhost","root","");
$conexion=mysql_connect("localhost","root","") or
  die("Problemas en la conexion");
//Creamos la sentencia SQL y la ejecutamos
  mysql_select_db("alumnos",$conexion) or
  die("Problemas en la selección de la base de datos");
//$sSQL="Delete From clientes Where nombre='$nombre'";
//mysql_db_query("ejemplo",$sSQL);

$registros=mysql_query("select * from datos
                        where nombre='$_POST[nom]'",$conexion) or
  die("Problemas en el select:".mysql_error());
if ($reg=mysql_fetch_array($registros))
{
  mysql_query("delete from datos where nombre='$_POST[nom]'",$conexion) or
    die("Problemas en el select:".mysql_error());
  echo "Se efectuó el borrado .";
}
else
{
  echo "No existe una fila con dicha fecha.";
}
mysql_close($conexion);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div align="center">

<div align="center"><a href="index.php">Principal</a></div>
<div align="center"><a href="formulario.php">Zum formulario</a></div>
<div align="center"><a href="listaralumnosOneform.php">Visualizar el contenido de cada alumno</a></div>
<div align="center"><a href="listarAlumnos.php">Visualizar el contenido de la base</a></div>
<div align="center"><a href="buscaralumnosform.php">buscar alumno</a></div>
<div align="center"><a href="borraralumnosOneform.php">borrar alumno</a></div>
</body>
</html>