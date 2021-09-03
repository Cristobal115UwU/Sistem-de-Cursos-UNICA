<?php
namespace Model;
class Instructor extends ActiveRecord{
    protected static $tabla = 'instructor';
    protected static $columnasDB = ['nombre_instructor','apellido_materno','apellido_paterno','telefono'];
    public $id_instructor;
    public $nombre_instructor;
    public $apellido_paterno;
    public $apellido_materno;
    public $telefono;
    public function __construct( $args = [] ){
        $this->id_instructor = $args[''] ?? null;
        $this->nombre_instructor = $args['nombre_instructor'] ?? '';
        $this->apellido_paterno = $args['apellido_paterno'] ?? '';
        $this->apellido_materno = $args['apellido_materno'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }
    public function crearInstructor(){
        //Sanitizar los datos
        $atributos = $this->sanitizarDatos();
        //Insertar en la base de Datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .=  join(',', array_keys($atributos)); 
        $query .= " ) VALUES( "; 
        $query .= join(", ", array_values($atributos)); 
        $query .= " ) ";
        $resultado = self::$db->query($query);
        //Mensaje de exito
        if($resultado){
            //Redireccionar
            header('Location:/AdminMenu?resultado=1');
        }
    }
    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla . " WHERE id_instructor = ${id}";
        $resultado = self::consultarSQL($query,static::$tabla);
        return array_shift($resultado);
    }
    public function actualizarInstructor($id){
        //Sanitizar los datos
        $atributos = $this->sanitizarDatos();
        $valores = [];
        foreach($atributos as $key => $value){
            $value2 = str_replace("'", "", $value);
            $valores[] = "{$key}='{$value2}'";
        }
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ',$valores);
        $query .= "WHERE id_instructor= '" . str_replace("'", "", self::$db->quote($id)) . "' ";
        $resultado = self::$db->query($query);
        if($resultado){
            //Redireccionar
            header('Location: /AdminMenu?resultado=2');
        } 
    }
    public function eliminarInstructor($id){
        $query= "DELETE FROM " . static::$tabla . " WHERE id_instructor = " . $id;
        $resultado = self::$db->query($query);
        if($resultado){
            header('location: /AdminMenu?resultado=3');
        }
    }
}