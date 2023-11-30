<?php
$drivers = PDO::getAvailableDrivers();
print_r($drivers);