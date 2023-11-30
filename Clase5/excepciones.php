<?php

function dividir ($n1, $n2) {
    if ($n2 == 0) {
        throw new Exception(" Soy un error de codigo ");
    }
    return $n1 / $n2;
}


echo dividir(5, 10);

/*
try {
    $resultado = dividir(10, 0);
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    echo "esto lo ejecutamos de todas formas";
}
*/