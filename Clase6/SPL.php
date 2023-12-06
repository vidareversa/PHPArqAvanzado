<?php

/*
 *  Estos SPL estan orientado a estructuras de datos
 * 
 *  Pilas (Stack), Colas (Queue), Heaps
 */

// Ejemplo de SplStack //Pila
$stack = new SplStack();
$stack->push("Elemento 1");
$stack->push("Elemento 2");

echo "SplStack: " . $stack->pop() . "\n";  // Imprime "Elemento 2"
echo "SplStack: " . $stack->pop() . "\n";  // Imprime "Elemento 1"

//----------------------------------//
// Ejemplo de SplQueue //Cola
$queue = new SplQueue();
$queue->enqueue("Elemento 1");
$queue->enqueue("Elemento 2");

echo "SplQueue: " . $queue->dequeue() . "\n";  // Imprime "Elemento 1"
echo "SplQueue: " . $queue->dequeue() . "\n";  // Imprime "Elemento 2"

//----------------------------------//
// Ejemplo de SplHeap //
class MiHeap extends SplHeap {
    protected function compare($valor1, $valor2) { //escribe el metodo compare que realizar el orden ascendente
        return $valor1 - $valor2;
    }
}

$heap = new MiHeap();
$heap->insert(3);
$heap->insert(1);
$heap->insert(4);

echo "SplHeap: " . $heap->extract() . "\n";  // Imprime 1
echo "SplHeap: " . $heap->extract() . "\n";  // Imprime 3

//----------------------------------//
// Ejemplo de SplFileInfo
$archivo = new SplFileInfo(__FILE__);
echo "SplFileInfo:\n";
echo 'Nombre del archivo: ' . $archivo->getFilename() . "\n";
echo 'Tamaño del archivo: ' . $archivo->getSize() . " bytes\n";