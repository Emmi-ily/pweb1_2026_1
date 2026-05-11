<?php

$pessoas = [
    ["nome" => "Jackson", "idade" => 20],
    ["nome" => "Maria", "idade" => 85],
    ["nome" => "Ryan", "idade" => 5],
];

foreach ($pessoas as $key => $item){
    $nome = $item['nome'];
    $idade = $item['idade'];
    echo "Indice: $key Nome: $nome Idade: $idade <br>";
}