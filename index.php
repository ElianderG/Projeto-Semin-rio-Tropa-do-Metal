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
        <h1>BEM VINDO A TROPA DO METAL!</h1>
    </header>
    <section>
        <div>
            <!-- Tabela contendo todas as pessoas cadastradas -->
            <h2>População da Tropa:</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Instrumento favorito</th>
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
                            echo "</tr>";
                        }
                    ?>
            </table>
        </div>
    </section>
    <section>
        <div>
            <!-- botão para direcionar a página de cadastro -->
            <p><h2>Quer se juntar a nossa tropa?</h2></p>
            <p><a href="cadastrar.php">Clique aqui!</a></p>
        </div>
    </section>
    <section>
        <p><h2>Conta administrativa?</h2></p>
        <p><a href="loginpage.php">Clique Aqui!</a></p>
    </section>
</body>
</html>