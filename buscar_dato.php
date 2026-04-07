<?php
include("conexion.php");

$buscar = $_POST["buscar"];
$query  = "SELECT * FROM pacientes WHERE nombre ILIKE '%$buscar%' OR cedula ILIKE '%$buscar%'";
$result = pg_query($conn, $query);
$total  = pg_num_rows($result);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Búsqueda - WarmLife</title>
    <link rel="stylesheet" href="main.css">
    <style>
        body { align-items: flex-start; padding: 30px 20px; }
        .result-box { backdrop-filter:blur(10px); background:rgba(255,255,255,0.14); border:1px solid rgba(255,255,255,0.28); border-radius:20px; padding:30px 36px; max-width:900px; margin:0 auto; color:white; }
        .msg-info { background:rgba(0,123,255,0.2); border:1px solid rgba(0,123,255,0.4); border-radius:12px; padding:14px 20px; margin-bottom:20px; color:#b8d4ff; font-size:15px; }
        .msg-vacio { text-align:center; padding:40px; color:rgba(255,255,255,0.5); font-size:15px; }
        table { width:100%; border-collapse:collapse; font-size:14px; }
        thead tr { background:#007bff; color:white; }
        thead th { padding:12px 14px; text-align:left; }
        tbody tr { background:rgba(255,255,255,0.85); color:#111; }
        tbody tr:nth-child(even) { background:rgba(255,255,255,0.7); }
        tbody td { padding:10px 14px; border-bottom:1px solid rgba(0,0,0,0.08); }
        .acciones { display:flex; gap:12px; margin-top:20px; }
        .btn-accion { padding:10px 18px; border-radius:10px; text-decoration:none; font-size:13px; font-weight:600; }
        .btn-menu { background:#007bff; color:white; }
        .btn-nuevo { background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.25); color:white; }
    </style>
</head>
<body>
<div class="result-box">
    <div class="msg-info">
        🔍 <?=$total?> resultado(s) para: <strong>"<?=htmlspecialchars($buscar)?>"</strong>
    </div>

    <?php if($total === 0): ?>
        <div class="msg-vacio">No se encontraron pacientes con ese criterio.</div>
    <?php else: ?>
    <table>
        <thead>
            <tr><th>ID</th><th>Nombre</th><th>Cédula</th><th>Tipo Cáncer</th><th>Estado</th></tr>
        </thead>
        <tbody>
        <?php while($row = pg_fetch_assoc($result)): ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><strong><?=htmlspecialchars($row['nombre'])?></strong></td>
            <td><?=htmlspecialchars($row['cedula'])?></td>
            <td><?=htmlspecialchars($row['tipo_cancer'])?></td>
            <td><?=htmlspecialchars($row['estado_paciente'])?></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <?php endif; ?>

    <div class="acciones">
        <a href="Gestion.html" class="btn-accion btn-menu">← Volver al menú</a>
        <a href="formulario_buscar.html" class="btn-accion btn-nuevo">Nueva búsqueda</a>
    </div>
</div>
</body>
</html>
