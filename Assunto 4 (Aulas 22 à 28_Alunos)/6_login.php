<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de maioridade</title>
</head>
<body>
    <?php
    $mensagem = '';
    $nome = '';
    $anoNascimento = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = trim($_POST['nome'] ?? '');
        $anoNascimento = filter_input(INPUT_POST, 'ano_nascimento', FILTER_VALIDATE_INT);
        $anoAtual = (int) date('Y');

        // Validação com ano mínimo de 18
        if ($nome === '' || $anoNascimento === false || $anoNascimento < 18 || $anoNascimento > $anoAtual) {
            $mensagem = '<p>Informe um nome e um ano de nascimento válido (a partir de 18).</p>';
        } else {
            $idade = $anoAtual - $anoNascimento;
            $nomeExibido = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');

            if ($idade >= 18) {
                $linha = $nome . ';' . $idade . PHP_EOL;

                // Tenta salvar no arquivo
                if (file_put_contents('log_acessos.txt', $linha, FILE_APPEND | LOCK_EX) === false) {
                    $mensagem = '<p>Não foi possível salvar o acesso. Tente novamente.</p>';
                } else {
                    $mensagem = "<p>Acesso permitido, {$nomeExibido}!</p>";
                }
            } else {
                // Mensagem informando que é menor de idade
                $mensagem = "<p>Acesso negado, {$nomeExibido}! Você é menor de idade.</p>";
            }
        }
    }
    ?>

    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>" required>

        <label for="ano_nascimento">Ano de Nascimento:</label>
        <!-- Mínimo alterado para 18 -->
        <input type="number" id="ano_nascimento" name="ano_nascimento" min="18" max="<?= date('Y') ?>" value="<?= htmlspecialchars((string) $anoNascimento, ENT_QUOTES, 'UTF-8') ?>" required>

        <button type="submit">Verificar</button>
    </form>

    <?= $mensagem ?>
</body>
</html>