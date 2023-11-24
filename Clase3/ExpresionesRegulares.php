<?php

/**
 * 3 clases que muestran ejemplos de expresiones regulares 
 */

class ValidadorContrasenia {
    /*
        $expresion_regular (patron):
        - Contienen solo caracteres alfanuméricos (letras mayúsculas y minúsculas, así como dígitos).
        - Tienen una longitud total de 8 caracteres.

        Si:
        - "AbCdEfG1"
        - "12345678"
        - "aBcDeFgH"
        
        No:
        - "abc123" (longitud menor a 8)
        - "ABC!12345" (contiene un carácter no alfanumérico)
        - "abcdefghi" (longitud mayor a 8)
    */
    private $expresion_regular = '/^[a-zA-Z0-9]{8}$/'; //8 Caracteres alfanumericos
    
    public function validar($contraseña) {
        return preg_match($this->expresion_regular, $contraseña);
    }
}

class FiltroURL {
    /*  $expresion_regular (patron):
        - Comienzan con la palabra "producto".
        - Seguido por uno o más dígitos.
        
        Si:
        - "producto123"
        - "producto9999"
        
        No:
        - "producto" (falta el número)
        - "productos123" (la palabra no es exactamente "producto")
        - "123producto" (la palabra "producto" no está al principio)
     */
    private $expresion_regular = '/^producto(\d+)$/';
    public function filtrar($url) {
        if (preg_match($this->expresion_regular, $url, $matches)) {
            return "URL válida. Número: " . $matches[1];
        } else {
            return "La URL no cumple con los requisitos";
        }
    }
}

class RenderizadorPlantillas {
    /*
        Ejemplo de cadena que coincidiría: {{nombre}}
        
        {{: Coincide con la apertura.
        nombre: Coincide con cualquier contenido.
        }}: Coincide con el cierre.
    */
    private $expresion_regular = '/\{\{([^}]+)\}\}/';
    
    public function renderizar($plantilla, $reemplazos) {

        $data = preg_replace_callback($this->expresion_regular, function($matches) use ($reemplazos) {
            $clave = $matches[1];
            return $reemplazos[$clave] ?? $matches[0];
        }, $plantilla);

        return $data;
    }
}


//--------------------------------//
//Contraseña 
echo '<hr/> Contraseñas: ';
$validador_contrasenia = new ValidadorContrasenia();
$contrasenia = "abc12345";

if ($validador_contrasenia->validar($contrasenia)) {
    echo "Contraseña válida";
} else {
    echo "La contraseña no cumple con los requisitos";
}

//--------------------------------//
//Filtro de URL
echo '<hr/> Filtros: ';
$filtro_url = new FiltroURL();
$url = "producto123";
echo $filtro_url->filtrar($url);

//--------------------------------//
//Renderizado de plantillas//
echo '<hr/> Renderizado: ';
$renderizador_plantillas = new RenderizadorPlantillas();

$plantilla = "Hola , {{nombre}}, <b> ¿Como estas? </b> Saraza: {{edad}}";
$reemplazos = array('nombre' => 'Juan', 'edad' => '33');

echo $renderizador_plantillas->renderizar($plantilla, $reemplazos);