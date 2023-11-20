<?php

// SRP: La clase tiene una única responsabilidad, que es gestionar la persistencia de Productos.
class ProductRepository {
    public function save(Product $product) {
        // Lógica para guardar el producto en la base de datos.
    }
}


class Product {
    // Propiedades y lógica de la entidad Product.
    protected $id;
    protected $nombre;
    protected $precio;
    protected $sucursal;
}