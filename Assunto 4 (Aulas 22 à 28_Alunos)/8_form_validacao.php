<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required> <br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required> <br>

    <label for="menssagem">Mensagem:</label>
    <textarea name="menssagem" id="menssagem" required></textarea> <br>
    <input type="submit" value="Enviar">
    <!-- Logica de validacao -->
    <?php
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $menssagem = $_POST['menssagem'] ?? '';

    // Valida se campos estiverem vazios e formato de e-mail inválido
    if (!empty($nome) && !empty($email) && !empty($menssagem) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: darkgreen;'>Formulário enviado com sucesso!</p>";
    } else {
        echo "<p style='color: darkred;'>Por favor, preencha todos os campos corretamente.</p>";
    }
    }
    ?>
</form>
</body>
</html>