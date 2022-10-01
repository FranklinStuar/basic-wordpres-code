<?php if (!defined('ABSPATH')) exit; ?>

<?php

/** agrega los assets (scripts) en wordpress */
add_action("wp_enqueue_scripts", "pgo_assets", 0);

function pgo_assets()
{
  // importa librerias dentro del proyecto como fuera del mismo. Cuando se importa desde otro lado es porque el enlace se rompe al descargarlo
  wp_enqueue_style("font-awesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css?ver=5.9.1", array(), "5.9.1", "all");

  // archivos css dentro de assets, se llama primero a tailwind debido al reseteo del css
  wp_enqueue_style("tailwind", get_stylesheet_directory_uri() . "/assets/css/tailwind.css", array(), false, "all");
  wp_enqueue_style("styles", get_stylesheet_directory_uri() . "/assets/css/style.css", array(), false, "all");
  
  // archivos js dentro de assets
  wp_enqueue_script("script.js", get_stylesheet_directory_uri() . "/assets/js/script.js", array(), false, true);
  
}

