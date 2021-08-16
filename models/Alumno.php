<?php
namespace Model;
class Alumno extends ActiveRecord{

    protected static $tabla = 'alumno';
    protected static $columnasDB = ['nombre_alumno','apellido_materno','apellido_paterno','correo_alumno','password'];
    public $id_alumno;
    public $nombre_alumno;
    public $apellido_paterno;
    public $apellido_materno;
    public $correo_alumno;
    public $password;

    public function __construct( $args = [] ){  
        $this->id_alumno = $args[''] ?? null;
        $this->nombre_alumno = $args['nombre_alumno'] ?? '';
        $this->apellido_materno = $args['apellido_materno'] ?? '';
        $this->apellido_paterno = $args['apellido_paterno'] ?? '';
        $this->correo_alumno = $args['correo_alumno'] ?? '';
        $this->password = $args['password'] ?? '';
    }
    public function crearAlu(){
        //Sanitizar los datos
        $atributos = $this->sanitizarDatos();
        //Insertar en la base de Datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .=  join(',', array_keys($atributos)); 
        $query .= " ) VALUES( "; 
        $query .= join(", ", array_values($atributos)); 
        $query .= " ) ";;
        $resultado = self::$db->query($query);
        //Mensaje de exito
        if($resultado){
            //Redireccionar
            header('Location:/Login?resultado=1');
        }
    }
    public function setPass($password){
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }
    public function guardar(){
        if(!is_null($this->id_alumno)){
            //Actualizar
            $this->actualizar();
        }else{
            $this->crearAlu();
        }
    }
    public function validarSignUp(){
        if(!$this->nombre_alumno){
            self::$errores[]= "El nombre es obligatorio";
        }
        if(!$this->apellido_paterno){
            self::$errores[]= "El apellido paterno es obligatorio";
        }
        if(!$this->apellido_materno){
            self::$errores[]= "El apellido materno es obligatorio";
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
        $query = "SELECT * FROM admin WHERE correo_admin = '" . $correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if(!$resultado->rowCount()){
            self::$errores[] = "El usuario no existe";
            return;
        }
        return $resultado;
    }
    public function comprobarPassword($resultado){
        $usuario = $resultado->fetchObject();
        $autenticado = password_verify($this->password, $usuario->password_admin);
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