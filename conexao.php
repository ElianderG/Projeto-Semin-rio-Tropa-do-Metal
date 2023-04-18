<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "tropametal";

    $conectar = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if(!$conectar) {
        echo "Falha na Conexão";
    }
?>