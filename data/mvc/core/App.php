<?php
namespace Core;
/*
http://mvc.local/user/index
http://mvc.local/index.php?url=user/index

La peticion get:
http://mvc.local/controlador/metpdp/arg1/arg
http://mvc.local/user/show/1

    /user/show/1 -> user/show/1 (trim) -> [user,show,1] (explode)

*/

class App {
    function __construct()
    {
        //Transformacion para el controlador
        isset($_GET["url"]) ? $url = $_GET["url"] : $url = "home";
            $arguments = explode('/',trim($url,'/'));

            //obtener controlador
            $controllerName = array_shift($arguments); // user | product | home
                                                        //UserController, ProductController
            $controllerName = ucwords($controllerName) . "Controller";

                
            //Transformacion para el metodos
                count($arguments) ? $method = array_shift($arguments) : $method = "index";
                
               // Otra opcion ->  $method = count($arguments) ?  array_shift($arguments) : "index";
               // $edad = rand(1,99);
                //echo $edad >=17 ? "Adulto" : "Menor";

                //importar el controlador
                $file = "../app/controllers/$controllerName" . ".php";
                if(file_exists($file)){
                    require "$file";
                }else{
                    http_response_code(404);
                    echo "Recurso no encontrado";
                    exit("Adioooss");
                }
                
                //crear instancia del controlador y llamar al metodo
                $controllerName = "\\App\Controllers\\" . $controllerName;
                $controllerObject = new $controllerName;
                //verificar si existe el metodo de la peticion de la clase/controlador
                if(method_exists($controllerObject,$method)){
                    //invocarlo
                    $controllerObject -> $method($arguments);
                }else{
                    http_response_code(404);
                    echo "Funcion no encontrada";
                    die();
                }
    }//fin construct
}//fin clase