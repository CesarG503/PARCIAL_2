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

    public function Calculo()
    {
        $capital = $_POST["capital"]; 
        $i = 0.12;
        $n = 12;
        $transacciones = array();
        
        if(empty($capital))
        {
             return $this->view("index",["title"=> "INICIO", "error"=> "Ingresar el capital"]);
        }
        else{
            $cuota = $capital * ($i * pow((1+$i),$n)  ) / ( pow((1+$i),$n) - 1);

            for ($j=1; $j <= $n; $j++)
            { 
                

                array_push( $transacciones, ["mes"=> $i,"cuota"=> $cuota, "capital"=> $capital,"interes"=> $i , "saldo" => $capital ] );
                $capital -= $cuota;
          
            }


             return $this->view("index",["title"=> "INICIO", "transacciones" =>$transacciones]);
      



        }

    }

    public function Validar()
    {
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $dui = $_POST["dui"];


        if(empty($nombre)||empty($correo)||empty($dui))
        {
            return $this->view("index",["title"=> "INICIO", "error"=> "Todos los campos son obligatorios"]);

        }
        else
        {
            $nombre_r = "/^[a-zA-Z\s]+$/";
            $dui_r = "/^\d{9}-\d{1}$/";
            $correo_r = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";


            if(!preg_match($nombre_r,$nombre))
                {
                    return $this->view("index",["title"=> "INICIO", "error"=> "Ingrese el nombre solo letras"]);


                }
            if(!preg_match($dui_r,$dui))
                {
                    return $this->view("index",["title"=> "INICIO", "error"=> "Ingrese el dui con formato ########-#"]);


                }
            if(!preg_match($correo_r,$correo))
                {
                    return $this->view("index",["title"=> "INICIO", "error"=> "Ingrese el correo con un formato indicado"]);

                }

            return $this->view("index",["title"=> "INICIO", "nombre"=> $nombre,"correo"=> $correo,"dui"=> $dui, "exito"=> "DATOS INGRESADOS EN EL FORMATO CORRECTO"]);


        }






    }


}



?>