# API Portal B.I.

### Función de la API
_(Pendiente)_

### Características del proyecto.

+ **Lenguaje**: PHP (PHP >= 5.6.4) 
+ **Framework**: [Laravel 5.4](https://laravel.com/docs/5.4)
+ **Desarrollador principal**: [Felipe Burgos](mailto:fburgos@dimerclabs.com) 😉

### Cambios al momento de implementar a poducción
#### 1.- Cambiar Valores en archivos
| Nombre de archivo     | Etiqueta            | Valor antiguo | Valor nuevo | 
| ------------          |:-------------------:| ----------:   | ----------: |
| `.env`                | `DATABASE_ENV`      | ~~dev~~       | **prod**    |
| `.env`                | `USE_OCI8`          | ~~false~~     | **true**    |
| `config/database.php` | `username` (_`mysqlmagento`_, _`mysqlmagento_dimerc`_, _`mysqlmagento_controlregistros`_) | ~~fburgos~~ | **dimerc_api** |
| `config/database.php` | `password` (_`mysqlmagento`_, _`mysqlmagento_dimerc`_, _`mysqlmagento_controlregistros`_)</small> | [~~_Password antigua_~~] | [**_Password nueva_**] |


#### 2.- Dar permisos especiales a carpetas.
> NOTA: _El sistema de igual manera funcionará sin hacer estos pasos, pero cuando hallan errorers o excepciones, no podrán ser visualizadas en su totalidad._

+ **storage**: `chmod -R 777 storage/*`
+ **bootstrap**: `chmod -R 777 bootstrap/*`

 
---
###Sistemas Dimerc Labs...
 
![alt text][logo_dimerclabs]

[logo_dimerclabs]: http://www.dimerclabs.com/img/logo_white.png "Dimerc Labs"
