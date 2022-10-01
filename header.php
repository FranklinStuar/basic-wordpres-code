<?php if (!defined('ABSPATH')) { exit; } ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo("charset") ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <?php /* ayuda a que se conecte a un cdn para cargar las fuentes más rápidamente*/ ?>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <?php wp_head() ?>
</head>


<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  