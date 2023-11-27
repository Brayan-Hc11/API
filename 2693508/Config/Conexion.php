<?php
class Conectar{

protected $dbh;
protected function Conexion(){try{
    $conectar = $this -> dbh = new PDO("mysql: local=localhost;dbname=ADSOApi08","root","");
    return $conectar;
}catch (Exception $e){
    print "!Error BD !". $e->getMessege() ."<br/>";
    die();}}
public function set_names(){
return $this->dbh->query("SET NAMES 'UTF8'");}}
?>