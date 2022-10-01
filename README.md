# TEMPLATE

Este es un template ejemplo que se realizó para futuros proyectos para la empresa en la que trabajo.

He decidido tomar como ejemplo este proyecto y hacerlo público para irlo mejorando según vaya avanzando

De momento, solo estoy trabajando a código puro y no estoy trabajando con react, lo iré agregando según vaya avanzando en mis conocimientos. 

En caso que alguien quiera aportar con el proyecto, puede hacerlo sin problema agregando en una nueva rama. 


## INICIAR PROYECTO CLONADO

El proyecto se está subiendo sin la carpeta node_modules, para ello se debe iniciar el proyecto y en las pruebas realizadas trabaja correctamente. Este código debe ser ejecutado dentro de la carpeta **/src** dentro del proyecto (dentro del tema)

```sh
npm install
```


## Estructura del proyecto

Se va a utiliza **Tailwin** para facilitar el desarrollo. La estructura de desarrollo se hará de la siguiente manera

- **functions.php:** Para una mejor organización de código, este archivo importará archivos dentro de includes
- **style.css:** para la configuración de wordpress como nombre del tema, versión y detalles adicionales de desarrollo
- **template-{name}.php:** para plantillas que se podrá usar sin necesidad de espedificar la página a la que pertenece, Conveniente para cuando se trabaja con diseños de prueba
- **front-page.php:** es para la página que va de home, se puede usar esta página como página fija o se puede usar un una plantilla
- **page-{name}.php:** noes ayudará a especificar que el diseño pertenece a una página en concreto. Conveniente para cuando se está seguro que una página no va a ser modificada. Si no se especifica un nombre, quedará como base para el resto de diseños
- **single-{name}.php:** nos sirve para los diseños para blog o las entredas de los Custom Post Type. Si se deja solo en single.php el diseño pertenecerá a todas las entradas de blog y de CPT
- **template-parts:** tiene los módulos o componentes php que serán reutilizados para pruebas y diseño final. 
-- Si una página tiene diversos módulos que no serán reutilizados, agregar dentro de una carpeta con el nombre de la página
-- Si el módulo se reutiliza en varios paginas, dejarlo directamente fuera
-- Utilizar la siguiente estructura **content-{name}.php** para identificar cada módulo o componente
- **includes:** tendrá lógica php que no se pueda agregar dentro de templates
-- Será usado principalmente para shorchodes, filtros, scripts y más lógica wordpress y php 
- **src:** la carpeta tendrá el código que servirá para el desarrollo del diseño, tendrá archivos html, sass, pug, tailwind 
-- tailwind será instalado aquí para que al momento de subir los archivos, se pueda excluir lo que no se necesita
-- dentro de la carpeta src se agregará automáticamente el código de node_modules 
- **assets** contiene el código generado de css y js, también tendrá una carpeta llamada vendor, esta carpeta contiene códgo que se descarga desde otro lado con la intención de asegurar que el código sea con el que se codificó. 
-- Adicional a lo mencionado anterior, también existirá la carpeta de imágenes que será utilizado en todo el proecto, se separaán las imágenes por carpetas indicando el tipo de imagen que se agrega

## Empaquetado del proyecto

El proyecto se subirá manualmente a wordpress empaquetando los archivos y las carpetas que son leídas por wordpress

```
- style.css
- background.png
- archivos php
- includes (carpeta)
- template-parts (carpeta)
- assets (carpeta)
```

El resto de archivos que sirvan para generar el código o que no estén relacionados directamente con la ejecución en wordpress, no se deberán empaquetar ya que se pretende tener solo lo necesario

**ACF - CPT**

*_Advance Custom Field_* - *_Custom Post Type_* 

Si se crearon archivos para los plugins de ACF o CPT, agregarlos en una carpeta separada y subirlas también a github, principalmente para hacer las pruebas correspondientes cuando se creen los proyectos. En un futuro, posiblemente se empiece a trabajar con ACF directamente en código.

Se puede trabajar con CPT directamente desde código si se desea, solo indicar dentro de documentación lo que se ha hecho. Los archivos de CPT agregarlos dentro de `/includes/cpt` 


## CSS & Tailwind

