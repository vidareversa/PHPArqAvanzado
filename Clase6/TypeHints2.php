<?php

//declare( strict_types = 1 );

class EjemplosTypeHints
{
    // Tipos Escalares (PHP 7.0+)
    public function sumar(int $a, float $b): float {
        return $a + $b;
    }

    // Tipos Compuestos (PHP 7.0+)
    public function procesarDatos(array $datos, callable $callback): void {
        // 1- Hacer algo con los datos...
        // 2- Llamar al callback
        $callback($datos);
        // 3- No devolvemos un valor específico
    }

    // Nullable Types (PHP 7.1+)
    public function obtenerResultado(): ?string {
        // ...
    }

    // Tipos de Objetos (PHP 7.2+)
    public function imprimirNombre(Usuario $usuario): void {
        echo $usuario->getNombre();
    }

    // Union Types (PHP 8.0+)
    public function procesarDato(int|string $dato): void {
        // ...
    }

    // Mixed (PHP 8.0+)
    public function procesarDatoMixed(mixed $dato): void {
        // ...
    }
}

// Ejecución de los ejemplos
$ejemplos = new EjemplosTypeHints();

// Tipos Escalares
$resultadoSuma = $ejemplos->sumar(5, 10);
echo "Resultado de la suma: $resultadoSuma\n";

// Tipos Compuestos
$datos = [1, 2, 3];
$callback = function ($valor) { echo 'el valor es: '.$valor; };
$ejemplos->procesarDatos($datos, $callback);

// Tipos de Objetos
$usuario = new Usuario("John Doe");
$ejemplos->imprimirNombre($usuario);

// Nullable Types
$resultadoNullable = $ejemplos->obtenerResultado();
echo "Resultado Nullable: $resultadoNullable\n";

// Union Types
$ejemplos->procesarDato(42);
$ejemplos->procesarDato("Hola");

// Mixed
$ejemplos->procesarDatoMixed(123);
$ejemplos->procesarDatoMixed("Cadena");

// Definición de la clase Usuario para los ejemplos
class Usuario
{
    private $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
}