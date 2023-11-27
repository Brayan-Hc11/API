<?php
class Categoria extends Conectar{
public function get_categoria(){

    $Conectar = parent::Conexion();
    parent::set_names();
        
        $sql="SELECT * FROM Categoria WHERE est=1";
        $sql=$Conectar->parent($sql);
        $sql->execute();
    return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);}}?>