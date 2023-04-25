<?php 
session_start();

if(isset($_SESSION["ID"]) && isset($_SESSION["user_name"])) {
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
    <header>
        Alteração de cadastro
    </header>
    <section>
        <?php 
            include_once("conexao.php");
            $id = $_GET["id"];
            $select = "SELECT * FROM cadastro WHERE ID = $id";
            $resultadoSelect = mysqli_query($conectar, $select);
            $fetch = mysqli_fetch_row($resultadoSelect);                    
        ?>
        <p><h2>Alterar dados</h2></p>
        <form action="alterar.php" method="post">
            <?php echo "<p><input type='hidden' name='id' id='id' value=$fetch[0]></p>"?>
            <div>
                <p>Nome</p>
                <?php echo "<p><input type='text' name='nome' id='nome' value=$fetch[1]></p> "?>
            </div>
            <div>
                <p>Data de Nascimento</p>
                <?php echo "<p><input type='date' name='dataNasc' id='dataNasc' value=$fetch[2]></p> "?>
            </div>
            <div>
                <p>Instrumento Preferido</p>
                <?php echo "<p><input type='text' name='instPref' id='instPref' value=$fetch[3]></p> "?>
            </div>
            <input type="submit" value="Enviar Formulário">
        </form>            
    </section>
</body>
</html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>