<?php
	header("Content-Type: image/png");
    require_once("Numero.php");
	require_once("Fraccion.php");
	$n1 = new Numero(5);
	$n2 = new Numero(10);
    $frac = new Fraccion($n1, $n2);
    $frac->dibujar();
?>