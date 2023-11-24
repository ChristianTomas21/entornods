<?php
namespace app\Controllers;
class ClientController
{
    function __construct()
    {
        echo "<br>Construyendo CLIENT controller...";
    }
    function index(){
        require('../views/client/index.php'); 
    }
    function show(){
        echo "<br>En el SHOW de CLIENT";
    }
}//fin clase