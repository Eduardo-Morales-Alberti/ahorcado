var pintarFunciones = new Array (
	pintarMastilV,
	pintarMastilH,
	pintarCuerda,
	pintarCabeza,
	pintarTronco,
	pintarBrazos,
	pintarPiernaIzq,
	pintarPiernaDrch);


var c = document.getElementById("miCanvas");
c.width  = 300;
c.height = 300;
var ctx = c.getContext("2d");

function limpiarCtx(){
	ctx.restore();
	ctx.clearRect(0,0,300,300);
	pintarEscenario();
	
}
limpiarCtx();
/**Escenario **/
function pintarEscenario(){

	ctx.save();	
	ctx.beginPath();
	/*ctx.translate(0,-752.36216);	*/
	ctx.moveTo(10,230);
	ctx.lineTo(290,230);
	ctx.lineTo(290,300);
	ctx.lineTo(10,300);
	ctx.lineTo(10,230);
	ctx.closePath();

	ctx.fillStyle = "#aa0000";
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	
	ctx.restore();
	
}

/** Escenario **/

/** Mastil vertical **/
function pintarMastilV() {
	ctx.save();	
	ctx.beginPath();
	ctx.moveTo(60,25);
	ctx.lineTo(70,25);
	ctx.lineTo(70,300);
	ctx.lineTo(60,300);
	ctx.lineTo(60,25);
	ctx.closePath();

	ctx.fillStyle = "#aa0000";
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	
	ctx.restore();
	/*ctx.save();*/
}
/*pintarMastilV();*/
/** Mastil vertical **/
/** Mastil horizontal **/
function pintarMastilH(){
	
	ctx.save();	
	ctx.beginPath();
	ctx.moveTo(60,25);
	ctx.lineTo(200,25);
	ctx.lineTo(200,35);
	ctx.lineTo(60,35);
	ctx.lineTo(60,25);
	ctx.closePath();

	ctx.fillStyle = "#aa0000";
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	
	ctx.restore();
	/*ctx.save();*/
}
/*pintarMastilH();*/
/** Mastil horizontal **/
/** Cuerda **/
function pintarCuerda(){

	ctx.save();	
	/*ctx.translate(0,-752.36216);*/

	ctx.beginPath();
	ctx.moveTo(200,25);
	ctx.lineTo(190,25);
	ctx.lineTo(190,70);
	ctx.lineTo(195,70);
	ctx.lineTo(195,25);
	ctx.closePath();

	ctx.fillStyle = "#aa0000";
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	
	ctx.restore();
	/*ctx.save();*/
}

/*pintarCuerda();*/

/** Cuerda **/
/** Cabeza **/
function pintarCabeza(){
	
	ctx.save();	
	ctx.beginPath();
	ctx.moveTo(195,70);
	
	ctx.arc(195, 70, 20, 0, 2 * Math.PI);
	ctx.closePath();

	ctx.fillStyle = "#aa0000";
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	
	ctx.restore();
}
/*pintarCabeza();*/
/** Cabeza **/
/** Tronco **/
function pintarTronco(){
	
	ctx.save();	
	/*ctx.translate(0,-752.36216);*/
	ctx.beginPath();
	ctx.moveTo(190,75);
	ctx.lineTo(195,75);
	ctx.lineTo(195,160);
	ctx.lineTo(190,160);
	ctx.lineTo(190,75);
	ctx.closePath();

	ctx.fillStyle = "#aa0000";
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	
	ctx.restore();
}
/*pintarTronco();*/
/** Tronco **/
/** Brazos **/
function pintarBrazos(){
	
	ctx.save();	
	ctx.beginPath();
	ctx.moveTo(150,110);
	ctx.lineTo(235,110);
	ctx.lineTo(235,115);
	ctx.lineTo(150,115);
	ctx.lineTo(150,110);
	ctx.closePath();
	
	ctx.fillStyle = "#aa0000";
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	
	ctx.restore();
}
/*pintarBrazos();*/
/** Brazos **/
/** Pierna izquierda **/
function pintarPiernaIzq(){

	ctx.save();	
	ctx.translate(0,-752.36216);
	
	ctx.transform(0.565,-0.805,0.8,0.6,0,0);
	ctx.beginPath();
	ctx.moveTo(-673.20569,676.61902);
	ctx.lineTo(-621.742303,676.61902);
	ctx.lineTo(-621.742303,681.4878426);
	ctx.lineTo(-673.20569,681.4878426);
	ctx.lineTo(-673.20569,676.61902);

	ctx.closePath();
	

	ctx.fillStyle = "#aa0000";
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	
	ctx.restore();
}
/*pintarPiernaIzq();*/
/** Pierna izquierda **/
/** Pierna derecha **/
function pintarPiernaDrch(){

	ctx.save();	
	ctx.translate(0,-752.36216);

	ctx.transform(-0.57296793,-0.81957779,-0.80835928,0.58868946,0,0);
	ctx.beginPath();
	ctx.moveTo(-901.2135,360.23257);
	ctx.lineTo(-849.7501129999999,360.23257);
	ctx.lineTo(-849.7501129999999,365.1013926);
	ctx.lineTo(-901.2135,365.1013926);
	ctx.lineTo(-901.2135,360.23257);
	ctx.closePath();

	ctx.fillStyle = "#aa0000";
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	
	ctx.restore();
}
/*pintarPiernaDrch();*/

