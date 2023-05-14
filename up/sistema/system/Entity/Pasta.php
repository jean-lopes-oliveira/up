<?php
namespace System\Entity;
class Pasta{

    private $idPasta;
    private $nome;
    private $ip;
    private $data;
    private $compartilhamentoStatus;
    private $idUnic;
    private $fkPessoaIdusu;
    public function __construct($idPasta,$nome,$ip,$data,$compartilhamentoStatus,$idUnic,$fkPessoaIdusu){
        $this->idPasta = $idPasta;
        $this->nome = $nome;
        $this->ip = $ip;
        $this->data = $data;
        $this->compartilhamentoStatus = $compartilhamentoStatus;
        $this->idUnic = $idUnic;
        $this->fkPessoaIdusu = $fkPessoaIdusu;
    }

    /**
     * Get the value of idPasta
     */ 
    public function getIdPasta()
    {
        return $this->idPasta;
    }

    /**
     * Set the value of idPasta
     *
     * @return  self
     */ 
    public function setIdPasta($idPasta)
    {
        $this->idPasta = $idPasta;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of ip
     */ 
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set the value of ip
     *
     * @return  self
     */ 
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of compartilhamentoStatus
     */ 
    public function getCompartilhamentoStatus()
    {
        return $this->compartilhamentoStatus;
    }

    /**
     * Set the value of compartilhamentoStatus
     *
     * @return  self
     */ 
    public function setCompartilhamentoStatus($compartilhamentoStatus)
    {
        $this->compartilhamentoStatus = $compartilhamentoStatus;

        return $this;
    }

    /**
     * Get the value of idUnic
     */ 
    public function getIdUnic()
    {
        return $this->idUnic;
    }

    /**
     * Set the value of idUnic
     *
     * @return  self
     */ 
    public function setIdUnic($idUnic)
    {
        $this->idUnic = $idUnic;

        return $this;
    }

    /**
     * Get the value of fkPessoaIdusu
     */ 
    public function getFkPessoaIdusu()
    {
        return $this->fkPessoaIdusu;
    }

    /**
     * Set the value of fkPessoaIdusu
     *
     * @return  self
     */ 
    public function setFkPessoaIdusu($fkPessoaIdusu)
    {
        $this->fkPessoaIdusu = $fkPessoaIdusu;

        return $this;
    }
    public function getJson(){
        $retorno = ["idPasta" => $this->idPasta,"nome" => $this->nome,"ip" => $this->ip,"data" =>$this->data,"status"=>$this->compartilhamentoStatus,"id_unico" => $this->idUnic,"fk_pessoa_id_usu" => $this->fkPessoaIdusu];
        return json_encode($retorno);
    }
}
?>