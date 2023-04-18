<?php 
session_start();
//checa se sessão já existe.
if (count($_SESSION)>0){    
    // Redireciona para a página homepage.php
    header("Location: homepage.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropa do METAL!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <form action="logincheck.php" method="post">
        <div class="imgcontainer">
            <img src="avatar.png" alt="Avatar" class="avatar">
        </div>
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <button type="submit">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Lembrar de mim
            </label>
        </div>
        <div class="container">
            <button type="button" class="cancelbtn" id="cancelBtn">Cancel</button>

            <script>
                // seleciona o botão cancelar
                const cancelBtn = document.querySelector("#cancelBtn");

                // adiciona um evento de clique ao botão cancelar
                cancelBtn.addEventListener("click", function() {
                    // redireciona o usuário para a página inicial
                    window.location.href = "index.php";
                });
            </script>

            <span class="psw">Esqueceu a <a href="#">senha</a>?</span>
        </div>
        </form>
    </section>
</body>
</html>