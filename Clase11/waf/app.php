<?php

require_once 'Waf.php';

// Uso de la clase Waf
$appUrl = 'http://localhost/EducacionIt/Clase11/waf/app.php';
$waf = new Waf($appUrl);
$filteredInput = $waf->applyWAF();

var_dump($filteredInput);