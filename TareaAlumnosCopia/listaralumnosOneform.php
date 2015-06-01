<HTML>
<HEAD>
<TITLE>lectura OneByOne de alumnos.php</TITLE>
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
<h1><div align="center">lectura OneByOne de alumnos</div></h1>

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

$combobit="";
while ($donnees = $req->fetch())
{
	 $combobit .=" <option value='".$donnees['nombre']."'>".$donnees['nombre']."</option>";


}
$req->closeCursor();
?>
<div align="center">
<fieldset >
<legend>listar alumno</legend>
<form action="listaralumnosOneByOne.php" method="post">
<select name="nom">
       <?php echo $combobit; ?>
</select>
<input type="submit" value="listar">
</form>
</fieldset>
</div>
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