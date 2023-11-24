<?php
require "../bdcon_testclients.php";

echo "<h2>Bbbdd con PHP</h2>";
//print_r(PDO::getAvailableDrivers());


try {
    $dbh = new PDO(DSN, USERNAME, PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM clients";
    $sql2 = "INSERT INTO clients VALUES(null,'Pepito','asd',20,232323223)";

    /*
    //FORMA 1 : QUERY
    $registers = $dbh->query($sql);
    foreach($registers as $row){
        echo "Id : " . $row["ID"];
        echo "Nombre : " . $row["NAME"];
        echo "Direccion : " . $row["Adress"];
        echo "Edad : " . $row["Age"];
        echo "Telefono : " . $row["Telephone"];
        echo "<br>";
        echo $registers-> rowCount();
    }*/

    //FORMA 2 : PREPARE + EXECUTE
    //$stmnt = $dbh->prepare($sql);
    $stmnt = $dbh->prepare($sql2);
    $stmnt->execute();

    //recoger los resultados:
    //OPCION A: fetchAll como array asociativo
    /*$registers = $stmnt->fetchAll(PDO::FETCH_ASSOC);
     foreach($registers as $row){
        echo "Id : " . $row["ID"];
        echo "Nombre : " . $row["NAME"];
        echo "Direccion : " . $row["Adress"];
        echo "Edad : " . $row["Age"];
        echo "Telefono : " . $row["Telephone"];
        echo "<br>";
    }*/
    //OPCION B: fetchAll como un objeto
    $registers = $stmnt->fetchAll(PDO::FETCH_OBJ);
    foreach ($registers as $row) {
        echo "Id : " . $row->ID;
        echo "Nombre : " . $row->NAME;
        echo "Direccion : " . $row->Adress;
        echo "Edad : " . $row->Age;
        echo "Telefono : " . $row->Telephone;
        echo "<br>";
    }

echo 'Número de total de registros: ' . $fila['total'];


} catch (Exception $ex) {
    echo "Fallo en la conexión : " . $ex->getMessage();
} finally {
    $dbh = null; //cierro la conexion
    echo "<br>Conexion cerrada";
}
