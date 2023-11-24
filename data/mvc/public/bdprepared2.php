<?php
require "../bdcon.php";
echo "<h2>BBDD Sentencia</h2>";

/*
    1- Preparar la sentencia -> prepare : 
            -named placeholder : :nomvariable
            -question mark placeholder : ?
    2- Vincular valores a las variables
            -binParam
            -binValue
    3- Ejecutar la sentencia -> execute
*/

try {
    $dbh = new PDO(DSN2, USERNAME, PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Forma A: named placeholder
    $sql = "ALTER TABLE " .TABLACLIENTES. "ADD COLUMN Fecha DATE (dd/MM/yyyy)";

    //Forma b: QUERY MARK placeholder
    $sql2 = "INSERT INTO " .TABLACLIENTES. "(ID,Name,Adress,Age,Telephone) 
    VALUES(?,?,?,?,?)";

    $statement = $dbh->prepare($sql2);

    //OPCION 1: bindParam -> variable es una referencia.
    // son valores que recojo $_POST, $_GET, $_COOKIE,....
    $id = null;
    $nombre = "Esther";
    $direccion = "Avenida Navarra";
    $edad = 43;
    $telefono = "978665522";
/*
    $statement->bindParam(":id",$id);
    $statement->bindParam(":nombre",$nombre);
    $statement->bindParam(":direccion",$direccion);
    $statement->bindParam(":edad",$edad);
    $statement->bindParam(":telefono",$telefono);
    */

    //OPCION 2 :bindValue -> asocio los valores
    /*$statement->bindValue(":id",$id);
    $statement->bindValue(":nombre",$nombre);
    $statement->bindValue(":direccion",$direccion);
    $statement->bindValue(":edad",$edad);
    $statement->bindValue(":telefono",$telefono);



    $nombre = "Alfredo";
    $edad = 64;
        //ejecutar la sentencia
        $statement->execute();*/

    //CON QUESTION MARK PLACEHOLDER
    
    $statement->bindParam(1,$id);
    $statement->bindParam(2,$nombre);
    $statement->bindParam(3,$direccion);
    $statement->bindParam(4,$edad);
    $statement->bindParam(5,$telefono);

    $direccion = "Calle el huerto";
    $statement->execute();
    echo "<h4>Insercion correcta!!</h4>";
}catch (Exception $ex) {
    echo "Fallo en la conexión : " . $ex->getMessage();
} finally {
    $dbh = null; //cierro la conexion
    echo "<br>Conexion cerrada";
}