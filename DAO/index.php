<?php

require_once "class/Clientes.php";

$cli = new Clientes();

$cli->loadById(1);

echo $cli;
