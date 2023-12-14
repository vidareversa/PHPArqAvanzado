<?php

function getVersionedUrl($filePath)
{
    //$version = filemtime($filePath); // Obtener la marca de tiempo de la última modificación
    $version = '2022-12-15';
    $url = $filePath . '?v=' . $version; // Agregar la marca de tiempo a la URL
    return $url;
}
?>

<!-- Ejemplo de uso en HTML -->
<link rel="stylesheet" href="<?php echo getVersionedUrl('styles.css'); ?>" />
<script src="<?php echo getVersionedUrl('script.js'); ?>"></script>
<img src="<?php echo getVersionedUrl('image.jpg'); ?>" alt="Image" />