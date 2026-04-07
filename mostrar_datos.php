<?php
function mostrar_datos($conn){
    $query  = "SELECT * FROM pacientes ORDER BY id ASC";
    $result = pg_query($conn, $query);
    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse; width:100%; font-family:Segoe UI;'>";
    echo "<tr style='background:#007bff;color:white;'>
            <th style='padding:10px;'>ID</th>
            <th style='padding:10px;'>Nombre</th>
            <th style='padding:10px;'>Cédula</th>
            <th style='padding:10px;'>Tipo Cáncer</th>
            <th style='padding:10px;'>Estado</th>
          </tr>";
    while($row = pg_fetch_assoc($result)){
        echo "<tr style='background:rgba(255,255,255,0.85); color:#111;'>
                <td style='padding:9px 10px;'>".$row['id']."</td>
                <td style='padding:9px 10px;'><strong>".$row['nombre']."</strong></td>
                <td style='padding:9px 10px;'>".$row['cedula']."</td>
                <td style='padding:9px 10px;'>".$row['tipo_cancer']."</td>
                <td style='padding:9px 10px;'>".$row['estado_paciente']."</td>
              </tr>";
    }
    echo "</table>";
}
?>
