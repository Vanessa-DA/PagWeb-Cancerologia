<?php
$host="localhost";
$port="5432";
$dbname="cancerologia";
$user="postgres";
$password="vanessa";
$conn=pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if(!$conn){
    echo "Error al conectar a la base de datos.";
}
?>
