<?php

namespace App;

class Propiedad extends ActiveRecord{

    protected static $tabla = 'propiedades';
    protected static $columnasDB=['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args=[])
    {
        $this->id = $args["id"] ?? null;
        $this->titulo = $args["titulo"] ?? '';
        $this->precio = $args["precio"] ?? '';
        $this->imagen = $args["imagen"] ?? '';
        $this->descripcion = $args["descripcion"] ?? '';
        $this->habitaciones = $args["habitaciones"] ?? '';
        $this->wc = $args["wc"] ?? '';
        $this->estacionamiento = $args["estacionamiento"] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args["vendedores_id"] ?? '';
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = 'Debes añadir un titulo';
        }

        if( strlen($this->titulo) > 45){
            self::$errores[] = 'Titulo Muy largo, Max 45 Carácteres';
        }

        if(!$this->precio){
            self::$errores[] = 'El Precio es Obligatorio';
        }

        if (strlen((string)$this->precio) >= 9) {
            self::$errores[] = "No puedes agregar un número mayor a 99999999.99.";
        }
        

        if(strlen($this->descripcion) < 50){
            self::$errores[] = 'La Descripcion es Obligatoria y debe tener minimo 50 caracteres';
        }

        if(!$this->habitaciones){
            self::$errores[] = 'El Numero de habitaciones es obligatorio';
        }

        if(!$this->wc){
            self::$errores[] = 'El Numero de Baños es obligatorio';
        }

        if(!$this->estacionamiento){
            self::$errores[] = 'El Numero de lugares de Estacionamiento es obligatorio';
        }

        if(!$this->vendedores_id){
            self::$errores[] = 'Elige un vendedor';
        }


        if(!$this->imagen){
            self::$errores[] = "La imagen es Obligatoria";
        }

        return self::$errores;
    }
}