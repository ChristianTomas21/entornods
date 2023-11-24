<?php
$cadenafecha = "12/10/2022";
$fecha = \DateTime::createFromFormat('d/m/Y',$cadenafecha);
echo "<br>ObjetoFecha";
var_dump($fecha);
$sfecha = $fecha->format('#Y#m#d');
echo "<br>cad fecha" . $sfecha;