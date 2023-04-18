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
    <header style="text-align:center;">
        <h1>Então, você deseja trilhar o caminho do METAL?!</h1>
    </header>
    <section>
        <H2>Preencha a Ficha</H2>
        <form action="realizarcadastro.php" method="post">
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
    </section>
</body>
</html>