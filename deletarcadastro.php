<?php
    include_once("conexao.php"); // inclui o arquivo de conexão com o banco de dados

    if (isset($_GET['id'])) { // verifica se foi enviado o ID do registro a ser excluído
        $id = $_GET['id'];
        $delete = "DELETE FROM cadastro WHERE id = '$id'"; // monta a query para excluir o registro
        mysqli_query($conectar, $delete); // executa a query

        if (mysqli_affected_rows($conectar) > 0) { // verifica se algum registro foi afetado pela exclusão
            echo '<script>';
            echo "alert('Registro excluído com sucesso.');";
            echo "window.location.href = 'homepage.php';";
            echo '</script>';
            exit();
        } else {
            echo '<script>';
            echo "alert('Não foi possível excluir o registro.');";
            echo "window.location.href = 'homepage.php';";
            echo '</script>';
            exit();
        }
    }
?>