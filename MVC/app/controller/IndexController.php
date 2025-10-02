<?php 

namespace app\controller;

class IndexController{

 public function view($view, $data = [])
    {
        extract($data);

        if(file_exists("../app/views/$view.php"))
            {
                ob_start();
                include("../app/views/$view.php");
                $contnet = ob_get_clean();
                return $contnet;
            }else{echo"No se pudo encontrar el archivo";}

    }
    
    public function Index(){

        return $this->view("index",["title"=> "INICIO"]);
    }


}



?>