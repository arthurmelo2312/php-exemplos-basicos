<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Login de usuário</title>
</head>
<body>
    <form method="post" action="">
        <!-- Campo para nome -->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <!-- Campo para senha -->
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>

        <!-- Botão para entrar -->
         <button type="submit">Entrar</button>
    </form>

    <!-- Lógica de Login -->
    <?php 
    // Se dados preenchidos e formulário enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe os valores preenchidos (Vindos do Front-end)
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        // Abre o arquiv usuarios.txt para leitura
        $arquivo = fopen('../Assunto_3/usuarios.txt', 'r');
        $login_sucesso = false;

        // Lê cada linha do arquivo
        while (($linha = fgets($arquivo)) !== false) {
            // Divide a linha pelo delimitador (Nesta caso ";")
            list($usuario_arquivo, $senha_arquivo) = explode(';', trim($linha));

            // Verifica se nome e senha correspondem com os cadastrados
            // no arquivo "usuarios.txt"
            if ($nome == $usuario_arquivo && $senha == $senha_arquivo) {
                $login_sucesso = true;
                break;
            }
        }
        // Fecha o arquivo
        fclose($arquivo);

        // Exibe a mensagem (Feedback) de sucesso ou erro "Processo de logar"
        if ($login_sucesso) {
            echo "<p style= 'color: darkgreen'>Login realizado com sucesso!<br> Bem-vindo, $nome!</p>";
        } else {
            echo "<p style= 'color: red'>Usuário ou senha incorretos!</p>";
        }
    }
    ?>   
</body>
</html>