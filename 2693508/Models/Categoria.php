<?php
class Categoria extends Conectar{

///////////////////////////////////////////////////////////////////////////////////
public function get_categoria(){

    $conectar = parent::Conexion();
    parent::set_names();
        
        $sql="SELECT * FROM Categorias WHERE est=1";
        $sql=$conectar->parent($sql);
        $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);}

///////////////////////////////////////////////////////////////////////////////////   
public function get_categoria_x_id(){
 
    $conectar = parent::Conexion();
    parent::set_names();

        $sql="SELECT * FROM Categorias WHERE est=1 AND cat_id=?";
        $sql=$conectar->parent($sql);
        $sql->binParem(1,$id_cat);
        $sql->excute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);}
    
/////////////////////////////////////////////////////////////////////////////////// 
public function insert_cat($cat_nom,$cat_obs){

    $conectar = parent::Conexion();
    parent::set_names();

        $sql="INSERT INTO categorias (cat_id,cat_nom,cat_obs,est) 
        VALUES (NULL,?,?,'1')";
        
        $sql=$conectar->parent($sql);
        $sql->binParem(1,$cat_nom);
        $sql->binParem(2,$cat_obs);
        $sql->excute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);}
    
/////////////////////////////////////////////////////////////////////////////////// 
public function update_cat($cat_id,$cat_nom,$cat_obs){

    $conectar = parent::Conexion();
    parent::set_names();

        $sql="UPDATE SET categorias (cat_nom =?,cat_obs =?) 
        WHERE cat_id =?";
        
        $sql=$conectar->parent($sql);
        $sql->binParem(1,$cat_nom);
        $sql->binParem(2,$cat_obs);
        $sql->binParem(3,$cat_id);
        $sql->excute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);}
    
/////////////////////////////////////////////////////////////////////////////////// 
public function delete_cat($cat_id){

    $conectar = parent::Conexion();
    parent::set_names();

        $sql="UPDATE SET categorias 
        WHERE cat_id ='0'";
        
        $sql=$conectar->parent($sql);
        $sql->binParem(1,$cat_nom);
        $sql->excute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);}}
    
/////////////////////////////////////////////////////////////////////////////////// 
?>