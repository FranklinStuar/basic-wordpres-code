# TEMPLATE-PARTS

Utilizar esta carpeta para extraer código que se pueda reutilizar en diferentes páginas o para directamente separar las secciones de una página para tener un código más entendible

La estructura del nombre será `content-{name}.php` para indicar el tipo de archivo con el que se está trabajando. 

Se puede utilizar también *component-{name}.php* o si se está trabajando con contenido de prueba *test-{name}.php*

Para llamar los archivos seguir la siguiente estructura de código

```html
  <?php get_template_part("template-parts/content", "navbar") ?>
```

Si el archivo está en una carpeta 

```html
  <?php get_template_part("template-parts/landing/content", "banner") ?>
```