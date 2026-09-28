<?php

// Array associativo 
$produtos = [
    ["nome" => "Camiseta", "preco" => 50.00, "quantidade" => 10],
    ["nome" => "Calça Jeans", "preco" => 100.00, "quantidade" => 5],
    ["nome" => "Tênis", "preco" => 150.00, "quantidade" => 7],
];

// Exibindo em estrutura de tabela
echo "<table border='1'>";
echo "<tr>  <th>Nome</th> <th>Preço</th> <th>Quantidade</th> </tr>";

// Laço de repetição para mostrar os valores (Array)
foreach ($produtos as $produto) {
    echo "<tr>";
    echo "<td>" .$produto['nome'] . "</td>";
    echo "<td> R$" .number_format($produto['preco'],2 , ',' , '.') . "</td>";
    echo "<td>" .$produto['quantidade'] . "</td>";
    echo "<tr>";
}

// Fechamento da tabela
echo "</table>";

?>