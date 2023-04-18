<?php 
session_start();
include "conexao.php";
// valida os dados do método post
if(isset($_POST["uname"]) && isset($_POST["psw"])){
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
$uname = validate($_POST["uname"]);
$pass = validate($_POST["psw"]);

// verifica se o usuário ou senha estão vazios e mostra mensagem de erro
if(empty($uname)){
    echo '<script>';
    echo "alert('Campo usuário está vazio!');";
    echo "window.location.href = 'loginpage.php';";
    echo '</script>';
    exit();
} else if (empty($pass)){
    echo '<script>';
    echo "alert('Campo da senha está vazio!');";
    echo "window.location.href = 'loginpage.php';";
    echo '</script>';
}

// query sql para verificação se usuário e senha existem no banco de dados
$sql = "SELECT * FROM adm WHERE user_name='$uname' AND password='$pass'";
$result = mysqli_query($conectar,$sql);

// se o usuário e senha batem com os do banco de dados, mostra a mensagem "Logado!"
if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if($row["user_name"] === $uname & $row["password"] === $pass) {
        echo "Logado!";
        $_SESSION["user_name"] = $row["user_name"]; // aqui cria-se a sessão que será a sessão de login
        $_SESSION["password"] = $row["password"];
        $_SESSION["ID"] = $row["ID"];
        header("Location: homepage.php");
        exit();
    } else { // se o usuário e senha não batem, mostra a mensagem de erro de usuário e senha incorretos.
        echo '<script>';
        echo "alert('Usuário ou senha incorretos!');";
        echo "window.location.href = 'loginpage.php';";
        echo '</script>';
    }
} else {  
    //mostra mensagem de erro caso o usuário e a senha estiverem incorretos.
    echo '<script>';
    echo "alert('Usuário ou senha incorretos!');";
    echo "window.location.href = 'loginpage.php';";
    echo '</script>';
    exit();
}
?>