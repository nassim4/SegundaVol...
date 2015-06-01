<HTML>
<HEAD>
<TITLE>borrarOneByOne.php</TITLE>
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
<h1><div align="center">Datos pro alumno</div></h1>

<br>
<br>
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=alumnos;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$req = $bdd->prepare('SELECT * FROM datos ');
$req->execute();
?>


<?php
$combobit="";
while ($donnees = $req->fetch())
{
	 $combobit .=" <option value='".$donnees['nombre']."'>".$donnees['nombre']."</option>";


}
$req->closeCursor();
?>
<fieldset align="center">
<legend>borrar alumno</legend>
<form action="deletealumno.php" method="post">
<div >
<select name="nom" value="<?php echo $combobit[0]; ?> ">
       <?php echo $combobit; ?>
</select>

<input type="submit" value="borrar">
</div>

</form>
</fieldset>
<br></br>
<div align="center">

<div align="center"><a href="index.php">Principal</a></div>
<div align="center"><a href="formulario.php">Zum formulario</a></div>
<div align="center"><a href="listaralumnosOneform.php">Visualizar el contenido de cada alumno</a></div>
<div align="center"><a href="listarAlumnos.php">Visualizar el contenido de la base</a></div>
<div align="center"><a href="buscaralumnosform.php">buscar alumno</a></div>
<div align="center"><a href="borraralumnosOneform.php">borrar alumno</a></div>
</div>
</BODY>
</HTML>