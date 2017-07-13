<?php 

require_once("ahorcadoClass.php");
$pista = "";
$estado = "";
$letras ="";
$intentos = 0;
$palabraPista = "";
$idioma ="es";
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
if(!isset($_SESSION["ahorcado"]) || isset($_REQUEST["reset"])){

	$ahoracadocl = new Ahorcado($palabras);
	$_SESSION["ahorcado"] = $ahoracadocl;

	
}else{
	
	/*Si se quiere empezar un nuevo juego */	
	if(isset($_REQUEST["resetgame"])){
		$_SESSION["ahorcado"]->reset();

		
	}else if(isset($_REQUEST["cambiaridioma"])){

		$_SESSION["ahorcado"]->cambiarIdioma();

		/* Si se ha introducido un caracter*/
	}else if(isset($_REQUEST["respuesta"])){
		$_SESSION["ahorcado"]->jugar($_REQUEST["respuesta"]);	

		
	}

	$intentos = $_SESSION["ahorcado"]->getIntentos();
	$letras = implode(" | ", $_SESSION["ahorcado"]->getLetrasUsadas());		
	$palabraPista = $_SESSION["ahorcado"]->getPalabraPista();
	$pista = $_SESSION["ahorcado"]->getPista();
	$estado = $_SESSION["ahorcado"]->getEstado();
	$idioma = $_SESSION["ahorcado"]->getIdioma();

}

$respuesta["intentos"] = $intentos;
$respuesta["letras"] = $letras;
$respuesta["pista"] = $palabraPista;
$respuesta["pistaPalabra"] = $pista;
$respuesta["estado"] = $estado;
$respuesta["idioma"] = $idioma;

/*Convertimos la respuesta en formato json*/
echo json_encode($respuesta);

 ?>