<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Cadastro de Produtos</title> 
</head> 
<body> 
    <form method="post" action=""> 
        <label for="nome">Nome do Produto:</label> 
        <input type="text" name="nome" required><br> 
 
        <label for="preco">Preço:</label> 
        <input type="number" step="1" name="preco" required><br> 
 
        <button type="submit">Cadastrar Produto</button> 
    </form> 
 
    <?php 
    // Verifica se o formulário foi enviado 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $nome = $_POST['nome']; 
        $preco = $_POST['preco']; 
 
        // Valida se o nome não está vazio e se o preço é um número maior que 0 
        if (!empty($nome) && is_numeric($preco) && $preco > 0) { 
            
            // Dados para conexão com o banco de dados
            $servidor = "localhost";
            $usuario = "root";
            $senha = "Senai@118";
            $banco = "exercicio";

            // Conecta ao BD
            $conn = new mysqli($servidor, $usuario, $senha, $banco); 
 
            if ($conn->connect_error) { 
                die("Falha na conexão: " . $conn->connect_error); 
            } 
 
            // Insere o registro no BD 
            $sql = "INSERT INTO produtos (nome, preco) VALUES ('$nome', $preco)"; 
 
            if ($conn->query($sql) === TRUE) { 

                // Redireciona para a própria página
                header('Location: ' . $_SERVER['PHP_SELF'] . '?sucesso=1');
                exit;

            } else { 
                echo "<p style='color: red;'>Erro ao cadastrar o produto.</p>"; 
            } 
 
            $conn->close(); 

        } else { 
            // Se a validação falhar, exibe uma mensagem de erro 
            echo "<p style='color: red;'>Erro: Preencha todos os campos corretamente. O preço deve ser maior que zero.</p>"; 
        } 
    } 

    // Mostra a mensagem de sucesso
    if (isset($_GET['sucesso'])) {

        echo "<p style='color: Darkgreen;'>Produto cadastrado com sucesso!</p>";

        // Atualiza a página depois de 3 segundos
        header('Refresh: 3; url=' . $_SERVER['PHP_SELF']);
    }

    ?> 
</body> 
</html>