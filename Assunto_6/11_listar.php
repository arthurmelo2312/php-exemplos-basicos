<?php
// Conexão ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

// Conectando de fato
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação da conexão e possíveis erros
if ($conn->connect_error) {
    // Se conexão falhar mostra erro
    die("Falha na conexão: " .$conn->connect_error);
}
// Senão segue para consulta normalmente
$sql = "SELECT id, nome, email FROM clientes";
$result = $conn->query($sql);

// Exibe os registros existentes em formato de tabela
if ($result->num_rows > 0) {
    // Linha de contorno da tabela "border"
    echo "<table border='1'>";
    // Cabeçalho com os títulos (Campos) da tabela
    echo "<tr> <th>ID</th> <th>Nome</th> <th>Email</th> </tr>";

    // (Registros) ou linhas da tabela
    // fetch_assoc() - Método nativo que retorna as linhas
    // da tabela em array associativo (Como: id, nome, email)
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" .$row['id']. "</td>";
        echo "<td>" .$row['nome']. "</td>";
        echo "<td>" .$row['email']. "</td>";
        echo "<tr>";
    }
    echo "</table>";

} else {
    echo "Nenhum cliente encontrado!";
}
$conn->close();
?>