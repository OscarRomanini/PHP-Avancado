<?php

$conn = new PDO("mysql:dbname=pdo; host=127.0.0.1","homestead","secret");

$statement = $conn->prepare("SELECT * FROM clientes");
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row){
    foreach ($row as $key => $value) {
        echo "<strong>".$key."</strong> : ".$value."<br>";
    }
    echo "----------------------------------<br>";
}
