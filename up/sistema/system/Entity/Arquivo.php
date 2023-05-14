<?php
namespace System\Entity;
class Arquivo{

    private $idArquivo;
    private $nome;
    private $arquivo;
    private $tipo;
    private $data;
    private $idUnico;
    private $ip;
    private $compartilhamentoStatus;
    private $fkPastaIdpasta;
    public function __construct($idArquivo,$nome,$arquivo,$tipo,$ip,$data,$idUnico,$compartilhamentoStatus,$fkPastaIdpasta){
        $this->idArquivo = $idArquivo;
        $this->nome = $nome;
        $this->arquivo = $arquivo;
        $this->tipo = $tipo;
        $this->ip = $ip;
        $this->data = $data;
        $this->idUnico = $idUnico;
        $this->compartilhamentoStatus = $compartilhamentoStatus;
        $this->fkPastaIdpasta = $fkPastaIdpasta;

    }


    /**
     * Get the value of idArquivo
     */ 
    public function getIdArquivo()
    {
        return $this->idArquivo;
    }

    /**
     * Set the value of idArquivo
     *
     * @return  self
     */ 
    public function setIdArquivo($idArquivo)
    {
        $this->idArquivo = $idArquivo;

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
     * Get the value of arquivo
     */ 
    public function getArquivo()
    {
        return $this->arquivo;
    }

    /**
     * Set the value of arquivo
     *
     * @return  self
     */ 
    public function setArquivo($arquivo)
    {
        $this->arquivo = $arquivo;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

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
     * Get the value of idUnico
     */ 
    public function getIdUnico()
    {
        return $this->idUnico;
    }

    /**
     * Set the value of idUnico
     *
     * @return  self
     */ 
    public function setIdUnico($idUnico)
    {
        $this->idUnico = $idUnico;

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
     * Get the value of fkPastaIdpasta
     */ 
    public function getFkPastaIdpasta()
    {
        return $this->fkPastaIdpasta;
    }

    /**
     * Set the value of fkPastaIdpasta
     *
     * @return  self
     */ 
    public function setFkPastaIdpasta($fkPastaIdpasta)
    {
        $this->fkPastaIdpasta = $fkPastaIdpasta;

        return $this;
    }
    public function getJson(){

        $retorno = ["id_arquivo" => $this->idArquivo, "nome" => $this->nome,"tipo" => $this->tipo,"ip" => $this->ip,"data" => $this->data, "id_unico" => $this->idUnico, "status" => $this->compartilhamentoStatus, "fk_pasta" => $this->fkPastaIdpasta];
        return json_encode($retorno);
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
}

?>