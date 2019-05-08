<?php

require_once "Slq.php";

class Clientes{

    private $id;
    private $nome;
    private $idade;
    private $sexo;

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo): void
    {
        $this->sexo = $sexo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($idade): void
    {
        $this->idade = $idade;
    }

    public function loadById($id){
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM clientes WHERE id = :ID", array(
            ":ID" => $id
        ));
        if (count($result) > 0){
            $row = $result[0];
            $this->setId($row['id']);
            $this->setNome($row['nome']);
            $this->setIdade($row['idade']);
            $this->setSexo($row['sexo']);
        }

    }

    public function __toString()
    {
       return json_encode(array(
            "ID:" => $this->getId(),
            "NOME:" => $this->getNome(),
            "IDADE:" => $this->getIdade(),
            "SEXO:" => $this->getSexo()
       ));
    }


}