<?php

echo "TAREAS <br>";
class tarea {
    public $descripcion;
    public $completa;

    function __construct($descripcion, $completa) {
        $this->descripcion = $descripcion;
        $this->completa = $completa;
    }

    function descripcionTarea() {
        return $this->descripcion;
    }

    function tareaCompleta() {
        return $this->completa;
    }

    
}

class listatareas {
    public $tareas;

    function __construct() {
        $this->tareas = [];
    }

    function aggtarea($descripcion, $completa) {
        $tarea = new tarea($descripcion, $completa);
        $this->tareas[] = $tarea;
    }

    function mostrarTareas() {
        foreach ($this->tareas as $tarea) {
            echo "Descripción: " . $tarea->descripcionTarea() . ", Completa: " . ($tarea->tareaCompleta() ? "Sí" : "No") . "<br>";
        }
    }
}

// Ejemplo de uso
$lista = new listatareas();
$lista->aggtarea("Descripción de la tarea 1", true);
$lista->aggtarea("Descripción de la tarea 2", false); 
$lista->aggtarea("Descripción de la tarea 2",true); 
$lista->mostrarTareas();

echo "<br><br>";

