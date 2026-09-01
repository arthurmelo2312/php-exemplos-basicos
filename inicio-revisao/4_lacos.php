<?php

// Laço (FOR) para Tabuada 8
for ($i = 1; $i <=10; $i++) {
    echo "8 x $i = " . (8 * $i) . "<br>";
}

// While -(Enquanto) Contagem regressiva
echo "<br>";
$i = 5;
while ($i >0) {
    echo $i. "<br>";
    $i--;
}

// Do While - (Faça enquanto) Executa ao menos 1 vez
echo "<br>";
$x = 0;
do {
    echo "x vale: $x <br>";
    $x++;
} while ($x <= 10);