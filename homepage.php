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
            <h1>Bem-Vindo!</h1>
        </header>
        <section>
            <p><h2>Adicionar nova entrada</h2></p>
            <form action="realizarcadastroadm.php" method="post">
                <div>
                    <p>Nome</p>
                    <p><input type="text" name="nome" id="nome"></p>
                </div>
                <div>
                    <p>Data de Nascimento</p>
                    <p><input type="date" name="dataNasc" id="dataNasc"></p>
                </div>
                <div>
                    <p>Instrumento Preferido</p>
                    <p><input type="text" name="instPref" id="instPref"></p>
                </div>
                <input type="submit" value="Enviar Formulário">
            </form>
            <div>
                <!-- Tabela contendo todas as pessoas cadastradas -->
                <h2>População da Tropa:</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Instrumento favorito</th>
                        <th>Gerenciamento</th>
                    </tr>
                    <!-- Código PHP que puxa os dados da tabela -->
                    <?php
                        include_once("conexao.php");
                        $select = "SELECT * FROM cadastro";
                        $resultadoSelect = mysqli_query($conectar, $select);
                        while($fetch = mysqli_fetch_row($resultadoSelect)){
                            echo "<tr>";
                            foreach ($fetch as $key => $value) {
                                if ($key == 2) { // se o campo for a data de nascimento
                                    $dataNasc = date_create($value); // cria um objeto DateTime a partir da string da data de nascimento
                                    $idade = date_diff($dataNasc, date_create('now'))->y; // calcula a diferença entre a data de nascimento e a data atual e extrai o número de anos
                                    echo "<td>$idade</td>";
                                } else {
                                    echo "<td>$value</td>";
                                }                                
                            }
                            echo "<td><a href='alterarcadastro.php?id=$fetch[0]' onclick='return confirm(\"Tem certeza que deseja alterar este registro?\")'>alterar</a></td>";
                            echo "<td><a href='deletarcadastro.php?id=$fetch[0]' onclick='return confirm(\"Tem certeza que deseja excluir este registro?\")'>deletar</a></td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </section>
        <section>
            <a href="logout.php">Fazer Logout</a>
        </section>

    </body>
    </html>

    <?php
} else {
    header("Location: index.php");
    exit();
}
?>