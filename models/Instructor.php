<?php
namespace Model;
class Instructor extends ActiveRecord{
    protected static $tabla = 'instructor';
    protected static $columnasDB = ['instructorID','nombre_instructor','apellido_instructor','telefono'];
    public $instructorID;
    public $nombre_instructor;
    public $apellido_instructor;
    public $telefono;
    public function __construct( $args = [] ){
        $this->instructorID = $args[''] ?? null;
        $this->nombre_instructor = $args['nombre'] ?? '';
        $this->apellido_instructor = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }


}