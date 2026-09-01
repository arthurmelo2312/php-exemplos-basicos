<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Status Codes</title>
</head>
<body>

    <h1>Cadastro de Aluno (com status Code)</h1>
    <form method="post" action="" >
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="idade">Idade:</label>
        <input type="text" name="idade" required><br><br>

        <button type="submit">Enviar</button>

    </form>

    <!-- Linha horizontal -->
    <hr>

    <?php
    // $_SERVER é uma variável superglobal do PHP que contém informações sobre requisições feitas pelo servidor. Aqui ele esta confirmando se a requisição é via POST (Protocolo HTTP)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Se sim ele acessa as informações (Nome e idade)
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];

        // Tratando erros e interagindo.

        // Erro: Não prencheu nome e idade.
        if ($nome == "" || $idade == "") {
          http_response_code(400);
          echo "<h2>Status 400 - Faltou nome ou idade</h2>";

        // Não digitou um número. Ex: Digitou "vinte" e não o número 20.  
        } elseif (!is_numeric($idade)) {
            http_response_code(400);
            echo "<h2>Status 400 - Idade precisa ser um número</h2>";

        // Preenchidos corretamente (Todos dados)
        } else {
            http_response_code(201);
            echo "<h2>Status 201 - Criado: $nome, $idade anos.</h2>";
        }

    } else {
        // Usuário ainda não enviou nada.
        http_response_code(200);
        echo "<p> Preencha o formulário acima e envie.</p>";
    }


    ?>

    
</body>
</html>