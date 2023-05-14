<?php
namespace System\Entity;
use \System\Entity\Pessoa;
final class Usuario extends Pessoa{
        private $idusu;
        private $telefone;
        private $fkPessoaIdUsu;
        public function __construct($idUsu,$nome,$sobrenome,$email,$data,$ipCadastro,$idusu,$telefone,$fkPessoaIdUsu,$ipList){
            parent::__construct($idUsu,$nome,$sobrenome,$email,$data,$ipCadastro,$ipList);
            $this->idusu = $idusu;
            $this->telefone = $telefone;
            $this->fkPessoaIdUsu = $fkPessoaIdUsu;
        }
        public function setidusu($idusu){
            $this->idusu = $idusu;

        }
        public function getidusu(){

            return $this->idusu;

        }
        
        public function setTelefone($telefone){
            $this->telefone = $telefone;

        }
        public function getTelefone(){

            return $this->telefone;

        }
        
        public function setFkPessoaIdUsu($fkPessoaIdUsu){
            $this->fkPessoaIdUsu = $fkPessoaIdUsu;

        }
        public function getFkPessoaIdUsu(){

            return $this->fkPessoaIdUsu;

        }
        
}
?>