<?php
namespace Model;
class Curso extends ActiveRecord{
    protected static $tabla = 'curso';
    protected static $columnasDB = ['id_curso','nombre_curso','descripcion_curso'];
    public $id_curso;
    public $nombre_curso;
    public $descripcion_curso;

    public function __construct( $args = [] ){
        $this->id_curso = $args['cursoID'] ?? null;
        $this->nombre_curso = $args['nombre'] ?? '';
        $this->descripcion_curso = $args['descripcion'] ?? '';
    }
    public function crearCurso(){
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
        $query = "SELECT * FROM " . static::$tabla . " WHERE id_curso = ${id}";
        $resultado = self::consultarSQL($query,static::$tabla);
        return array_shift($resultado);
    }
    public function actualizarCurso($id){
        //Sanitizar los datos
        $atributos = $this->sanitizarDatos();
        $valores = [];
        foreach($atributos as $key => $value){
            $value2 = str_replace("'", "", $value);
            $valores[] = "{$key}='{$value2}'";
        }
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ',$valores);
        $query .= "WHERE id_curso= '" . str_replace("'", "", self::$db->quote($id)) . "' ";
        $resultado = self::$db->query($query);
        if($resultado){
            //Redireccionar
            header('Location: /AdminMenu?resultado=2');
        } 
    }
    //Eliminar un registro
    public function eliminarCurso($id){
        $query= "DELETE FROM " . static::$tabla . " WHERE id_curso = " . $id;
        $resultado = self::$db->query($query);
        if($resultado){
            header('location: /AdminMenu?resultado=3');
        }
    }

}