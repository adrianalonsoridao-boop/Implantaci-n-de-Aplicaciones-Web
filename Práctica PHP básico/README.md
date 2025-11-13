# Práctica 3: PHP Básico - Salesianos Atocha 🎓

> **Repositorio de la Práctica 3 de Implantación de Aplicaciones Web (IAW). Resolución de 4 ejercicios fundamentales sobre bucles, arrays (vectores), formularios y manejo de ficheros de texto (.txt).**

---

## 🏫 Contexto Académico
* **Centro:** [Colegio Salesianos Atocha](https://salesianosatocha.es/)
* **Asignatura:** Implantación de Aplicaciones Web (IAW)
* **Tecnologías:** PHP, HTML5, Manejo de Ficheros.

---

## 📂 Descripción de los Ejercicios

A continuación se detalla el funcionamiento de cada ejercicio según el enunciado oficial:

### 1️⃣ Ejercicio 1: Bucles y Formularios
Generación de gráficos ASCII mediante bucles anidados.
* **Enunciado:** Crear un programa que pida **Ancho** y **Alto** (números entre 0 y 100) y dibuje un rectángulo de estrellas (`*`) de ese tamaño.
* **Archivos:** `Ejercicio1.html` (Formulario), `Ejercicio1.php` (Lógica).
* **Input:** Formulario con validación de rango.
* **Output:** Representación visual del rectángulo.

### 2️⃣ Ejercicio 2: Números Aleatorios y Vectores
Simulación de juego de azar.
* **Enunciado:** Programa que enfrenta a dos jugadores. Cada uno tira **5 dados** al azar. Se deben sumar los resultados de cada jugador y compararlos para determinar quién ha ganado o si hay empate.
* **Detalles:** Se utilizan imágenes para representar las caras de los dados (1 al 6).
* **Archivos:** `Ejercicio2.php`, carpeta `/img`.

### 3️⃣ Ejercicio 3: Formularios y Ficheros de Texto
Sistema de matriculación con persistencia condicional.
* **Enunciado:** Formulario `alumno.html` que recoge:
    * Nombre, Teléfono.
    * Enseñanza (Radio: Secundaria, Bachillerato, Ciclos).
    * Matriculado (Checkbox).
    * **Modo de Salida:** "Por Pantalla" o "En Archivo".
* **Flujo del programa:**
    1.  **Pantalla:** Muestra una frase resumen (ej: *"El alumno X está matriculado en..."*).
    2.  **Archivo:** Si se elige esta opción, guarda los datos en `datos.txt`. Tras guardar, muestra un enlace ("Mostrar archivo") que lleva a `mostrardatos.php` para leer el contenido del fichero.
* **Archivos:** `alumno.html`, `datos_alumno.php`, `mostrardatos.php`, `datos.txt`.

### 4️⃣ Ejercicio 4: Agenda Virtual PHP
Gestión completa de una agenda (CRUD básico sobre fichero de texto).
* **Enunciado:** Programa para gestionar una agenda que permite:
    1.  **Dar de alta:** Guardar Nombre, Trabajo, Teléfono, Dirección y Otras notas.
    2.  **Mostrar:** Listar todos los contactos guardados en `contactos.txt`.
    3.  **Buscar:** Introducir un nombre y mostrar los datos de ese contacto específico.
* **Archivos:** `Ejercicio4.html`, `Ejercicio4.php` (Alta), `contactos.php` (Listado/Menú), `busqueda.php` (Lógica de búsqueda).

---

## 🛠️ Instalación y Despliegue

Para corregir o visualizar estas prácticas:

1.  **Clonar el repositorio** en el directorio raíz del servidor web (ej: `/var/www/html/` o `htdocs`).
2.  **Permisos de Escritura:** Es fundamental dar permisos de escritura a la carpeta para que PHP pueda crear y modificar los archivos `.txt`:
    ```bash
    chmod 777 -R .
    ```
    *(Sin esto, los ejercicios 3 y 4 darán error al intentar guardar datos)*.
3.  **Recursos:** Asegurarse de que la carpeta `img/` contiene las imágenes de los dados (`1.jpg` a `6.jpg`) para el Ejercicio 2.

---

Developed by Adrián Alonso Ridao 👨‍💻
