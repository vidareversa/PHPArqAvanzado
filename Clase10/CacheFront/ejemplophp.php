<?php

//Versionador dinamico de recursos front con PHP
function getVersionedUrl($filePath)
{
    $version = filemtime($filePath); // Obtener la marca de tiempo de la última modificación
    //$version = '19-12-2023-20:24';
    $url = $filePath . '?v=' . $version; // Agregar la marca de tiempo a la URL
    return $url;
}
?>


<link rel="stylesheet" href="<?php echo getVersionedUrl('styles.css'); ?>" />
<script src="<?php echo getVersionedUrl('script.js'); ?>"></script>
<img src="<?php echo getVersionedUrl('image.jpg'); ?>" alt="Image" />