# Bitcoin
Aplicacion en Laravel9 para obtener el valor del Bitcoin en dolares o pesos chilenos, que son guardados en una base de datos PostgreSQL.

# Definir credenciales base de datos
En la raiz del proyecto, editar los siguientes campos con los datos de tu base de datos del archivo .env

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=bitcoin
DB_USERNAME=usuario
DB_PASSWORD=password

# Migración base de datos
Ejecutar el siguiente comando para ejecutar la migración del modelo hacia la base de datos

php artisan migrate -> Creará la tabla 

# Ejecutar el sistema
Ejecuta el siguiente comando para levantar el sistema

php artisan serve
