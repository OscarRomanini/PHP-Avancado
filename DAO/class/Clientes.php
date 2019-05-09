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
            $this->setData($result[0]);
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
           $this->setData($result[0]);
        }else{
            throw new Exception("Login e/ou senha inválidos!");
        }
    }

    public function insert(){
        $sql = new Sql();
        $result =  $sql->select("CALL clientes_insert(:NOME, :SEXO, :IDADE, :LOGIN, :SENHA)",array(
            ":NOME" => $this->getNome(),
            ":IDADE" => $this->getIdade(),
            ":SEXO" => $this->getSexo(),
            ":LOGIN" => $this->getLogin(),
            ":SENHA" => $this->getSenha()
        ));
        if (count($result) > 0){
            $this->setData($result[0]);
        }
    }

    public function update($nome, $idade, $sexo, $login, $senha){
        $this->setNome($nome);
        $this->setIdade($idade);
        $this->setSexo($sexo);
        $this->setLogin($login);
        $this->setSenha($senha);

        $sql = new Sql();

        $sql->query("UPDATE clientes SET nome = :NOME, idade = :IDADE, sexo = :SEXO, login = :LOGIN
        , senha = :SENHA WHERE id = :ID",array(
            ":ID" => $this->getId(),
            ":NOME" => $this->getNome(),
            ":IDADE" => $this->getIdade(),
            ":SEXO" => $this->getSexo(),
            ":LOGIN" => $this->getLogin(),
            ":SENHA" => $this->getSenha()
        ));
    }

    public function setData($data){
        $this->setId($data['id']);
        $this->setNome($data['nome']);
        $this->setIdade($data['idade']);
        $this->setSexo($data['sexo']);
        $this->setLogin($data['login']);
        $this->setSenha($data['senha']);
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