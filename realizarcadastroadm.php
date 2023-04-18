<?php 
// caso o formulário não tenha todos os dados necessários, mostra uma mensagem de erro e retorna a 
// página anterior.
$required = array('nome', 'dataNasc', 'instPref');
$error = false;
foreach($required as $field) {
    if (empty($_POST[$field])) {
        $error = true;
    }
}
// condição em javascript que faz mostrar um alerta e faz a página retornar para a página anterior.
if ($error == true) {
    echo '<script>alert("O Formulário não está devidamente preenchido!");history.go(-1);</script>';    
} else { // se os dados estiverem preenchidos corretamente, então segue o programa.
// faz a conexão com o banco de dados
    include_once("conexao.php");
// atribui os dados coletados do método post para variáveis
    $nome = $_POST["nome"];
    $dataNasc = $_POST["dataNasc"];
    $instFav = $_POST["instPref"];
// faz o cadastro no banco de dados
    $cadastrar = "INSERT INTO cadastro (nome, dataNasc, instFav) VALUES ('$nome','$dataNasc','$instFav')";
    $resultado_cadastrar = mysqli_query($conectar, $cadastrar);

    // voltar para a página de gerenciamento.
    header("Location: homepage.php");
}
?>