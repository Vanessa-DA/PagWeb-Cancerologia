<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pacientes - WarmLife</title>
    <link rel="stylesheet" href="main.css">
    <style>
        body { align-items: flex-start; padding: 30px 20px; }
        .list-container {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.28);
            box-shadow: 0 8px 40px rgba(0,0,0,0.3);
            border-radius: 20px;
            padding: 36px 40px;
            width: 100%;
            max-width: 860px;
            margin: 0 auto;
            color: white;
        }
        .list-top { display:flex; align-items:center; justify-content:space-between; margin-bottom:20px; flex-wrap:wrap; gap:10px; }
        .list-top-left { display:flex; align-items:center; gap:12px; }
        .list-top-left img { filter: drop-shadow(0 2px 6px rgba(0,212,255,0.4)); }
        .list-top-left h2 { font-size:20px; font-weight:700; }
        .list-top-left h2 span { color:#00d4ff; }
        .btn-menu { padding:9px 16px; border-radius:10px; background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.25); color:white; text-decoration:none; font-size:13px; }
        .btn-menu:hover { background:rgba(255,255,255,0.25); }
        .subtitulo { font-size:14px; color:rgba(255,255,255,0.65); margin-bottom:16px; padding-bottom:12px; border-bottom:1px solid rgba(255,255,255,0.15); }
        .stats-row { display:flex; gap:10px; flex-wrap:wrap; margin-bottom:18px; }
        .chip { background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.2); border-radius:10px; padding:7px 14px; font-size:13px; }
        .chip strong { color:#00d4ff; }
        table { width:100%; border-collapse:collapse; font-size:14px; color:white; }
        thead tr { background:rgba(0,123,255,0.5); }
        thead th { padding:12px 14px; text-align:left; font-size:13px; }
        tbody tr { border-bottom:1px solid rgba(255,255,255,0.08); }
        tbody tr:hover { background:rgba(255,255,255,0.07); }
        tbody td { padding:11px 14px; }
        .badge { display:inline-block; padding:3px 10px; border-radius:20px; font-size:12px; font-weight:600; }
        .b-trat { background:rgba(0,123,255,0.3); color:#7ec8ff; }
        .b-alta { background:rgba(52,199,89,0.3); color:#8effa8; }
        .b-seg  { background:rgba(255,200,0,0.2); color:#ffe882; }
        .b-urg  { background:rgba(255,80,80,0.3); color:#ffaaaa; }
    </style>
</head>
<body>
<div class="list-container">
    <div class="list-top">
        <div class="list-top-left">
            <img src="https://cdn-icons-png.flaticon.com/512/2864/2864348.png" width="36" alt="">
            <h2>Warm <span>Life</span>+ — Pacientes</h2>
        </div>
        <a href="Gestion.html" class="btn-menu">← Volver al menú</a>
    </div>

    <?php
    $query  = "SELECT * FROM pacientes ORDER BY id ASC";
    $result = pg_query($conn, $query);
    $total  = pg_num_rows($result);
    $c = ['En tratamiento'=>0,'Alta médica'=>0,'Seguimiento'=>0,'Urgencia'=>0];
    $rows = [];
    while($row = pg_fetch_assoc($result)){
        $rows[] = $row;
        if(isset($c[$row['estado_paciente']])) $c[$row['estado_paciente']]++;
    }
    ?>

    <p class="subtitulo">Unidad de Cancerología — Registros activos</p>
    <div class="stats-row">
        <div class="chip">Total: <strong><?=$total?></strong></div>
        <div class="chip">En tratamiento: <strong><?=$c['En tratamiento']?></strong></div>
        <div class="chip">Alta médica: <strong><?=$c['Alta médica']?></strong></div>
        <div class="chip">Seguimiento: <strong><?=$c['Seguimiento']?></strong></div>
        <div class="chip">Urgencia: <strong><?=$c['Urgencia']?></strong></div>
    </div>

    <?php if($total === 0): ?>
        <p style="text-align:center;padding:40px;color:rgba(255,255,255,0.5);">No hay pacientes registrados.</p>
    <?php else: ?>
    <table>
        <thead>
            <tr><th>ID</th><th>Nombre</th><th>Cédula</th><th>Tipo Cáncer</th><th>Estado</th><th>Fecha</th></tr>
        </thead>
        <tbody>
        <?php foreach($rows as $r):
            $cls = match($r['estado_paciente']){
                'En tratamiento'=>'b-trat','Alta médica'=>'b-alta',
                'Seguimiento'=>'b-seg','Urgencia'=>'b-urg',default=>''};
            $fecha = $r['fecha_registro'] ? date('d/m/Y',strtotime($r['fecha_registro'])) : '—';
        ?>
        <tr>
            <td><?=$r['id']?></td>
            <td><strong><?=htmlspecialchars($r['nombre'])?></strong></td>
            <td><?=htmlspecialchars($r['cedula'])?></td>
            <td><?=htmlspecialchars($r['tipo_cancer'])?></td>
            <td><span class="badge <?=$cls?>"><?=htmlspecialchars($r['estado_paciente'])?></span></td>
            <td><?=$fecha?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
</body>
</html>
