<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php get_header() ?>

<?php if (have_posts()):?>
  <?php while (have_posts()): the_post();?>
    <main>
      <h1>
        <?php the_title() /** inprime un texto que se podrá agregar a un tag h1 o el que se le deba asignar */ ?>
      </h1>
      <?php the_content() /** imprime el contenido dentro sin un tag contenedor, la mayoría del contenido viene en tags <p> */ ?>
    </main>
  <?php endwhile?>
<?php else:?>
  <main class="w-2/3 m-auto">
    <h1 class="text-secondary text-lg">NOT CONTENT</h1>
    <span class="text-primary">Don't can found content for this page</span>
  </main>
<?php endif?>

<?php get_footer() ?>
