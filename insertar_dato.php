<?php
include("conexion.php");
include("mostrar_datos.php");

$nombre      = $_POST["nombre"];
$cedula      = $_POST["cedula"];
$tipo_cancer = $_POST["tipo_cancer"];
$estado      = $_POST["estado_paciente"];

$query = "INSERT INTO pacientes (nombre, cedula, tipo_cancer, estado_paciente)
          VALUES ('$nombre','$cedula','$tipo_cancer','$estado')";
pg_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Paciente Registrado - WarmLife</title>
    <link rel="stylesheet" href="main.css">
    <style>
        body { align-items: flex-start; padding: 30px 20px; }
        .result-box { backdrop-filter:blur(10px); background:rgba(255,255,255,0.14); border:1px solid rgba(255,255,255,0.28); border-radius:20px; padding:30px 36px; max-width:900px; margin:0 auto; color:white; }
        .msg-ok { background:rgba(52,199,89,0.2); border:1px solid rgba(52,199,89,0.4); border-radius:12px; padding:14px 20px; margin-bottom:20px; color:#8effa8; font-weight:600; font-size:15px; }
        .acciones { display:flex; gap:12px; margin-top:20px; }
        .btn-accion { padding:10px 18px; border-radius:10px; text-decoration:none; font-size:13px; font-weight:600; }
        .btn-menu { background:#007bff; color:white; }
        .btn-nuevo { background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.25); color:white; }
        .btn-accion:hover { opacity:0.85; }
        h3 { font-size:15px; color:rgba(255,255,255,0.7); margin-bottom:14px; }
    </style>
</head>
<body>
<div class="result-box">
    <div class="msg-ok">✓ Paciente registrado exitosamente.</div>
    <h3>Lista actualizada de pacientes:</h3>
    <?php mostrar_datos($conn); ?>
    <div class="acciones">
        <a href="Gestion.html" class="btn-accion btn-menu">← Volver al menú</a>
        <a href="formulario_insertar.html" class="btn-accion btn-nuevo">+ Registrar otro</a>
    </div>
</div>
</body>
</html>
