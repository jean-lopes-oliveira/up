<?php
namespace System\Entity;
class IP{
    private $idIp;
    private $ip;
    private $FKPessoaIdusu;
    public function __construct($idIp,$ip,$FKPessoaIdusu){
        $this->idIp = $idIp;
        $this->ip = $ip;
        $this->FKPessoaIdusu = $FKPessoaIdusu;

    }
    public function setIdIp($idIp){
        $this->idIp =$idIp;

    }
    public function getIdIp(){

        return $this->idIp;

    }
    public function setIp($ip){

        $this->ip = $ip;

    }
    public function getIp(){
        return $this->ip;

    }
    public function setFKPessoaIdusu($fk){

        $this->FKPessoaIdusu = $fk;

    }
    public function getFKPessoaIdusu(){

        return $this->FKPessoaIdusu;

    }


}

?>