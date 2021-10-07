<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Prueba desarrollo Laravel [SEREMPRE](https://www.serempre.com/)
- Instalar las dependencias con composer install
- Ejecutar el comando php artisan migrate:fresh
- Ejecutar el comando php artisan db:seed
- En en .env escribir QUEUE_CONNECTION=database para las colas a la hora de exportar e importar
- Loguearse en el sistema con las credencias correo: admin@admin.com contraseña: password
- Pobra acceder a parte de administracion voyager y al sistema normal donde se encuentras los cruds y las exportaciones
- Para la parte del api se utilizo el paquete laravel passport basado en JWT, debe incluir el token que se le genera en el login Bearer token.....
- php artisan queue:work database --queue="email" Ejecutar colas de email
- php artisan queue:work database --queue="excel" Ejecutar colas de exportacion excel
- php artisan queue:work database Ejecutar colas de importacion
