<?php

// Exemplo de função em PHP (Uma função sempre tem retorno)
function somar(float $a, float $b): float {
    return $a + $b;
}

// Chamando a função
echo somar(4.5, 9.3);
echo "<br><br>";

// Exemplo de procedimento (Não tem return, pois não calcula)
function saudacao(string $nome) {
    echo "Olá, $nome! Seja Bem-vindo(a)!!";
}


// Usando/exibindo (Procedimento)
saudacao("Maria Smart");
echo '<br>';
saudacao("Mary Lost");
