# 📚 Sistema de Gestión de Biblioteca Escolar

Bienvenido al repositorio del **Sistema de Gestión de Biblioteca Escolar**. Esta es una aplicación web desarrollada para administrar de manera eficiente los recursos de una biblioteca educativa, permitiendo el control de libros, estudiantes y el flujo de préstamos.

![Estado del Proyecto](https://img.shields.io/badge/Estado-Terminado-green)
![Versión](https://img.shields.io/badge/Versión-1.0-blue)

## 📋 Descripción

Este proyecto permite a los bibliotecarios o administradores llevar un registro digital de:
* **Libros:** Inventario completo con detalles como ISBN, editorial y disponibilidad.
* **Estudiantes:** Registro de alumnos autorizados para retirar material.
* **Préstamos:** Control de salidas y devoluciones de libros, gestionando fechas y estados.

La aplicación cuenta con un **Dashboard principal** que muestra estadísticas en tiempo real sobre el total de libros, estudiantes registrados y préstamos activos.

## 🚀 Características Principales

### 📖 Gestión de Libros
* **Listar:** Ver todo el catálogo disponible con portadas y estado.
* **Buscar:** Localizar libros rápidamente por su ID.
* **Añadir:** Registrar nuevos títulos en la base de datos.
* **Modificar:** Editar información de libros existentes.
* **Eliminar:** Borrar registros de libros obsoletos o perdidos.

### 👨‍🎓 Gestión de Estudiantes
* CRUD completo (Crear, Leer, Actualizar, Borrar) de alumnos.
* Registro de datos personales, curso y credenciales de acceso.

### 📅 Gestión de Préstamos
* Registro de nuevos préstamos vinculando un Estudiante con un Libro.
* Visualización de préstamos activos e historial.
* Marcado de devoluciones (cambio de estado de "Prestado" a "Devuelto").
* Validación de fechas de inicio y fin.

## 🛠️ Tecnologías Utilizadas

* **Lenguaje Backend:** PHP (Nativo/Procedural)
* **Base de Datos:** MySQL
* **Frontend:** HTML5, CSS3 (Diseño responsivo y limpio)
* **Servidor Local:** XAMPP / WAMP (Apache)

## 🔧 Instalación y Configuración

Sigue estos pasos para ejecutar el proyecto en tu entorno local:

### 1. Requisitos Previos
Necesitas tener instalado un servidor local como [XAMPP](https://www.apachefriends.org/es/index.html) o WAMP que incluya Apache y MySQL.

### 2. Clonar o Descargar
Descarga este proyecto y coloca la carpeta `Biblioteca` dentro del directorio público de tu servidor:
* En XAMPP: `C:/xampp/htdocs/Biblioteca`

### 3. Base de Datos
1.  Abre **phpMyAdmin** (normalmente en `http://localhost/phpmyadmin`).
2.  Crea una nueva base de datos llamada `biblioteca_escolar` (o simplemente importa el script, ya que incluye la creación).
3.  Importa el archivo `backup.sql` que se encuentra en la raíz de este proyecto. Esto creará las tablas (`Libros`, `Estudiantes`, `Prestamos`) e insertará datos de prueba.

### 4. Configuración de Conexión
El proyecto está configurado con las siguientes credenciales por defecto en todos los archivos `.php`. Si tu configuración de MySQL es diferente, asegúrate de cambiar estos valores en los archivos de conexión:

```php
$servername = "localhost";
$username = "root";
$password = "rootroot"; // Cambia esto por tu contraseña de MySQL (o déjalo vacío "" si usas XAMPP por defecto)
$dbname = "biblioteca_escolar";
