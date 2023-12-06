<?php namespace MiEmpresa;

class MiClase 
{

private $miPropiedad;

public function __construct($miParametro)
{$this->miPropiedad=$miParametro;}

public function getMiPropiedad() { return $this->miPropiedad;}

public function setMiPropiedad($nuevoValor) { $this->miPropiedad=$nuevoValor; }

public function miMetodo()
{ if($this->miPropiedad===self::MI_CONSTANTE){return 'Es igual a la constante.';}else{return 'No es igual a la constante.';}
}
}

$instancia=new MiClase('valor-inicial');
echo $instancia->miMetodo();