<?php

class PdoDataSource {

    private $conn;

    public function __construct()
    {
        $this->conn = new PDO(
            'mysql:host=localhost;dbname=base',
            'root',
            ''
        );
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function exec($sql)
    {
        return $this->conn->exec($sql);
    }

    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }

}

/**
 * La clave del uso de Repository está en separar la estructura de datos
 * de su persistencia. De esta forma, podemos tener diferentes formas de almacenar
 * productos sin tener que cambiar la clase Producto
 */
class Producto
{
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
}

class ProductoRepository
{
    private $dataSource;

    public function __construct($dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function findById($id)
    {
        $result = $this->dataSource->query('SELECT * FROM productos WHERE id = '.$id);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        $obj = new Producto();
        $obj->id = $data['id'];
        $obj->nombre = $data['nombre'];
        $obj->descripcion = $data['descripcion'];
        $obj->precio = $data['precio'];
        $obj->isNew = false;
        return $obj;
    }

    public function find($field, $operator, $value)
    {
        $output = [];
        $result = $this->dataSource->query('SELECT * FROM productos WHERE '.$field.' '.$operator.' '.$value);
        while($obj = $result->fetch(PDO::FETCH_ASSOC)) 
        {        
            $obj = new Producto();
            $obj->id = $data['id'];
            $obj->nombre = $data['nombre'];
            $obj->descripcion = $data['descripcion'];
            $obj->precio = $data['precio'];
            $obj->isNew = false;
            array_push($output, $obj);
        }
        return $output;
    }

    public function create($producto)
    {
        $sql = "INSERT INTO productos (nombre, descripcion, precio) VALUES (:nombre, :descripcion, :precio)";

        $query = $this->dataSource->prepare($sql);

        $query->bindValue(':nombre', $producto->nombre, PDO::PARAM_STR);
        $query->bindValue(':descripcion', $producto->descripcion, PDO::PARAM_STR);
        $query->bindValue(':precio', $producto->precio, PDO::PARAM_INT);

        return $query->execute();
    }

    public function update($producto)
    {
        $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id";

        $query = $this->dataSource->prepare($sql);

        $query->bindValue(':nombre', $producto->nombre, PDO::PARAM_STR);
        $query->bindValue(':descripcion', $producto->descripcion, PDO::PARAM_STR);
        $query->bindValue(':precio', $producto->precio, PDO::PARAM_INT);
        $query->bindValue(':id', $producto->id, PDO::PARAM_INT);

        return $query->execute();
    }

    public function delete($producto)
    {
        $sql = "DELETE productos WHERE id = :id";
        $query =$this->dataSource->prepare($sql);
        $query->bindValue(':id', $producto->id, PDO::PARAM_INT);
        return $query->execute();
    }
}