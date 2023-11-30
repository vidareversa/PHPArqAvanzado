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

class Producto
{
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;

    public $isNew;

    public function __construct()
    {
        $this->isNew = true;
    }

    public function findById($id)
    {
        $pdo = new PdoDataSource();
        $result = $pdo->query('SELECT * FROM productos WHERE id = '.$id);
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
        $pdo = new PdoDataSource();
        $output = [];
        $result = $pdo->query('SELECT * FROM productos WHERE '.$field.' '.$operator.' '.$value);
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

    public function save()
    {
        $pdo = new PdoDataSource();
        $sql = $this->isNew ? 
        "INSERT INTO productos (nombre, descripcion, precio) VALUES (:nombre, :descripcion, :precio)" :
        "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $query->bindValue(':descripcion', $this->descripcion, PDO::PARAM_STR);
        $query->bindValue(':precio', $this->precio, PDO::PARAM_INT);

        if($this->isNew) {
            $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        }

        return $query->execute();
    }

    public function delete()
    {
        $pdo = new PdoDataSource();
        $sql = "DELETE productos WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $query->execute();
    }
}