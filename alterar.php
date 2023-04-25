<?php
    include_once("conexao.php"); // inclui o arquivo de conexão com o banco de dados
    var_dump($_POST);

    if (isset($_POST['id'])) { // verifica se foi enviado o ID do registro a ser alterado
        $id = $_POST['id'];
        $nomealt = $_POST['nome'];
        $dataNasc = $_POST['dataNasc'];
        $instPref = $_POST['instPref'];
        $alterar = "UPDATE cadastro SET nome = '$nomealt', dataNasc = '$dataNasc', instFav = '$instPref' WHERE id = '$id'"; // monta a query para alterar o registro
        mysqli_query($conectar, $alterar); // executa a query

        if (mysqli_affected_rows($conectar) > 0) { // verifica se algum registro foi afetado
            echo '<script>';
            echo "alert('Registro alterado com sucesso.');";
            echo "window.location.href = 'homepage.php';";
            echo '</script>';
            exit();
        } else {
            echo '<script>';
            echo "alert('Não foi possível alterar o registro.');";
            echo "window.location.href = 'homepage.php';";
            echo '</script>';
            exit();
        }
    }
?>