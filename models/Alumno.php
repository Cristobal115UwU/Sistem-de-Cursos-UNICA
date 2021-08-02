<?php
namespace Model;
class Alumno extends ActiveRecord{

    protected static $tabla = 'alumno';
    protected static $columnasDB = ['nombre','apellido','correo_alumno','password'];
    public $alumnoID;
    public $nombre;
    public $apellido;
    public $correo_alumno;
    public $password;

    public function __construct( $args = [] ){
        $this->alumnoID = $args[''] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->correo_alumno = $args['correo_alumno'] ?? '';
        $this->password = $args['password'] ?? '';
    }
    public function setPass($password){
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }
    public function guardar(){
        if(!is_null($this->alumnoID)){
            //Actualizar
            $this->actualizar();
        }else{
            $this->crear();
        }
    }
    public function validarSignUp(){
        if(!$this->nombre){
            self::$errores[]= "El nombre es obligatorio";
        }
        if(!$this->apellido){
            self::$errores[]= "El apellido es obligatorio";
        }
        if(!$this->correo_alumno){
            self::$errores[]= "El correo es obligatorio";
        }
        if(!$this->password){
            self::$errores[]= "El password es obligatorio";
        }
        return self::$errores;
    }


    public function validarLogin(){
        if(!$this->correo_alumno){
            self::$errores[] = 'El email es obligatorio';
        }
        if(!$this->password){
            self::$errores[] = 'El Password es obligatorio';
        }
        return self::$errores;
    }

    
    public function existeUsuario(){
        // Revisar si un usuario existe o no
        $query = "SELECT * FROM " . self::$tabla . " WHERE correo_alumno = '" . $this->correo_alumno . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if(!$resultado->rowCount()){
            self::$errores[] = "El usuario no existe";
            return;
        }
        return $resultado;
    }
    public function existeAdmin($correo){
        // Revisar si un admin existe o no
        $query = "SELECT * FROM admin WHERE correo = '" . $correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if(!$resultado->rowCount()){
            self::$errores[] = "El usuario no existe";
            return;
        }
        return $resultado;
    }
    public function comprobarPassword($resultado){
        $usuario = $resultado->fetchObject();
        $autenticado = password_verify($this->password, $usuario->password);
        if(!$autenticado){
            self::$errores[] = "El password es Incorrecto";
        }
        return array($autenticado,$usuario);
    }
    public function autenticar($usuario){
        session_start();
        //Llenar el arreglo de session
        $_SESSION['usuario'] = $usuario->nombre;
        $_SESSION['tipo'] = 0;
        $_SESSION['login'] = true;
        $id = $usuario->alumnoID;
        $url = "Location: /?id=" . $id;
        header($url);
    }

    public function autenticarAdmin(){
        session_start();
        //Llenar el arreglo de session
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;
        header('Location: /AdminMenu');
    }
}