<?php

class PageShow{
    public $currentpage;

    public function __construct($objpage)
    {
        $this->currentpage = $objpage;
    }

    public function show(){
        echo "<br>El nombre de la pagina actual es :" . $this->currentpage->name;
        $status = $this->currentpage->status ? 'Activo' : 'Deshabilitado';
        echo "<br>Estado de la página : ". $status;
    }
}

$page = new stdClass();
$page->name = "Indice";
$page->status = 1;


//añadir metodos dinamicos stdClass
$page->print = function($text){
    return "Imprimiendo el texto : " . $text;
};


$pageview = new PageShow($page);
$pageview->show();

$printing = $page->print;
echo "<br>" . $printing("hola mundo");


