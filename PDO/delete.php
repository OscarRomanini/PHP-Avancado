<?php

$conn = new PDO("mysql:host=127.0.0.1;dbname=pdo", "homestead", "secret");

$stmt = $conn->prepare("DELETE FROM clientes WHERE id = :ID");

$id = 3;

$stmt->bindParam(":ID", $id);

$stmt->execute();