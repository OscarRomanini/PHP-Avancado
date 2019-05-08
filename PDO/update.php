<?php


$conn = new PDO("mysql:host=127.0.0.1;dbname=pdo", "homestead", "secret");

$stmt = $conn->prepare("UPDATE clientes SET
nome = :NOME, 
idade = :IDADE, 
sexo = :SEXO,
profissao = :PROFISSAO WHERE id = :ID"
); 

$nome = "Zeca";
$idade = 49;
$sexo = "M";
$profissao = "Caminhoneiro";
$id = 3;

$stmt->bindParam(":NOME", $nome);
$stmt->bindParam(":IDADE", $idade);
$stmt->bindParam(":SEXO", $sexo);
$stmt->bindParam(":PROFISSAO", $profissao);
$stmt->bindParam(":ID", $id);

$stmt->execute();