Habrá dos carpetas de css una dentro de **/src** que contendrá los códigos css de prueba para pug. El otro sitio de css será en **assets** con el código generado para ser usado en php. Leer más dentro de la documentación de **/src**


## Wordpress

A continuación un despliegue de la estructura de archivos dentro del proyecto

```
style.css 
functions.css
index.php
header.php
footer.php
tenmplate-{name}.php
page.php 
page-{name}.php
single.php
single-{name}.php
/includes
  scripts.php
  shorcode-banner.php #example
  shorcode-{name}.php
/template-parts
  content-navbar.php #example
  content-{name}.php
  /home #example
    content-banner.php #example
    content-cards.php #example
    content-icons.php #example
/src
  tailwind.config.js
  package.json
  package-lock.json
  /sass
  /pug
  /css
/assets
  /css
  /js
  /vendor
  /images
    /png
    /jpg
    /webp
    /svg
```


Para mantener un código más entendible, separar las secciones en archivos y agregarlos a la carpeta de **template-parts** o dento de una carpeta con el nombre de la página que se está realizando

* Ejemplo: para realizar la página home se tiene la sección banner que no será reutilizada en ningún otro lado, la estructura será

```
- template-parts
-- home
--- content-banner.php
```

* Ejemplo: para una sección que será utilizada por varias páginas. Sección de planes será agregado en el home y la página de planes con posibilidad de agregarlo en otra página

```
- template-parts
-- content-plans.php
```

Para llamar las secciones que se separadon utilizar 

```php
get_template_part("template-parts/content", "plans");
```

O en caso que esté dentro de una carpeta

```php
get_template_part("template-parts/home/content", "banner")
```

Utilizar "content" para indicar el tipo de archivo. Se puede utilizar también "component", "section". Lo importante es poder distinguir la información que estará dentro del archivo 

### Proteger archivos

Utilizar el sguiente código al inicio de cada archivo

```
<?php if (!defined('ABSPATH')) { exit; } ?>
```

### Estructura php y wordpress

El desarrollo de wordpress va a ser diferente que los proyectos de online y prep han sido hasta hace poco.

Dentro de los proyectos se van a hacer las validaciones del contenido y dentro agregar el contenido principal. Para ello vamos a utilizar el siguiente código.

Este código principalmente va a servir para cuando se liste el blog

``` 
<?php if (have_posts()):?>
  <?php while (have_posts()): the_post();?>
    ### contenido que se va a mostrar
  <?php endwhile?>
<?php else:?>
  ### contenido que se va a mostrar en caso que algo falle
<?php endif?>
```

Cuando se esté trabajando con ACF (advanc Custom Post Type), utilizar la siguiente estructura. La documentación se lo puede conseguir en: https://www.advancedcustomfields.com/resources/

```php
//imprime el contenido directamente
the_field("first_name")
// obtiene el contenido para imprimirlo o concatenar con lo que neesitemos
get_field("first_name")

// cuando tenemos un contenido dentro de un group o repeater, se puede usar también get
the_sub_field("first_name")

if ( have_rows( 'playlist' ) ) : 
  while ( have_rows( 'playlist' ) ) : the_row(); 
  // CONTENIDO
  endwhile 
endif 
```

Si se está usando repeaters o grupos, utilizar un loop como está en el siguiete código. Si se tiene grupos dentro de grupos, utilizar la misma sintaxis con un nuevo loop. Cada loop mantiene dentro subo el contenido como si fuera algo independiente y al cerrarse el loop se puede continuar con el loop anterior sin problemas
Más detalles se puede servisar learning kits dentro de paygarden prep

```php
if ( have_rows( 'playlist' ) ) : 
  while ( have_rows( 'playlist' ) ) : the_row(); 
    // CONTENIDO
    the_sub_field('name')
  endwhile 
endif 
```

### Codigo para idiomas

Se pretende que el proyecto tenga una actualización con traducción. De ser posible, que el contenido esté dentro de `<?php _e("Contenido aquí") ?>` debido a que esto ayuda a que el plugin de traducción entienda mejor el texto que se va a traducir.

De momento, no se han realizado las pruebas necesarias para las traducciones, por lo que se recomienda seguir esta práctica y cuando se encuentre una actualización del código, se irá agregando en la documentación la forma de hacerlo

