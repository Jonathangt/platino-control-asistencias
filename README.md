# Platino Control de Asistencias
Tecnologias usadas
- Laravel +8
- VueJS +2
- MariaDB

## Features
- Registro de usuarios por medio de nombre, y código de usuario.
- Inicio de sesión de usuario registrado por medio del código de usuario.
- Registro de hora de entrada, hora de almuerzo inicio, hora de almuerzo regreso, hora de salida.
- Visualización del reporte de todos los usuarios que han marcado su control de asistencia
- 
## Restricciones
- El usuario no podrá marcar dos veces el tipo de control de asistencia.

## Requerimientos Software
Descargar [Composer](https://getcomposer.org/).
Descargar [Node.js](https://nodejs.org/es/) +14.16
Descargar requiere [XAMPP ](https://www.apachefriends.org/es/index.html) +7.3.

Instalar dependencias

```sh
composer install
npm i or npm install 
```

Editar el archivo .env y asignar nombre a la base de datos
```sh
DB_DATABASE=platino_asistencias
```

Ejecutar las migraciones de las tablas y seeder para los registros de base de datos
```sh
php artisan migrate
php artisan db:seed
```

Ejecutar el proyecto 
```sh
php artisan serve
```

Verifique la implementación del sistema en su navegador
```sh
127.0.0.1:8000
```

Usuarios de prueba
```sh
Código Empleado: 4685
Password: 12345678
```

```sh
Código Empleado: 7358
Password: 12345678
```


## License

MIT

**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [dill]: <https://github.com/joemccann/dillinger>
   [git-repo-url]: <https://github.com/joemccann/dillinger.git>
   [john gruber]: <http://daringfireball.net>
   [df1]: <http://daringfireball.net/projects/markdown/>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [Ace Editor]: <http://ace.ajax.org>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [@tjholowaychuk]: <http://twitter.com/tjholowaychuk>
   [express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]: <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
   [PlMe]: <https://github.com/joemccann/dillinger/tree/master/plugins/medium/README.md>
   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>
