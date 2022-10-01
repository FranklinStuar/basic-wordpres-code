# INCLUDES

La carpeta de inclues es para organizar el código que va en _/functions.php_ 

## Estructura recomendada para archivos

Para tener un mejor orden de los archivos, se recomienda la siguiente estructura:

`{name}.php` Servirá para indicar de lo que trata el contenido interno
`/cpt/{name}.php` Cuando se esté creando Custom Post Type mediante Código, agregarlo en una carpeta separada cada CPT y darle el nombre que tendrá como url
`/acf/{name}.php` Para ACF (Advance Custom Field) separar en una carpeta por separado con el nombre de cada Custom Field

Código adicional que se irá dando, es la codificación de Shortcodes. Para poder distinguirlos, se seguirá la estructura que se utiliza en _template-parts_ de poner primero lo que hace el arhivo: 

```
shortcode-{name}.php

# si hay varios shortcodes agregarlos dentro de carpeta
/shortcodes/{name}.php
```

## Agregar includes a functions.php

Los archivos que se encuentras en la carpeta de includes, se deben agregar en el archivo de _/functions.php_ Para ello, utilizar la siguiente estructura

```php
// para archivos directos como scripts
include_once get_theme_file_path( 'includes/{name-file}.php' );

// para archivos que están organizados dentro de carpetas. cpt, acf, shortcodes, etc
include_once get_theme_file_path( 'includes/{name-folder}/{name-file}.php' );
```

