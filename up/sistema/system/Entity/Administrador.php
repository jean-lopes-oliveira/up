<?php
namespace System\Entity;
use \System\Entity\Pessoa;
final class Administrador extends Pessoa{

    private $idAdmin;
    private $fkPessoaIdUsu;
    public function __construct($idUsu,$nome,$sobrenome,$email,$data,$ipCadastro,$idAdmin,$fkPessoaIdUsu,$ipList){
        parent::__construct($idUsu,$nome,$sobrenome,$email,$data,$ipCadastro,$ipList);
        self::$idAdmin = $idAdmin;
        self::$fkPessoaIdUsu = $fkPessoaIdUsu;
    }


    /**
     * Get the value of fkPessoaIdUsu
     */ 
    public function getFkPessoaIdUsu()
    {
        return $this->fkPessoaIdUsu;
    }

    /**
     * Set the value of fkPessoaIdUsu
     *
     * @return  self
     */ 
    public function setFkPessoaIdUsu($fkPessoaIdUsu)
    {
        $this->fkPessoaIdUsu = $fkPessoaIdUsu;

        return $this;
    }

    /**
     * Get the value of idAdmin
     */ 
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
     * Set the value of idAdmin
     *
     * @return  self
     */ 
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }
}

?>