/** Pierna derecha **/

/** Acierto **/

function acierto(){
	limpiarCtx();
	ctx.restore();
	ctx.save();
	ctx.translate(0,-735);
	ctx.save();
	ctx.fillStyle = "#aa0000";
	ctx.beginPath();
	ctx.moveTo(192.74426,823.357113);
	ctx.bezierCurveTo(204.76043086358803,823.357113,214.501462,832.3325712058089,214.501462,843.40436);
	ctx.bezierCurveTo(214.501462,854.4761487941911,204.76043086358803,863.451607,192.74426,863.451607);
	ctx.bezierCurveTo(180.72808913641197,863.451607,170.987058,854.4761487941911,170.987058,843.40436);
	ctx.bezierCurveTo(170.987058,832.3325712058089,180.72808913641197,823.357113,192.74426,823.357113);
	ctx.closePath();
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	ctx.restore();
	ctx.save();
	ctx.fillStyle = "#aa0000";
	ctx.beginPath();
	ctx.moveTo(190.93112,849.26428);
	ctx.lineTo(195.161687,849.26428);
	ctx.lineTo(195.161687,925.135397);
	ctx.lineTo(190.93112,925.135397);
	ctx.lineTo(190.93112,849.26428);
	ctx.closePath();
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	ctx.restore();
	ctx.save();
	ctx.fillStyle = "#aa0000";
	ctx.transform(0.76789692,0.64057343,-0.65485608,0.7557536,0,0);
	ctx.beginPath();
	ctx.moveTo(677.1972,548.46503);
	ctx.lineTo(720.537959,548.46503);
	ctx.lineTo(720.537959,553.5205076);
	ctx.lineTo(677.1972,553.5205076);
	ctx.lineTo(677.1972,548.46503);
	ctx.closePath();
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	ctx.restore();
	ctx.save();
	ctx.fillStyle = "#aa0000";
	ctx.transform(0.57296793,-0.81957779,0.80835928,0.58868946,0,0);
	ctx.beginPath();
	ctx.moveTo(-682.90771,683.49609);
	ctx.lineTo(-631.4443229999999,683.49609);
	ctx.lineTo(-631.4443229999999,688.3649126);
	ctx.lineTo(-682.90771,688.3649126);
	ctx.lineTo(-682.90771,683.49609);
	ctx.closePath();
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	ctx.restore();
	ctx.save();
	ctx.fillStyle = "#aa0000";
	ctx.transform(-0.57296793,-0.81957779,-0.80835928,0.58868946,0,0);
	ctx.beginPath();
	ctx.moveTo(-910.91553,367.10947);
	ctx.lineTo(-859.452143,367.10947);
	ctx.lineTo(-859.452143,371.9782926);
	ctx.lineTo(-910.91553,371.9782926);
	ctx.lineTo(-910.91553,367.10947);
	ctx.closePath();
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	ctx.restore();
	ctx.save();
	ctx.fillStyle = "#aa0000";
	ctx.transform(-0.76789692,0.64057343,0.65485608,0.7557536,0,0);
	ctx.beginPath();
	ctx.moveTo(386.28711,795.54596);
	ctx.lineTo(429.627869,795.54596);
	ctx.lineTo(429.627869,800.6014376);
	ctx.lineTo(386.28711,800.6014376);
	ctx.lineTo(386.28711,795.54596);
	ctx.closePath();
	ctx.fill();
	/*ctx.strokeStyle = "#aa0000";
	ctx.stroke();*/
	ctx.restore();
	

}


/** Acierto **/