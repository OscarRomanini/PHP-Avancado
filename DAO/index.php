<?php

require_once "class/Clientes.php";

$cli = new Clientes();
// $cli->loadById(1);

//$list = Clientes::getList();
//echo json_encode($list);

//$search = Clientes::search("Jor");
//echo json_encode($search);


//$login = new Clientes();
//$login->login("jesonel", "123mudar");
//echo $login;

//$cli->setNome("Jonono");
//$cli->setIdade("20");
//$cli->setSexo("M");
//$cli->setLogin("jonono");
//$cli->setSenha("123j");
//$cli->insert();

/*
$result = Clientes::getList();
echo json_encode($result);
*/

$cli = new Clientes();
$cli->loadById(2);
$cli->update("Lourival","33", "M", "romo" ,"123");
