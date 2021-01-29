# Título del Proyecto

Prueba Back-End para  SUPLOS.

## Comenzando 🚀

Este contender tiene el desarrollo de la prueba técnica que contiene siete puntos. Se creó un directorio llamado lib con todas las funciones requeridas para el cumplimiento de los objetivos.

1. Obtener todos los bienes generales

Se realizó una clase llamada JsonToData con una función para obtener la totalidad de los registros.


2. Menús desplegables de los filtros

Se realizó una función para obtener las ciudades y otra para los tipos de inmueble sin repetir. getCities() y getTypes().


3. Filtro de bienes Inmuebles

Se creó una función para obtener los datos filtrados llamada getFilterData().


4. Almacenamiento de Inmuebles

Se creo la base de datos y el archivo para el almacenamiento de los bienes MyProperties.php. Se creó una tabla llamada intelcost_bienes con un único campo denominado id. Esto es con el fin de no repetir información ya que el archivo JSON contiene la información relacionada al respectivo Id. Para la grabación del Inmueble se utilizó ajax para evitar la recarga de la página.


5. Lista de "Mis Bienes"

Se agrega un archivo llamado LoadMyProperties.php para cargar los id de la base de datos y obtener la información respectiva comparada con el archivo JSON para ser desplegada. Se usó una función javascript (load()) para cargar el div con la información respectiva.


6. Eliminar registros de Mis Bienes

Se crea un archivo llamado DeleteMyProperties.php para eliminar el id de la base de datos seleccionado. Se usa una función javascript (del()) para eliminar el div correspondiente.


7. Exportar la información a Excel

Se crea un archivo llamado excel.php que a través de un formulario submit permite filtrar por ciudad y tipo de inmueble para generar un archivo xls.




### Pre-requisitos 📋

* Este proyecto fue probado en PHP 7.4 pero debe funcionar perfectamente desde la función 7.2
* Servidor Web local para montar el proyecto (Laragon,LAMP, XAMP, Wamp)
* MySQL 5.7 o Maria DB para la base de datos



### Instalación 🔧

* Descarga el proyecto del repositorio.
* En la carpeta bd encontrarás el script de la base de datos. Córrelo tal como está y creará la base de datos con la tabla
* configurar el archivo credentials.json con las credenciales requeridas y correctas para el servidor de la base de datos






## Construido con 🛠️

_Menciona las herramientas que utilizaste para crear tu proyecto_

* Visual Studio Code (IDE)
* Laragon (servidor WEB)
* MYSQL (BD)
* HeidiSQL (IDE para DB)


## Autores ✒️

_Menciona a todos aquellos que ayudaron a levantar el proyecto desde sus inicios_

* **John Jairo González** - johnsinapsis@gmail.com




## Licencia 📄

Este proyecto está bajo la Licencia (Tu Licencia) - mira el archivo [LICENSE.md](LICENSE.md) para detalles

⌨️ con ❤️ por Johnsinapsis (https://github.com/johnsinapsis) 😊
