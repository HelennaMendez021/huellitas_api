<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center">Huellitas API - Backend para Veterinaria</h1> 
API desarrollada en Laravel que ofrece un backend robusto y seguro para la gestión integral de la veterinaria Huellitas. Esta API expone endpoints para manejar autenticación, gestión de citas y usuarios, todo a través de una arquitectura de servicios limpia y escalable.
Escalable a:

- Carrito de ventas

- Login público para servicio a clientes

<h2 align="center">Características principales</h2>

- Backend completo: 
API RESTful desarrollada en Laravel que actúa como el backend para la aplicación de la veterinaria.

- Autenticación con Sanctum: Seguridad y manejo de tokens para autenticación de usuarios, con endpoints protegidos.

- Conexión a MySQL: La base de datos usada es MySQL, donde se almacena toda la información.


<h3 align="center">Arquitectura basada en servicios</h3>


- Controller: recibe la request, valida los datos y delega la lógica al servicio correspondiente.

- Service Provider: funciona como intermediario para inyectar servicios en los controladores mediante singletons, permitiendo escalabilidad y fácil mantenimiento.

- Servicio: contiene la lógica para ejecutar queries, procedimientos almacenados (SP), funciones escalares, etc., directamente en la base de datos. Solo retorna resultados o confirma ejecuciones exitosas.

- NO ORM: la lógica de negocio y consultas complejas están implementadas en la base de datos mediante procedimientos almacenados; el backend solo ejecuta llamados directos a la base, manteniendo el código backend limpio y enfocado en la validación y enrutamiento.
- Router de Laravel: Se usa el sistema de rutas nativo de Laravel para definir endpoints agrupados y organizados.
- Mensajería automatizada con Brevo (SMTP): Integración para envíos automáticos de emails, notificaciones y confirmaciones.
