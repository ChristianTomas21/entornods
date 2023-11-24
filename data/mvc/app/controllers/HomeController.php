<?php
namespace app\Controllers;
class HomeController
{
    function __construct()
    {
        echo "<br>Construyendo HOME controller...";
    }
    function index(){
        echo "<br>En el INDEX de HOME";
    }
    function show(){
        echo "<br>En el SHOW de HOME";
    }
}//fin clase