# Prueba

## Instalación

- composer install
- npm install
- npm run dev (en caso de que falle volver a ejecutar)
- cp .env.example .env
- php artisan key:generate

## Base de Datos

- Crear base de datos con:
- charset => utf8
- collation => utf8_general_ci

## Mail

- el servicio de email para reseteo de contraseña esta configurado con Mailtrap, usted puede configurar el servicio que mas se adecue a sus necesidades.

## Observaciones

- Luego de crear la base de datos correr el comando **php artisan migrate --seed** estto es apra crear las tablas necesarias para el proyecto y precargar algunos datos importantes
- Las credenciales de administrador son **admin@admin.com** y **123456789**

