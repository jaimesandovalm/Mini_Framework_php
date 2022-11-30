<?php

$ruta = !empty($_GET['url']) ? $_GET['url'] : "home/index";
$array = explode("/", $ruta);
$controller = $array[0];
$metodo = "index";
$parametro = "";

if (!empty($array[1])) {
    if(!empty($array[1] != '')){
        $metodo = $array[1];
    }
}

if (!empty($array[2])) {
    if(!empty($array[2] != '')){
        for ($i=2; $i < count($array) ; $i++) { 
            $parametro .= $array[$i]. ",";
        }
        $parametro = trim($parametro, ",");
    }
}

$dircontroller = "Controllers" . $controller . ".php";

if (file_exists($dircontroller)) {
    require_once $dircontroller;
    $controller = new $controller();
    if (metod_exists($contoller,$metodo)) {
        $controller->$metodo($parametro);
    }else{
        echo "no existe el metodo";
    }
}else{
    echo "no existe el controlador";
}