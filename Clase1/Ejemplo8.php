<?php

// Clase Abstracta para Tareas del Robot
abstract class TareasRobot {
    // Método abstracto para caminar
    abstract public function caminar() {
        echo 'El robot esta caminando de costado';
    }

    // Método abstracto para hablar
    abstract public function hablar();

    // Método abstracto para bailar
    abstract public function bailar();
}

// Ejemplo de una clase que hereda de la Clase Abstracta TareasRobot
class Robot extends TareasRobot {
    // Implementación del método abstracto para caminar

    // Implementación del método abstracto para hablar
    public function hablar() {
        echo "Hola, soy un robot.\n";
    }

    // Implementación del método abstracto para bailar
    public function bailar() {
        echo "¡El robot está bailando!\n";
    }
}

// Uso de la clase Robot
$miRobot = new Robot();
$miRobot->caminar();
$miRobot->hablar();
$miRobot->bailar();