<?php

namespace App\Services;

class ProductService
{
    public function getProducts()
    {
        return ['products' => ['Laptop', 'Phone']];
    }
}