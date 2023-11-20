<?php

// ISP: Los clientes no deben verse obligados a depender de interfaces que no utilizan.
interface Worker {
    public function work();
}

interface Eater {
    public function eat();
}

/* 
Clase que implementa las interfaces Worker y Eater. 
(y si en vez de Human, la clase seria Robot ¿estaria ok?) 
*/
class Robot implements Worker, Eater {
    public function work() {
        // Lógica para trabajar.
    }
    
    public function eat() {
        // Lógica para comer.
    }
}