<?php
	class Fraccion {
		public $numerador, $denominador; // son de tipo Numero
		public function __construct($n, $d){
			$this->numerador = $n;
			$this->denominador = $d;
		}
		public function dibujar() {
			//echo $this->numerador->n . "/" . $this->denominador->n;
			$width = 400;
			$height = 400;
			$img = imagecreate($width, $height);
			$blanco = imagecolorallocate($img, 255, 255, 255);
			$negro = imagecolorallocate($img, 0, 0, 0);
			$rojo = imagecolorallocate($img, 255, 0, 0);
			//imagestring($im, 1, 5, 5,  "A Simple Text String", $color_texto);
			// Dibujar la elipse
			imageellipse($img, 200, 200, 400, 400, $negro);
			// https://webs.ucm.es/info/Geofis/practicas/trigonometria.htm
			// sen alfa = y / r   de donde  y = r sen alfa
			// cos alfa = x / r   de donde  x = r cos alfa 
			// Pi --- 180
			// rad --- 120
			// rad = 120*Pi/180
			$cx = 200;
			$cy = 200;
			$radio = 200;
			$ang_ini_grad = 0;
			$ang_rebanada = 360 / $this->denominador->n;
			for($i=0; $i<$this->numerador->n; $i++){
				// $alfa = $ang * M_PI / 180;
				//$x = $radio * cos($alfa);
				//$y = $radio * sin($alfa);
				/*
imagefilledarc(
    resource $image,
    int $cx,
    int $cy,
    int $width,
    int $height,
    int $start,
    int $end,
    int $color,
    int $style
): bool
				*/
				imagefilledarc($img, $cx, $cy, $width, $height, $ang_ini_grad, 
				               $ang_ini_grad + $ang_rebanada, $rojo, IMG_ARC_PIE);
				//imageline($img, 200, 200, $x, $y, $negro);
				$ang_ini_grad = $ang_ini_grad + $ang_rebanada;
			}
			$ang_rad_ini = 0;
			$ang_rad_div = 2*M_PI / $this->denominador->n;
			for($i=0; $i<$this->denominador->n; $i++){
				$x = $cx + $radio * cos($ang_rad_ini);
				$y = $cx + $radio * sin($ang_rad_ini);
				imageline($img, $cx, $cy, $x, $y, $negro);
				$ang_rad_ini = $ang_rad_ini + $ang_rad_div;
			}
			imagepng($img);
			imagedestroy($img);

		}
		public function propia(){ // devuelve true si la fracción es propia 
			if($this->numerador->n < $this->denominador->n) return true;
			else return false;
		}
	}
?>