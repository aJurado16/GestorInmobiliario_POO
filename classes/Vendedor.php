<?php

namespace App;

class Vendedor extends ActiveRecord {

    protected static $tabla = 'vendedores';
    protected static $columnasDB=['id','nombre','apellido','telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args=[])
    {
        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? '';
        $this->apellido = $args["apellido"] ?? '';
        $this->telefono = $args["telefono"] ?? '';
    }

    public function validar(){
        if(!$this->nombre){
            self::$errores[] = 'Debes añadir un Nombre';
        }

        if( strlen($this->nombre) > 45){
            self::$errores[] = 'Nombre Muy largo, Max 45 Carácteres';
        }

        if(!$this->apellido){
            self::$errores[] = 'Debes añadir un Apellido';
        }

        if( strlen($this->apellido) > 45){
            self::$errores[] = 'Apellido Muy largo, Max 45 Carácteres';
        }

        if(!$this->telefono){
            self::$errores[] = 'Debes añadir un Telefono';
        }

        if( strlen($this->telefono) > 10){
            self::$errores[] = 'Telefono Muy largo, Max 10 Carácteres';
        }

        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = 'Formato de telefono no válido';
        }

        return self::$errores;
    }
}