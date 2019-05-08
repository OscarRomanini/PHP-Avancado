<?php

$conn = new PDO("mysql:host=127.0.0.1;dbname=pdo", "homestead", "secret");

$stmt = $conn->prepare("INSERT INTO clientes(nome, idade, sexo, profissao) 
VALUES(
    :NOME, 
    :IDADE, 
    :SEXO, 
    :PROFISSAO
    )");

$nome = "Zeca";
$idade = 49;
$sexo = "M";
$profissao = "Mecanico";

$stmt->bindParam(":NOME", $nome);
$stmt->bindParam(":IDADE", $idade);
$stmt->bindParam(":SEXO", $sexo);
$stmt->bindParam(":PROFISSAO", $profissao);

$stmt->execute();