# PagWeb-Cancerologia
# Sistema Web de Gestión de Pacientes Oncológicos

Aplicación web desarrollada en **PHP + PostgreSQL** que permite gestionar pacientes mediante un sistema CRUD completo (Crear, Leer, Actualizar y Eliminar).

---

## Objetivo del Proyecto

Este proyecto fue desarrollado como parte del aprendizaje en **bases de datos**, con el propósito de:

* Comprender la conexión entre PHP y PostgreSQL
* Implementar operaciones CRUD
* Manipular datos desde formularios web
* Entender el flujo completo entre frontend y backend

---

## ⚙️ Tecnologías Utilizadas

* **PHP** → lógica del servidor
* **PostgreSQL** → base de datos
* **HTML** → estructura de la interfaz
* **CSS** → estilos (personalizados)

---

##  Funcionalidades Principales

✔ Registro de pacientes
✔ Visualización de datos (tabla)
✔ Edición de información
✔ Eliminación de registros
✔ Conexión a base de datos PostgreSQL
✔ Manejo de formularios con método POST

---

##  Operaciones CRUD

El sistema implementa las 4 operaciones fundamentales:

* **CREATE** → Inserción de nuevos pacientes mediante formularios
* **READ** → Consulta y visualización de registros con `SELECT`
* **UPDATE** → Modificación de datos mediante `UPDATE`
* **DELETE** → Eliminación de registros con `DELETE`

Todas las operaciones se ejecutan utilizando la función `pg_query()` de PHP.

---

## 🔌 Conexión a la Base de Datos

La conexión se realiza mediante:

```php
pg_connect("host=localhost port=5432 dbname=hospital user=postgres password=****");
```

Esta conexión se reutiliza en todo el proyecto mediante `include`.

---

##  Estructura de la Base de Datos

Tabla principal: `pacientes`

| Campo       | Tipo        |
| ----------- | ----------- |
| id          | SERIAL (PK) |
| nombre      | VARCHAR     |
| edad        | INT         |
| tipo_cancer | VARCHAR     |
| estado      | VARCHAR     |

---

##  Estructura del Proyecto

```
PagWeb-Cancerologia/
│── db/
│   └── conexion.php
│
│── pacientes/
│   ├── crear.php
│   ├── insertar.php
│   ├── editar.php
│   ├── actualizar.php
│   ├── eliminar.php
│
│── index.php
│── README.md
```

---

##  Flujo de Funcionamiento

1. El usuario interactúa con formularios HTML
2. Los datos se envían mediante método POST
3. PHP recibe los datos (`$_POST`)
4. Se ejecutan consultas SQL (`pg_query`)
5. PostgreSQL procesa la información
6. Se muestran resultados o se redirige al usuario

---

## 🚀 Posibles Mejoras

* 🔍 Implementar buscador de pacientes
* 👤 Sistema de autenticación (login)
* 📊 Dashboard visual
* 🔗 Relación con tabla de tratamientos
* 🎨 Mejora de interfaz (UI/UX)

---

## 👩‍💻 Autor

**Vanessa**

Estudiante en formación con enfoque en desarrollo web y bases de datos.

---

## Notas

* Archivo de conexión protegido mediante `.gitignore`
* Proyecto enfocado en aprendizaje y práctica académica
* Código estructurado para facilitar modificaciones

---

## Conclusión

Este proyecto demuestra la implementación práctica de un sistema CRUD conectado a una base de datos PostgreSQL, aplicando conceptos fundamentales de desarrollo backend y manejo de datos.

---
