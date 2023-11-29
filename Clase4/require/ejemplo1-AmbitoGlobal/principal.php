<?php

require_once 'functions.php';

//esto deberia funcionar
echo sumar(10, 15);

//esto ddeberia dar error
echo $function['sumar'](10, 15);