<!-- Passar id via URL -->
<!-- http://localhost/php-basicos/13_exclusao.php?id=5-->

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

// Consultando se id solicitado existe no BD
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM clientes WHERE id='$id'";

    // Mensagem (Feedback para usuário)
    if ($conn->query($sql) === TRUE) {
        echo "<p>Cliente apagado com sucesso!</p>";
    } else {
        echo "<p>Erro ao apagar cliente.</p>";
    }
}

// Fecha a conexão
$conn->close();
?>