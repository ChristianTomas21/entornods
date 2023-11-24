<?php
    namespace Dwes\Galaxiaenana;

    const RADIO = 35; // millones de kilometros
    
    function time(){
        echo "<br>me quedan 2 años";
    }

    function observar($nombre){
        echo"<br>Mirando a: $nombre";
    }

    class galaxia{
        function __construct(){
            $this->nacer();
        }
        function nacer(){
            echo"<br>Nueva galaxia enana en camino";
        }
        static function muerte(){
            echo"<br>Galaxia destruyendose";
        }

    }