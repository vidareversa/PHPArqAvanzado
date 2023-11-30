<?php

class Producto {
  public $id;
  public $nombre;
  public $precio;
}

interface IDataSource {
  public function selectAll($tabla);
}

class MySqlDataSource implements IDataSource {

  private $pdo;

  public function __construct() {
    $this->pdo = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');
  }

  public function selectAll($tabla) {
    $sql = 'SELECT * FROM '.$tabla;
    $query = $this->pdo->query($sql);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
}

class MockDataSource implements IDataSource {
  private $mock;

  public function __construct() {
    $this->mock = [
      'productos' => [
        [ 'id' => 1, 'nombre' => 'Celular', 'precio' => 1200 ],
        [ 'id' => 2, 'nombre' => 'Teclado', 'precio' => 1300 ],
        [ 'id' => 3, 'nombre' => 'Mouse', 'precio' => 1000 ],
      ]
    ];
  }

  public function selectAll($tabla) {
    return $this->mock['productos'];
  }
}

class ProductoAdapter {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function selectAll() {
    $data = $this->db->selectAll('productos');
    $output = [];
    foreach ($data as $row) {
      $aux = new Producto();
      $aux->id = $row['id'];
      $aux->nombre = $row['nombre'];
      $aux->precio = $row['precio'];
      array_push($output, $aux);
    }
    return $output;
  }
}

/// Usando la aplicación ///

//$dbSource = new MySqlDataSource();
$testDbSource = new MockDataSource();

// Lo interesante de esta forma de programar es que el código es independiente del 
// motor de base de datos en cuestión. 
// Podríamos reemplazar el data source tranquilamente
// por motivos de prueba. 
// Lo único necesario será que el nuevo data source implemente
// la interfaz IDataSource
$productos = new ProductoAdapter($testDbSource);

var_dump($productos->selectAll());