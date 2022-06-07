<?php
    class Numero {
        public $n;
        public function __construct($num){
            $this->n = $num;
        }
        public function va(){
            if($this->n <= 0) return -1*$this->n;
            else return $this->n;
        }
        public function par(){
            if ( $this->n % 2 == 0) return true;
            else return false;
        }
        // Devuelve true si el número es primo, false de lo contrario
        public function primo(){

        }
        public function mcd($numero2){

        }
        public function numeroenletra(){

        }
        
    }
?>