<?php
require "../bdcon.php";

echo "<h2>Bbbdd con PHP</h2>";
//print_r(PDO::getAvailableDrivers());


try {
    $dbh = new PDO(DSN, USERNAME, PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM city";


    /*
    //FORMA 1 : QUERY
    $registers = $dbh->query($sql);
    foreach($registers as $row){
        echo "Id : " . $row["ID"];
        echo "Nombre : " . $row["Name"];
        echo "Distrito : " . $row["District"];
        echo "Poblacion : " . $row["Population"];
        echo "<br>";
    }*/

    //FORMA 2 : PREPARE + EXECUTE
    $stmnt = $dbh->prepare($sql);
    $stmnt->execute();

    //recoger los resultados:
    //OPCION A: fetchAll como array asociativo
    /*$registers = $stmnt->fetchAll(PDO::FETCH_ASSOC);
     foreach($registers as $row){
        echo "Id : " . $row["ID"];
        echo "Nombre : " . $row["Name"];
        echo "Distrito : " . $row["District"];
        echo "Poblacion : " . $row["Population"];
        echo "<br>";
    }*/
    //OPCION B: fetchAll como un objeto
    $registers = $stmnt->fetchAll(PDO::FETCH_OBJ);
    foreach ($registers as $row) {
        echo "Id : " . $row->ID;
        echo "Nombre : " . $row->Name;
        echo "Distrito : " . $row->District;
        echo "Poblacion : " . $row->Population;
        echo "<br>";
    }
} catch (Exception $ex) {
    echo "Fallo en la conexión : " . $ex->getMessage();
} finally {
    $dbh = null; //cierro la conexion
    echo "<br>Conexion cerrada";
}
