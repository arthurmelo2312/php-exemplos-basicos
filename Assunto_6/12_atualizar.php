<!-- Passar id via URL -->
<!-- http://localhost/php-exemplos-basicos/12_atualizar.php?id=1-->
 <!-- http://localhost/php-basicos(professor-old)/12_atualizar.php?id=1 -->


<?php
// Conecta ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Limpando o valor da variável
$cliente = null;

// Consultando se id solicitado existe no BD
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id='$id'";
    $result = $conn->query($sql);

    // Verifica se encontrou no BD
    if($result->num_rows > 0) {
        // Se encontrou mostra o resultado
        $cliente = $result->fetch_assoc();
    } else {
        // Se não encontrou mostra a mensagem
        echo "Cliente não encontrado.";
        exit();
    }
}

// Lógica de alteração (Quando o registro existe)
// Pega os novos dados o formulário (Para alterar)
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Sql de atualização
    $sql = "UPDATE clientes SET nome='$nome', email='$email' WHERE id='$id'";

    // Mensagem (Feedback para usuário)
    if ($conn->query($sql) === TRUE) {
        echo "<p>Cliente atualizado com sucesso!</p>";
    } else {
        echo "<p>Erro ao atualizar cliente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $cliente['id'] ?? ''; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo isset($cliente['nome']) ? $cliente['nome'] : ''; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($cliente['email']) ? $cliente['email'] : ''; ?>" required><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>