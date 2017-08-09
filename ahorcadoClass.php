<?php 
Class Ahorcado{

	private $palabras = array();	
	private $idioma = "es";
	private $intentos = 0;
	private $letrasUsadas = array();
	private $posicionElegida;
	private $palabraElegida = "";
	private $palabraPista = array();

	/* estado 0 (esperando) estado 1(letra acertada), estado 2 (fallo), estado 3 (win), estado 4 (game over), estado 5 (nuevo juego)*/
	private $estado = 5;

	function __construct($palabras, $idioma = "es") {
		$this->palabras = $palabras;
		$this->idioma = $idioma;
	}

	function getIntentos(){
		return $this->intentos;
	}
	function getLetrasUsadas(){
		return $this->letrasUsadas;

	}

	function getPalabraPista(){
		return implode(" ", $this->palabraPista);
	}

	function getPista(){
		return $this->palabras[$this->posicionElegida][$this->idioma]["pista"];
	}

	function getEstado(){
		return $this->estado;
	}

	function getIdioma(){
		return $this->idioma;
	}

	function jugar($respuesta){
		$respuesta = trim(strtolower($respuesta));
		/* Si es el primer intento elegimos una palabra al azar, el estado lo reasignamos a seguir jugando*/
		if($this->estado >= 3){
			$this->reset();

		}
		/*echo "1:".$respuesta;*/
		if(strlen($respuesta) == 1  && preg_match('/\b[a-zA-Z0-9]{1}\b/', $letra)){
			$letra = $respuesta;


			/* Si la letra no se ha usado, se añade al array de letras usadas*/
			if(in_array($letra, $this->letrasUsadas) === false){
				array_push($this->letrasUsadas, $letra);

				/* Si la letra no está en la palabra elegida, incrementamos los intentos*/
				if(strpos($this->palabraElegida,$letra) === false){
					$this->intentos += 1;
					$this->estado = 2;

					/* Si se ha superado el tope de intentos se acaba el juego*/
					if ($this->intentos == 8) {
						$this->estado = 4;					
					}


				}else{

					/* Si la letra esta en la palabra elegida, ponemos el estado a acertado */
					$this->estado = 1;

					/* recorremos cada letra de la palabra */					
					for ($i=0; $i < strlen($this->palabraElegida); $i++) { 

						/* si la letra elegida coincide con la de la palabra cambiamos el guión por la letra */
						if(substr($this->palabraElegida, $i,1) == $letra){ 
							$this->palabraPista[$i] = $letra;
						}				

					}

					/* Si la palabra elegida es igual que la palabra pista se ha ganado,
					remplazando las barras */
					if($this->palabraElegida == preg_replace("/\//", "", implode("", $this->palabraPista))){
						$this->estado = 3;
					}
				}

			}

		}else if(strlen($respuesta) > 1){
			
			if($this->palabraElegida == $respuesta){
				$this->estado = 3;
				$this->palabraPista = str_replace(" ", "/ /", str_split($respuesta));
			}else{
				$this->intentos += 1;
				$this->estado = 2;

				/* Si se ha superado el tope de intentos se acaba el juego*/
				if ($this->intentos == 8) {
					$this->estado = 4;					
				}
			}
		}

		

	}

	function reset(){

		$longitud = count($this->palabras)-1;
		$this->posicionElegida = mt_rand(0,$longitud);
		$this->intentos = 0;		
		$this->palabraPista = array();
		$this->palabraElegida = $this->palabras[$this->posicionElegida][$this->idioma]["palabra"];
		/* Guardamos la palabra en un array con guiones*/
		for ($i=0; $i < strlen($this->palabraElegida); $i++) { 	
			if(substr($this->palabraElegida, $i, 1) == " "){
				$this->palabraPista[$i] = "/ /";	
			}else{
				$this->palabraPista[$i] = "_";	
			}					

		}
		$this->letrasUsadas = array();
		/*if($nv){
			$this->estado = 0;
		}else{
			$this->estado = 5;
		}*/
		
	}

	function cambiarIdioma(){
		if($this->idioma == "es" ){
			$this->idioma = "eng";
		}else{
			$this->idioma = "es";
		}


		$this->palabraPista = array();
		$this->palabraElegida = $this->palabras[$this->posicionElegida][$this->idioma]["palabra"];
		/* Guardamos la palabra en un array con guiones*/
		for ($i=0; $i < strlen($this->palabraElegida); $i++) { 	
			if(substr($this->palabraElegida, $i, 1) == " "){
				$this->palabraPista[$i] = "/ /";	
			}else{
				$this->palabraPista[$i] = "_";	
			}					

		}

		/* Recorremos la palabra nueva con las letras que tenemos */
		for ($i=0; $i < strlen($this->palabraElegida); $i++) { 

			for ($o=0; $o < count($this->letrasUsadas); $o++) { 
				/* si la letra elegida coincide con la de la palabra cambiamos el guión por la letra */
				if(substr($this->palabraElegida, $i,1) == $this->letrasUsadas[$o]){ 
					$this->palabraPista[$i] = $this->letrasUsadas[$o];
				}
			}

		}

		/* Si la palabra elegida es igual que la palabra pista se ha ganado,
		remplazando las barras */
		if($this->palabraElegida == preg_replace("/\//", "", implode("", $this->palabraPista))){
			$this->estado = 3;
		}
		/*else{
			$this->estado = 0;
		}*/



	}


}




?>