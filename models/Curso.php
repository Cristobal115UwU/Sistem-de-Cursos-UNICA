<?php
namespace Model;
class Curso extends ActiveRecord{
    protected static $tabla = 'curso';
    protected static $columnasDB = ['cursoID','nombre','descripcion'];
    public $cursoID;
    public $nombre;
    public $descripcion;

    public function __construct( $args = [] ){
        $this->cursoID = $args[''] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripción'] ?? '';
    }


}