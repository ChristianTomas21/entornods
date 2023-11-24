<?php
    namespace Dwes;

    require "galaxia.php";
    require "galaxiaenana/galaxiaenana.php";

    echo "<h2>Acceso SIN cualificar</h2>";
    observar("Via lactea");
    echo "<br>El radio es ". RADIO;
    $gl = new galaxia();
    galaxia::muerte();// para acceder a una variable estatica ::

    echo "<h2>Acceso CUALIFICADO</h2>";
    Galaxiaenana\observar("Los 3 Pilares");
    echo "<br>El radio es" . Galaxiaenana\RADIO;
    $gl = new Galaxiaenana\galaxia();
    Galaxiaenana\galaxia::muerte();

    echo "<h2>Acceso TOTALMENTE CUALIFICADO</h2>";
    \Dwes\Galaxiaenana\observar("MGC 5702");
    echo "<br>El radio es" . \Dwes\Galaxiaenana\RADIO;
    $gl = new Galaxiaenana\galaxia();
    \Dwes\Galaxiaenana\galaxia::muerte();

    // la manera de importar la clase o direccion de el package en este caso:
    // \Dwes\Galaxiaenana\RADIO; por ejemplo
    // usaremos el comando use
    echo "<h2>Importar con 'use'</h2>";
    use function \Dwes\Galaxiaenana\observar;
    observar("otra galaxia");
    use const \Dwes\Galaxiaenana\observar;
    echo "<br>El radio es" . RADIO;

    use function \Dwes\Galaxiaenana\observar as mirar;
    mirar("cometa Halley");

    echo "<br> <h3>namespace en uso " . __NAMESPACE__ . "</h3>";

    echo "<h2>Trabajando con valores fuera del package</h2>";
    echo "<br>Hora actual: " . \time();
    echo "<br>Vida de la galaxia: " . time();