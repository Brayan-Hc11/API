<?php

require_once("../Config/Conexion.php");
require_once("../Models/Categoria.php");
    $categoria = new Categoria();

switch($_GET["op"]){
    
    case "GetAll":
        $datos=$categoria->get_categoria();
        echo json_encode($datos);
    break;
}?>