<?php

/**
 * Esta clase es muy simple y no hace mucho.
 * Pero utiliza una forma bastante útil para el encadenamiento
 * de métodos en una colección. La clase representa una colección,
 * y cada método de filtrado devuelve una nueva instancia, por lo que
 * los métodos se vuelven a poder usar y así encadenar.
 */
class Collection
{
    private $items = [];

    public function __construct($source = [])
    {
        $this->items = $source;
    }

    public static function from($items) {
        return new Collection($items);
    }

    public function where($key = '', $operator = '=', $value = '') {
        $filtered = [];

        foreach ($this->items as $k => $v) {
            foreach ($v as $k2 => $v2) {
                if ($k2 == $key) {
                    switch ($operator) {
                        default:
                        case '=':
                        case '==':  $v2 == $value ? $filtered[$k] = $v : false;break; 
                        case '!=':  
                        case '<>':  $v2 != $value ? $filtered[$k]  = $v : false;break;
                        case '<':   $v2 < $value ? $filtered[$k]   = $v : false;break;
                        case '>':   $v2 > $value ? $filtered[$k]   = $v : false;break;
                        case '<=':  $v2 <= $value ? $filtered[$k]  = $v : false;break;
                        case '>=':  $v2 >= $value ? $filtered[$k]  = $v : false;break;
                        case '===': $v2 === $value ? $filtered[$k] = $v : false;break;
                        case '!==': $v2 !== $value ? $filtered[$k] = $v : false;break;
                    }
                }
            }
        }

        return new Collection($filtered);
    }
}

// Ejemplo de uso
$sourceData = [
    ['id' => 1, 'name' => 'Alice', 'age' => 30],
    ['id' => 2, 'name' => 'Bob', 'age' => 25],
    ['id' => 3, 'name' => 'Charlie', 'age' => 35],
];

echo "<pre>";
print_r($sourceData);
echo '<hr/>';
$collection = Collection::from($sourceData);

// Filtrar la colección donde la edad es mayor o igual a 30
$result = $collection->where('age', '>=', 30)->where('id', '=', 3);

// Mostrar el resultado
print_r($result);