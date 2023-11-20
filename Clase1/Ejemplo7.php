<?php

#Interfaces

// Esto es una lista de cosas que un robot debe hacer. es un -contrato-
interface TareasRobot {
    public function caminar();
    public function hablar();
    public function bailar();
}

// Ahora, un robot real puede "implementar" estas tareas.
class Robot implements TareasRobot {
    public function caminar() {
        echo "El robot está caminando.\n";
    }

    public function hablar() {
        echo "Hola, soy un robot.\n";
    }

    public function bailar() {
        echo "¡El robot está bailando!\n";
    }
}

// Creamos un robot y le pedimos que haga las cosas de la lista.
$miRobot = new Robot();
$miRobot->caminar();
$miRobot->hablar();
$miRobot->bailar();