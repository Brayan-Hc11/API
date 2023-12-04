<?PHP

$host='localhost';$usuario='root';$password='';$basedadatos='API08';

$conexion=new mysqli($host,$usuario,$password,$basedadatos);
    if($conexion->connect_error){die('Conexion no establecida'. $conexion->connect_error);}

header('Content_type: application/json');
    $metodo= $_SERVER['REQUEST_METHOD'];
    //print_r($metodo);

    $path = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/';
    $buscarID = explode('/',$path);
    $id = ($path!=='/')? end($buscarID):null;

switch($metodo){
    //SELECT usuarios
    case'GET':
        //echo'Consulta de registro - GET';
        consulta($conexion,$id);
    break;

    //INSERT
    case 'POST';
        echo'Insertar registros - POST';
         insertar($conexion);
    break;

    //UPDATE
    case'PUT';
        echo'Actulizar registros - PUT';
        actualizar($conexion,$id);
    break;

    //DELETE
    case'DELETE';
        echo'Eliminar registros - DELETE';
        borrar($conexion,$id);
    break;
}
/////////////////////////////////////////////////////
function consulta($conexion,$id){
    $sql = ($id===null)? "SELECT * FROM Usuario" : "SELECT * FROM Usuario WHERE id= $id";
    $resultado = $conexion->query($sql);

    if($resultado){
        $datos = array();
        while($fila=$resultado->fetch_assoc()){
            $datos[] = $fila;
        }
        echo json_encode($datos);
    }
}
/////////////////////////////////////////////////////////////////
function insertar($conexion){
    $dato = json_decode(file_get_contents('php://input'),true);
    $nombre = $dato['nombre'];
    print_r($nombre);

    $sql ="INSERT INTO Usuario(nombre) VALUES ('$nombre')";
    $resultado = $conexion->query($sql);

        if($resultado){
            $datos['id'] = $conexion->insert_id;
            echo json_encode($datos);
        }else{
            echo json_encode(array('error'=>'Error al crear un usuario'));
        }
    }
//////////////////////////////////////////////////////////////////
function borrar($conexion,$id){
    echo 'El id a borrar es:'.$id;

    $sql ="DELETE FROM Usuario WHERE id='$id'";
    $resultado = $conexion->query($sql);

        if($resultado){
            echo json_encode(array('Correcto'=>'Usuario borrado'));
        }else{
            echo json_encode(array('error'=>'Error al borrar el usuario'));
        }
}
//////////////////////////////////////////////////////////////////
function actualizar($conexion,$id){
    $dato= json_decode(file_get_contents('php://input'),true);
    $nombre=$dato['nombre'];

    echo 'El id a editar es: '.$id.' con el dato '.$nombre;

    $sql ="UPDATE  Usuario SET nombre='$nombre' WHERE id='$id'";
    $resultado = $conexion->query($sql);

        if($resultado){
            echo json_encode(array('Correcto'=>'Usuario actualizado'));
        }else{
            echo json_encode(array('error'=>'Error al actualizar el usuario'));
        }
}


?>