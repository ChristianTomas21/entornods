<?php
    namespace Dwes;

    const RADIO = 126.88; // millones de kilometros

    function observar($nombre){
        echo"<br>Observando la galaxia: $nombre";
    }
    function time(){
        echo ", hola que tal soy time dentro de galaxia.php";
    }

    class galaxia{
        function __construct(){
            $this->nacer();
        }
        function nacer(){
            echo"<br>Hola soy una nueva galaxia";
        }
        static function muerte(){
            echo"<br>Me estoy muriendo...";
        }

    }