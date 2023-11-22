<?php

/* 
  Hay una relación entre ambas clases, 
  pero ambas pueden existir independientemente
*/

class Estudiante {
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }
}

class Curso {
    private $nombre;
    private $estudiantes = array();

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function agregarEstudiante(Estudiante $estudiante) {
        $this->estudiantes[] = $estudiante;
    }

    public function obtenerEstudiantes() {
        return $this->estudiantes;
    }
}

// Asociación: Un curso tiene varios estudiantes
$curso = new Curso("Programación");
$estudiante1 = new Estudiante("Juan");
$estudiante2 = new Estudiante("Ana");

$curso->agregarEstudiante($estudiante1);
$curso->agregarEstudiante($estudiante2);

$estudiantesDelCurso = $curso->obtenerEstudiantes();

foreach ($estudiantesDelCurso as $estudiante) {
    echo "Estudiante: " . $estudiante->getNombre() . "\n";
}
