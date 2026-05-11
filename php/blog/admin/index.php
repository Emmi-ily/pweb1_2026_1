<?php


include_once './database/db.class.php';

//instanciar objeto da classe db
$conn = new db("usuario");

$dados = [
    'nome'=>"Emily a",
    'telefone' => "88 556633",
    'email' => "emily.m1@aluno",
];

$conn->store($dados);
echo "Inserido com sucesso!";

