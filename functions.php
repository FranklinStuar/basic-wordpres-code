<?php if (!defined('ABSPATH')) exit; ?>

<?php

/**
 * Functions.php es el archivo que va a servir como archivo base para la carga de información del tema
 * - La lógica utilizada que se realiza para wordpress como para el propio php, se encuentran en la carpeta INCLUDES
 * - Si se necesita agregar variables globales o funciones que serán reutilizadas en el resto del proyecto,
 *   se recomienda agregarlas aquí (inportado desde un archivo dentro de includes)
 * 
 */


// importa los assets que se utilizarán en el proyecto, css, js y diferente librerias 
include_once get_theme_file_path( 'includes/scripts.php' );