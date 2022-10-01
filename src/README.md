
## INICIAR PROYECTO CLONADO

El proyecto se está subiendo sin la carpeta node_modules, para ello se debe iniciar el proyecto y en las pruebas realizadas trabaja correctamente. Este código debe ser ejecutado dentro de la carpeta **/src** dentro del proyecto (dentro del tema)

```sh
npm install
```

## TAILWIND

Ejecutar el siguiente código como una contracción del texto de compilación, es el equivalente a: `npx tailwindcss -i ./css/tailwind.css -o ./../assets/css/tailwind.css -w`

```sh
npm run tw:build
```

Si se desea minificar el css, utilizar el siguiente código es equivalente a `npx tailwindcss -i ./css/tailwind.css -o ./../assets/css/tailwind.css --minify` A diferencia del código anterior, este código no se queda escuchando, si se quiere que se mantenga escuchando los cambios, agregar -w en esa parte dentro `package.json` 

```sh
npm run tw:minify
```

Para el desarrollo con pug, se tiene el siguiente código

```sh
npm run tw:test-pug
```

### Pug 

Utilizado para maquetar el proyecto, se utilizará para hacer códigos pequeños como calendario, menu, popup personalizado u otros componentes que no se puedan realizar directamente con tailwind.

Usado principalmente por Franklin para la realización de códigos repetitivos que necesitan tener contenido de prueba

### Sass

La estructura de sass será una de las más complejas en su uso. ya que se va a trabajar con tailwind, su uso será poco. Aún así, el uso principal será dado al header y footer

La estructura de las capertas será de la siguiente manera
- *style.scss*: tendrá el código importando desde los componentes sass
- *globals.scss*: tendrá variables, mixins y funciones sass para ser usadas en todo el proyecto. Si el código sass aumenta (no se debería extender ya que se usa tailwind) agregar los componentes dentro de /components incluyendo el archivo de globales
- *_{nombre-compoente}.scss*: Agregar el nombre del componente con sus diversas versiones de pantalla, mantener el menor código posible para un mejor entendimiento


### Codigos para compilar SASS

**SASS - CSS** se compila desde **/src** a **/assets**

- compilación directa desde la carpeta src

```sh
sass sass/style.scss ./../assets/css/style.css
```

- compilación y que siempre esté escuchando nuevos cambios en código

```sh
sass sass/style.scss:./../assets/css/style.css -w
```

- compilación para que siempre esté escuchando y que al mismo tiempo minimice el código

```sh
sass sass/style.scss:./../assets/css/style.css -w --style compressed
```

- compilación para que siempre esté escuchando, que minimice el código y no genere el link map

```sh
sass sass/style.scss:./../assets/css/style.css -w --sourcemap=none --style compressed
```

- En caso de no poder compilar el source-map, ejecutar el siguiente código por una vez, esto puede ser causado por la carpeta .sass-cache y hay que actualizar el compilador
```sh
sass sass/style.scss:./../assets/css/style.css --update --force --sourcemap=none
```

Más informaciín https://sass-lang.com/documentation/cli/dart-sass



### CSS & Tailwind

Tanto para tailwind como para css usar metodología BEM paar los componentes. Usar componentes de un solo heredado para mantener una organización más adecuada. Si se cree que el componente será utilizado en otros lados, separa el componente como uno nuevo y usar clases de la clase principal para pequeñas variaciones

- Ejemplo con BEM de un solo heredado, la clase principal es card: 
-- `card` -> `card__body` | `card__head` | `card__title` | `card__ description` | `card__button`
- Ejemplo BEM con variantes. Se copia el nombre de la clase y se indica en lo que varía 
-- `.card-card--red` -> `.card__head.card__head--background-red` | `.card__head.card__head--red` (text color)
- Ejemplo BEM para variantes que modifican otro componente. En el ejemplo tengo un componente de botón e indico que pertenece a la variante primary. Al usar card__button, significa que voy a utilizar una configuración adicional, puede ser algún tipo de transición o algo que modifique la configuración que viene desde btn.
-- `.card` -> `card__button.btn.btn--primary`

En sass se utilizaría de la siguiente manera 

Se tendrá la clase principal como referencia para el resto del código. las variantes p

```css
.card {
  &__head{
    ... codigo
  }
}
```

Cuando haya una variante, preferiblemente separar las variaciones en otro grupo para poder visualizar de mejor manera el código utilizado

```css
.card__head {
  &--red{
    color:red
  }
  &--background-red{
    background:red
  } 
}
```

Cuando se tiene código que va a reemplazar configuración de otro componente, extender más las clases para que la configuración que se hace sea más relevante. Ejemplo al usar btn

```css
.card{
  & &__button{ /* resultado css: .card .card__button  */
    width: 20%
  }
  & &__body &__button{ /* resultado css: .card .card__body .card__button  */
    width: 20%
  }
}
```

