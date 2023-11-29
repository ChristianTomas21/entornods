<?php
namespace App\Controllers;

//require "../app/models/User.php";
use App\Models\User;
use Dompdf\Dompdf;

class UserController
{
    function __construct()
    {
       // echo"<br>Construyendo USER controller...";
    }
    function index(){
        $users =User::all();
        require('../views/user/index.php'); 
    }
    function show($args){
        $id = (int)$args[0];
        $user = User::find($id);
        require "../views/user/show.php";
    }
    function create(){
        require "../views/user/create.php";
    }

    function store(){
        $user = new User();
        $user->name = $_REQUEST["name"];
        $user->surname = $_REQUEST["surname"];
        $user->email = $_REQUEST["email"];
        $user->birthdate = $_REQUEST["birthdate"];
        $user->insert();
        header("Location: /user/");
    }
    function edit($args){
        $id = (int)$args[0];
        $user = User::find($id);
        require "../views/user/edit.php";
    }
    function update(){
        $id = $_REQUEST["id"];
        $user = User::find($id); //datos del usuario que se modificaran
        $user->name = $_REQUEST["name"];
        $user->surname = $_REQUEST["surname"];
        $user->email = $_REQUEST["email"];
        $user->birthdate = $_REQUEST["birthdate"];
        $user->save(); //llamo metodos del modelo
        header("Location: /user");
    }
    function delete($args){
        $id=(int)$args[0];
        $user=User::find($id);
        $user->delete();
        header("Location: /user");
    }
    function resetpassword($args){
        $id=(int)$args[0];
        $user = User::find($id);
        $user->setPassword("password");
        header("Location: /user");
    }
    function resetAllPassword(){
        $users =User::all();
        foreach($users as $user){
            $user->setPassword("password");
        }
        header("Location: /user");
    }
    function toPdf($args){
        $id = (int)$args[0];
        ob_start();
        $ruta = "http://mvc.local/user/show/" . $id;
        echo file_get_contents($ruta);
        $html = ob_get_clean();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("DetalleUsuario.pdf", ["Attachment"=>false]);
    }
}//fin clase

