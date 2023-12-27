<?php

trait DateHelper
{
    public function formatDate($date, $format = 'd/m/Y')
    {
        return date($format, strtotime($date));
    }

    public function calculateAge($birthDate)
    {
        $today = new DateTime();
        $birthdate = new DateTime($birthDate);
        $age = $today->diff($birthdate);
        return $age->y;
    }
}

class ClaseNinja
{
    use DateHelper;

    public function metodoNinja()
    {
        $birthDate = '1990-05-15';
        $formattedDate = $this->formatDate($birthDate, 'd F Y');
        $age = $this->calculateAge($birthDate);

        echo "Fecha formateada: $formattedDate\n";
        echo "Edad: $age años\n";
    }
}

$ninja = new ClaseNinja();
$ninja->metodoNinja();
