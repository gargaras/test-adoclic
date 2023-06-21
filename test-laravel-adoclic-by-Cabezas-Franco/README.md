<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Guia para levantar el pryecto

1-Clona el proyecto desde el repositorio Git o descomprime el archivo ZIP si lo tienes.

2-Abre una terminal y navega hasta el directorio del proyecto.

3-Ejecuta el comando composer install para instalar todas las dependencias de Laravel.

4-Crea un archivo .env en la raíz del proyecto. Puedes copiar el archivo .env.example y renombrarlo como .env. Asegúrate de configurar correctamente la conexión a la base de datos MySQL en el archivo .env, proporcionando los detalles de tu base de datos (nombre, usuario, contraseña, etc.).

5-Genera una nueva clave de aplicación ejecutando el comando php artisan key:generate. Esto establecerá la clave de cifrado utilizada por Laravel.

6-Ejecuta las migraciones para crear las tablas en la base de datos con el comando php artisan migrate. Asegúrate de que la conexión a la base de datos esté correctamente configurada en el archivo .env.

7-Ejecuta los seeders para poblar la tabla de categorías con los registros iniciales con el comando php artisan db:seed.

8-Ahora, puedes ejecutar el proyecto de Laravel ejecutando el comando php artisan serve. Esto iniciará el servidor de desarrollo de Laravel y podrás acceder a tu aplicación a través de la URL que se mostrará en la terminal (por defecto, http://127.0.0.1:8000).

9-Puedes acceder a la API en la ruta {SITE_URL}/api/{category}. Por ejemplo, si estás ejecutando la aplicación localmente, puedes acceder a la categoría "Security" en http://127.0.0.1:8000/api/Security.