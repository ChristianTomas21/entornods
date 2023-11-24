<?php
require_once('User.php');

class Controller  
{
    public function index()
    {
        $arrusers = User::all(); //emetodo del modelo
        // echo json_encode($users);
        require('views/index.php'); 
    }
    public function show()
    {
        $id = $_GET['id'];
        $user = User::find($id); //metodo del modelo
        // echo json_encode($user);
        require('views/show.php');
    }
}