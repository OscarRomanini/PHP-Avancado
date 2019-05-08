<?php

require_once "Slq.php";

class Clientes{

    private $id;
    private $nome;
    private $idade;
    private $sexo;
    private $login;
    private $senha;

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login): void
    {
        $this->login = $login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha): void
    {
        $this->senha = $senha;
    }

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
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);

        }

    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM clientes ORDER BY nome");
    }

    public static function search($nome){
        $sql = new Sql();
        return $sql->select("SELECT * FROM clientes WHERE nome LIKE :SEARCH ORDER BY nome", array(
            ":SEARCH" => "%".$nome."%"
        ));
    }

    public function login($login, $senha)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM clientes WHERE login = :LOGIN AND senha = :SENHA ", array(
            ":LOGIN" => $login,
            ":SENHA" => $senha
        ));
        if (count($result) > 0){
            $row = $result[0];
            $this->setId($row['id']);
            $this->setNome($row['nome']);
            $this->setIdade($row['idade']);
            $this->setSexo($row['sexo']);
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);
        }else{
            throw new Exception("Login e/ou senha inválidos!");
        }

    }

    public function __toString()
    {
       return json_encode(array(
            "ID:" => $this->getId(),
            "NOME:" => $this->getNome(),
            "IDADE:" => $this->getIdade(),
            "SEXO:" => $this->getSexo(),
            "LOGIN:" => $this->getLogin(),
            "SENHA:" => $this->getSenha()
       ));
    }



}