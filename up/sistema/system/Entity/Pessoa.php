<?php
namespace System\Entity;
abstract class Pessoa{
    private $idUsu;
    private $nome;
    private $sobrenome;
    private $email;
    private $data;
    private $ipCadastro;
    private $ipList;
    protected function __construct($idUsu,$nome,$sobrenome,$email,$data,$ipCadastro,$ipList){
        $this->idUsu = $idUsu;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->data = $data;
        $this->ipCadastro = $ipCadastro;
        $this->ipList = $ipList;
    }
    public function setIdUsu($idUsu){

        $this->idUsu = $idUsu;

    }
    public function getIdUsu(){
        return $this->idUsu;

    }

    public function setNome($nome){

        $this->nome = $nome;

    }
    public function getNome(){
        return $this->nome;

    }

    public function setSobrenome($sobrenome){

        $this->sobrenome = $sobrenome;

    }
    public function getSobrenome(){
        return $this->sobrenome;

    }

    public function setEmail($email){

        $this->email = $email;

    }
    public function getEmail(){
        return $this->email;

    }

    public function setData($data){

        $this->data = $data;

    }
    public function getData(){
        return $this->data;

    }

    public function setIpCadastro($ipCadastro){

        $this->ipCadastro = $ipCadastro;

    }
    public function getIpCadastro(){
        return $this->ipCadastro;

    }
    public function setIpList($lista){
        $this->ipList = $lista;

    }
    public function getIpList(){
        return $this->ipList;

    }
}

?>