<?php

header('Content-Type: application/json');

require_once("../Config/Conexion.php");
require_once("../Models/Categoria.php");
    $categoria = new Categoria();

$body=json_decode(file_get_contents("php://input"),true);

switch($_GET["op"]){
///////////////////////////////////////////////////////////////////////////////////////////////   
    case "GetAll":
        $datos=$categoria->get_categoria();
            echo json_encode($datos);
    break;
///////////////////////////////////////////////////////////////////////////////////////////////
    case "GetID":
        $datos=$categoria->get_categoria_x_id(
            $body["cat_id"]);
            echo json_encode("Leer correcto");
    break;
///////////////////////////////////////////////////////////////////////////////////////////////
    case "Insert":
        $datos=$categoria->insert_cat(
            $body["cat_nom"],
            $body["cat_obs"]
        );
            echo json_encode("Insert correcto");
    break;
//////////////////////////////////////////////////////////////////////////////////////////////
    case "Update":
        $datos=$categoria->update_cat(
            $body["cat_id"],
            $body["cat_nom"],
            $body["cat_obs"]
        );
            echo json_encode("Update correcto");
    break;
//////////////////////////////////////////////////////////////////////////////////////////////    
    case "Delete":
        $datos=$categoria->delete_cat(
            $body["cat_id"]
        );
            echo json_encode("Delete correcto");
    break;
//////////////////////////////////////////////////////////////////////////////////////////////    
}




?>