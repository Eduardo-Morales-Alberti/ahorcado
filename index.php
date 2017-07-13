<?php 
require_once("ahorcadoClass.php");
$pista = "";
$estado = "";
$letras ="";
$intentos = 0;
$palabraPista = 0;
/*$palabras = array("gato","perro", "aguila","mofeta");*/
$palabras = array(["es"=>["palabra"=>"gato","pista"=>"Animal con 7 vidas"],
	"eng"=>["palabra"=>"cat","pista"=>"Animal, 7 lives"]],
	["es"=>["palabra"=>"perro","pista"=>"Mejor amigo del hombre"],
	"eng"=>["palabra"=>"dog","pista"=>"Man's best friend"]],
	["es"=>["palabra"=>"aguila","pista"=>"Ave de la bandera americana"],
	"eng"=>["palabra"=>"eagle","pista"=>"American Flag Bird"]],
	["es"=>["palabra"=>"mofeta","pista"=>"Animal que huele muy mal"],
	"eng"=>["palabra"=>"skunk","pista"=>"Animal that smells very bad"]]);
/*print_r($palabras[0]["es"]["palabra"]);*/

session_start();

/* Si no existe el ahorcado en la sesion o se quiere resetear*/
if(!isset($_SESSION["ahorcado"]) || isset($_GET["reset"])){

	$ahoracadocl = new Ahorcado($palabras);
	$_SESSION["ahorcado"] = $ahoracadocl;

	
}else{
	
	/*Si se quiere empezar un nuevo juego */	
	if(isset($_GET["resetgame"])){
		$_SESSION["ahorcado"]->reset();

		
	}else if(isset($_GET["cambiaridioma"])){

		$_SESSION["ahorcado"]->cambiarIdioma();

		/* Si se ha introducido un caracter*/
	}else if(isset($_GET["respuesta"])){
		$_SESSION["ahorcado"]->jugar($_GET["respuesta"]);	

		
	}

	$intentos = $_SESSION["ahorcado"]->getIntentos();
	$letras = implode(", ", $_SESSION["ahorcado"]->getLetrasUsadas());		
	$palabraPista = $_SESSION["ahorcado"]->getPalabraPista();
	$pista = $_SESSION["ahorcado"]->getPista();
	$estado = $_SESSION["ahorcado"]->getEstado();

	switch ($estado) {
		case 0:
		$estado = "Nuevo Juego";
		break;
		case 1:
		$estado = "Letra Acertada";
		break;
		case 2:
		$estado = "Has fallado";
		break;
		case 3:
		$estado = "Has Ganado";
		break;
		case 4:
		$estado = "Has Perdido";
		break;
		case 5:
		$estado = "Nuevo Juego";
		break;	
	}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Ahorcado</h1>
	<h2><?php echo $estado; ?></h2>
	<p>Palabra: <br>	<?php echo $palabraPista; ?></p>
	<p>Intentos Fallidos: <?php echo $intentos; ?></p>
	<p>Letras Usadas: <?php echo  $letras; ?></p>
	<p>Pista: <br>	<?php echo $pista;	?>	</p>

	<form action="">
		<input type="text" name="respuesta">
		<input type="submit" value="Comprobar">
		<input type="submit" name="reset" value="Reset Session">
		<input type="submit" name="resetgame" value="Nuevo Juego">
		<input type="submit" name="cambiaridioma" value="Cambiar Idioma">
	</form>
</body>
</html>