# 🏥 Sistema Web de Gestión de Pacientes Oncológicos

![PHP](https://img.shields.io/badge/PHP-Backend-blue?logo=php)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-Database-blue?logo=postgresql)
![HTML](https://img.shields.io/badge/HTML-Structure-orange?logo=html5)
![CSS](https://img.shields.io/badge/CSS-Styles-blue?logo=css3)
![Status](https://img.shields.io/badge/Status-En%20desarrollo-yellow)
![GitHub repo size](https://img.shields.io/github/repo-size/Vanessa-DA/PagWeb-Cancerologia)
![GitHub last commit](https://img.shields.io/github/last-commit/Vanessa-DA/PagWeb-Cancerologia)

---

##  Descripción

Aplicación web desarrollada en **PHP y PostgreSQL** que permite gestionar pacientes mediante un sistema CRUD completo (Crear, Leer, Actualizar y Eliminar).

El sistema está diseñado para comprender la conexión a bases de datos y la manipulación de información desde una interfaz web.

---

##  Objetivo del Proyecto

* Aprender a conectar PHP con PostgreSQL
* Implementar operaciones CRUD
* Manipular datos mediante formularios
* Comprender el flujo entre frontend y backend
* Desarrollar buenas prácticas de organización de código

---

## ⚙️ Tecnologías Utilizadas

* **PHP** → lógica del servidor
* **PostgreSQL** → base de datos relacional
* **HTML** → estructura de la aplicación
* **CSS** → diseño e interfaz

---

##  Funcionalidades

✔️ Crear pacientes
✔️ Visualizar registros
✔️ Editar información
✔️ Eliminar pacientes
✔️ Buscar por nombre
✔️ Conexión a PostgreSQL

---

##  Operaciones CRUD

* **CREATE** → Inserción de pacientes mediante formularios
* **READ** → Consulta con `SELECT` y visualización en tabla
* **UPDATE** → Modificación de datos con `UPDATE`
* **DELETE** → Eliminación de registros con `DELETE`

Las consultas se ejecutan utilizando `pg_query()`.

---

## 🔌 Conexión a la Base de Datos

```php
pg_connect("host=localhost port=5432 dbname=cancerologia user=postgres password=****");
```

La conexión se centraliza en un archivo y se reutiliza con `include`.

---

##  Base de Datos

### Tabla: `pacientes`

| Campo       | Tipo        |
| ----------- | ----------- |
| id          | SERIAL (PK) |
| nombre      | VARCHAR     |
| edad        | INT         |
| tipo_cancer | VARCHAR     |
| estado      | VARCHAR     |

---

##  Estructura del Proyecto

```bash
PagWeb-Cancerologia/
│
├── db/
│   └── conexion.php
│
├── pacientes/
│   ├── crear.php
│   ├── insertar.php
│   ├── editar.php
│   ├── actualizar.php
│   ├── eliminar.php
│   ├── buscar.php
│   └── listar.php
│
├── css/
│   └── estilos.css
│
├── index.php
├── cancerologia.sql
└── README.md
```

---

##  Flujo del Sistema

1. El usuario ingresa datos en formularios HTML
2. Los datos se envían mediante método POST
3. PHP recibe la información (`$_POST`)
4. Se ejecutan consultas SQL con `pg_query()`
5. PostgreSQL procesa los datos
6. Se actualiza la interfaz o se redirige

---

## 🚀 Instalación y Uso

1. Clonar el repositorio:

```bash
git clone https://github.com/Vanessa-DA/PagWeb-Cancerologia.git
```

2. Crear la base de datos en PostgreSQL y ejecutar:

```sql
cancerologia.sql
```

3. Configurar credenciales en:

```bash
db/conexion.php
```

4. Ejecutar en servidor local (XAMPP, Laragon, etc.)

---

## 🔐 Seguridad

* El archivo de conexión puede excluirse usando `.gitignore`
* Se recomienda no subir credenciales reales

---

## 🚀 Posibles Mejoras

* 🔍 Búsqueda avanzada
* 👤 Sistema de autenticación (login)
* 📊 Dashboard visual
* 🔗 Relación con tabla de tratamientos
* 🎨 Mejora de interfaz (UI/UX)

---

## 👩‍💻 Autor

**Vanessa**

Estudiante en formación en desarrollo web y bases de datos.

---

##  Conclusión

Este proyecto demuestra la implementación práctica de un sistema CRUD conectado a PostgreSQL, aplicando conceptos fundamentales de backend, manejo de datos y organización de código.

---
