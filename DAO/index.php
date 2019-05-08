<?php

require_once "class/Clientes.php";

// $cli = new Clientes();
// $cli->loadById(1);

//$list = Clientes::getList();
//echo json_encode($list);

//$search = Clientes::search("Jor");
//echo json_encode($search);


$login = new Clientes();

$login->login("jesonel", "123mudar");

echo $login;