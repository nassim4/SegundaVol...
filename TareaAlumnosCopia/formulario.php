<!DOCTYPE html>
<html>
<head>
  <title>Formulario de contacto</title>
   <style type="text/css">
   .centro{
    background-color: blue;
   }
   #contenido {
    background-color: yellow;
   }
   h1 {
    color: red;
   }
   p {
    color: blue;
    font-weight: bold;
   }
   </style>
  <meta charset="utf-8">
  <meta name="description" content="Formulario de contacto">

<style type="text/css">body {font-family: Verdana, Arial, sans-serif;font-size: 14px;}
fieldset {margin: 25px 0 0 0;padding: 15px;border: 4px solid; background-color: green;}
legend {padding: 8px; font-size: 16px;}
input, select { float:left; padding: 5px;background: #cccccc; margin:5px 30px 5px 10px; background-color: yellow;}
.contenido { margin: 0 auto; width: 300px; }
.input {width: 250px;}
.enviar{margin: 20px auto;color: #000;}
.enviar:hover {background: #A4A4A4;}
.clear {clear: both; color: blue;}</style>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/Javascript"></script>
   <script type="text/javascript">
   </script>

 </head>
<body>

<div> <input class="mostrar" type="button" value="formulario">
<input class="entrar" type="button" value="entrar">
<input class="consultar" type="button" value="consultar">
<input class="errores" type="button" value="errores">
</div>
<div class="contenido">
	<form id="formulario" action="InsertarAlumno.php" method="post" >
	  <fieldset>
       <legend>Formulario</legend>
	     <input type="text" id="nombre" name="nombre" value="nombre" >
       <input type="text"  id="pseudo" name="pseudo" value="Pseudo">
	     <input type="text"  id="password" name="password" value="Password">     
	     <input type="tel"   id="telefono" name="telefono" value="Teléfono">     
	     <input type="email"  id="email" name="email" value="Email">     
	     <input type="fecha" id="fecha_nac" name="fecha_nac" value="2000-01-01"> 
	  </fieldset>
       <input type="radio" name="aceptar" id="aceptar" value="ok">acepto las condiciones de uso.<br> 
	     <input class="enviar" type="submit" value="Enviar">
       <div class="clear"></div>
	</form>
 <!--  <script>

// var x;
// x=$(document);
// x.ready(inicializarEventos,(function(){
//   var x= $('form');
//   x.hide();
// })());
// function inicializarEventos()
// {
//   var x;
//   x=$(".mostrar");
//   x.click(mostrarFor);
//   x=$(".enviar");
//   x.click(validar);
// }
// function mostrarFor()
// {
//   var x;
//   x=$("form");
//   x.show('slow')
// }
// function ocultarFor()
// {
//   var x;
//   x=$("form");
//   x.hide('slow')
// }
// var selectForm= function(){
  
//   return document.querySelector('form'); 
// }
// var nombreValido= function(){
//   var nombre= selectForm.Elements[0];
// }
// function validar(){
//   var form= selectForm();
//   var nombre= form.nombre.value;
//   var pseudo=  form.pseudo.value;
//   var password= form.password.value;
//   var telefono=  form.telefono.value;
//   var email= form.email.value;
//   var fecha_nac= form.fecha_nac.value;
  
//      var errores = [
// {},
// ];
  
//   var valido= true;
//   var patron=/^[A-Za-z\_\-\.\s\xF1\xD1]+$/;//solo texto---nombre..
//   if(nombre==''|| !isNaN(nombre) || !(patron.test(nombre))){
//   alert('debe ingresar el nombre correcto');valido=false;
//   return errores.nombre= false;
//   }
//   patron=/^[a-zA-Z0-9]{4,}$/;//text y nomeros entre 4 y 15 digitos---pseudo..
//   if(pseudo==''|| !isNaN(pseudo) || !(patron.test(pseudo))){
//   alert('debe ingresar el pseudo correcto que tenga entre 4 y 15 digitos.');valido=false;
//   return errores.pseudo= false;
//   }
//   patron=/^([a-zA-Z0-9]{8,})$/;//password--text y nomeros entre 8 y 10 digitos..
//   if(password==''|| !isNaN(password) || !(patron.test(password))){
//   alert('debe ingresar el password correcto que tenga 8 hasta 10 digitos.');valido=false;
//   return errores.password= false;
//   }
//   patron=/^[6|9][0-9]{8}$/;//solo numeros..10 digitos..lobile españa..
//   if(telefono==''|| isNaN(telefono) || !(patron.test(telefono))){
//   alert('debe ingresar el telefono correcto que tenga 8 hasta 10 digitos.');valido=false;
//   return errores.telefono= false;
//   }
//   patron=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z]{2,3})$/;//email--
//   if(email==''|| !isNaN(email) || !(patron.test(email))){
//   alert('debe ingresar el email correcto .');valido=false;
//   return errores.email= false
//   }
//   patron=/^\d{4}\-\d{2}\-\d{2}$/;//fecha nacimiento de forma01/01/1999
//   if(fecha_nac==''|| !isNaN(fecha_nac) || !(patron.test(fecha_nac))){
//   alert('debe ingresar la fecha_nac correcto (Por ejemplo 2007-01-01).');valido=false;
//   return errores.fecha_nac= false;
//   }

//   if(valido== false){
// //var element='';
//  for(var element in errores){
//   alert(element+' :'+errores[element]);
//  }
// }

//  else{
//     valido=true;

// var alumno = [
// {},
// ];
// alumno.nombre= nombre;
// alumno.pseudo= pseudo;
// alumno.password= password;
// alumno.telefono= telefono;
// alumno.email= email;
// alumno.fecha_nac= fecha_nac;

// alert('Gracias, se ha dado de alta .');
// ocultarFor();
// return alumno
// }
// }
// </script> -->