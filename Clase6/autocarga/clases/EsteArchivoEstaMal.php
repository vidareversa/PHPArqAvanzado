<?php

// clases/EsteArchivoEstaMal.php

//Lo malo de esta clase, es que el nombre de archivo es diferente, 
//por ende el autoload no va a funcionar
class ClaseErrante {
    public function __construct() {
        echo "Instancia de ClaseErrante creada\n";
    }
}