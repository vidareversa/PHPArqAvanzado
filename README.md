# Material Didáctico — 11 Clases de PHP para estudiar Arquitectura de Software con Base en PHP

POO basico, Principios SOLID, hasta arquitectura de una API en el modelo de Madurez de Richardson  

## **Descripción General**
- **Qué es:** Colección de ejemplos y ejercicios en PHP organizados en 11 carpetas (`Clase1`…`Clase11`) para enseñar conceptos de programación orientada a objetos, patrones, PSR, autoloaders, APIs REST, colas, pruebas y programación dirigida por eventos.
- **Objetivo:** servir como material práctico de consulta y laboratorio para aprender conceptos y técnicas comunes en aplicaciones PHP.

## **Resumen de las 11 clases**

| Clase | Propósito principal | Métodos / símbolos clave |
|---|---|---|
| Clase1 | Fundamentos OOP (ejemplos simples, encapsulamiento, polimorfismo) | `Animal::saludar()`, `CajaDeJuguetes::__construct()`, `CajaDeJuguetes::agregarJuguete()`, `CajaDeJuguetes::obtenerJuguetes()`, `Perro::hacerSonido()` |
| Clase2 | Relaciones entre objetos (agregación, composición, asociación) | `Rueda::__construct()`, `Rueda::getPosicion()`, `Automovil::agregarRueda()`, `Automovil::obtenerRuedas()` |
| Clase3 | Middleware y router simples, pipeline de peticiones | `RouterMiddleware::route()`, `AuthController::login()`, `AuthController::registro()`, `InicioPage::mostrar()` |
| Clase4 | Utilidades y colecciones (encadenamiento de métodos) | `Collection::from()`, `Collection::where()` (encadenable) |
| Clase5 | Manejo de excepciones y ejemplos con PDO / ActiveRecord | `dividir()` (lanza/excepciones), ejemplos en `PDO/` (conexión, consultas, manejo de errores) |
| Clase6 | Estándares PSR, namespacing, autoload y ejemplos avanzados | `MiClase::__construct()`, `MiClase::getMiPropiedad()`, ejemplo de `autoload` y estructura PSR-4 |
| Clase7 | Autorización y validación de tokens (ejemplo de header Authorization) | `validateUser($token)`, flujo en `Authorization/index.php` que valida el header `authorization` |
| Clase8 | APIs REST y ejemplo de endpoints (JSON), API Gateway y final app | Endpoint JSON `SimpsonsAPI` (devuelve `characters`), middleware y estructura `Final_C8` |
| Clase9 | Utilidades para APIs: logging, cache y controladores auxiliares | `logRequestResponse($request, $response, $esCacheResponse)` (registro en `Clase9/api/logs/`) |
| Clase10 | Traits, anotaciones, autoload PSR-4, colas y tests (PHPUnit) | `trait Saludador { saludar(), formatearFecha() }`, ejemplos en `traits/` y `phpunit/` |
| Clase11 | Arquitecturas avanzadas: POE (eventos), Swagger, WAF, tickets, integración con Guzzle | `EventEmitter::on()`, `UserController::createUser()` (emite `user.created`), listeners `handleUserCreation()`, generación Swagger (`SwageameElCodigo.php`) |

## **Ejemplo de uso (integración simple)**

El siguiente ejemplo ilustra cómo combinar piezas representativas de varias clases para un flujo breve: crear objetos, agregarlos a una colección, emitir un evento y registrar la acción.

```php
<?php
// Autoload del proyecto (si usa composer PSR-4)
require_once __DIR__ . '/Clase6/autocargaPSR4/index.php';
require_once __DIR__ . '/Clase4/Collection.php';
require_once __DIR__ . '/Clase2/Agregacion.php';
require_once __DIR__ . '/Clase1/Ejemplo1.php';
require_once __DIR__ . '/Clase9/api/LogController.php';
require_once __DIR__ . '/Clase11/POE/Emitter/EventEmitter.php';
require_once __DIR__ . '/Clase11/POE/Controllers/UserController.php';
require_once __DIR__ . '/Clase11/POE/Listeners/LogListener.php';

// 1) Crear y usar un objeto sencillo (Clase1)
$animal = new Animal();
$animal->nombre = 'Socrates';
echo $animal->saludar() . "\n"; // Hola, soy un animal llamado Socrates

// 2) Construir un Automovil con ruedas (Clase2)
$auto = new Automovil('MiModelo');
$auto->agregarRueda(new Rueda('delantera-izq'));
$auto->agregarRueda(new Rueda('delantera-der'));

// 3) Crear una colección y filtrar (Clase4)
$data = [
    ['id' => 1, 'name' => 'Alice', 'age' => 30],
    ['id' => 2, 'name' => 'Bob', 'age' => 25],
];
$collection = Collection::from($data);
$filtered = $collection->where('age', '>=', 30);

// Mostrar resultado filtrado
foreach ($filtered as $item) {
    print_r($item);
}

// 4) Publicar un evento de usuario y registrar la acción (Clase11 + Clase9)
$emitter = new EventEmitter();
$logListener = new LogListener();
$emitter->on('user.created', [$logListener, 'handleUserCreation']);

$userController = new UserController($emitter);
$userData = ['username' => 'maxpower', 'email' => 'max@example.com'];
$response = $userController->createUser($userData);

// Registrar petición/respuesta (Clase9)
logRequestResponse(['user' => $userData], ['response' => $response]);

echo "Flujo completado.\n";
```

Notas:
- Los `require_once` del ejemplo asumen paths relativos y/o un `autoload` configurado; ajusta según tu entorno.
- Algunas clases de las carpetas `Final_*`, `vendor/` o submódulos muestran implementaciones más completas (inspecciona esas carpetas para ejemplos de apps completas).

## **Siguientes pasos sugeridos**
- Ejecutar un `composer install` en los sub-proyectos que usan `composer` (p. ej. `Clase6/autocargaPSR4`, `Clase11/swagger`) para habilitar autoload y dependencias.
- Crear un script de integración de pruebas que valide los flujos principales (crear usuario, emitir eventos, registro, endpoints REST).

