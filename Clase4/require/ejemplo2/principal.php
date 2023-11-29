<?php

$function = require_once 'functions.php';

//esto da error
echo sumar(10, 15);

//esto deberia funcionar
echo $function['sumar'](10, 15);