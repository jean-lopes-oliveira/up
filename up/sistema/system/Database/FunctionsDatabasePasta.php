<?php
namespace System\Database;
use \System\Entity\Pasta;
use \System\Database\FunctionsDatabase;
final class FunctionsDatabasePasta extends FunctionsDatabase{
    public function __construct(){
        parent::__construct();

    }
    public function insert($parametros){
        $id = uniqid();
        $nome = $parametros["nome"];
        $ip = $_SERVER["REMOTE_ADDR"];
        $data = Date("Y-m-d H:i:s");
        $compartilhamento = false;
        $idLink = uniqid();
        $fkPessoaIdusu = $_SESSION["usuario"]->getidusu();
        try{
            $stmt = parent::getInstance()->prepare("INSERT INTO pasta(Id_pasta,Nome,IP,Data,Compartilhamento_status,id_unico,fk_Pessoa_Id_usu) VALUES (?,?,?,?,?,?,?)");
            $stmt->bindValue(1,$id,\PDO::PARAM_STR);
            $stmt->bindValue(2,$nome,\PDO::PARAM_STR);
            $stmt->bindValue(3,$ip,\PDO::PARAM_STR);
            $stmt->bindValue(4,$data,\PDO::PARAM_STR);
            $stmt->bindValue(5,$compartilhamento,\PDO::PARAM_BOOL);
            $stmt->bindValue(6,$idLink,\PDO::PARAM_STR);
            $stmt->bindValue(7,$fkPessoaIdusu,\PDO::PARAM_STR);
            $stmt->execute();

            return json_encode(["retorno" =>true, "msg" => "Pasta criada com sucesso"]);
        }catch(\PDOException $e){
            echo $e->getMessage();
            return json_encode(["retorno" =>false, "msg" => "Erro ao criar pasta"]);
        }

    }
    public function delete($parametros){
        $id = $parametros["id"];
        try{
            parent::getInstance()->beginTransaction();
            //$stmt = parent::getInstance()->prepare("DELETE FROM arquivos WHERE fk_Pasta_Id_pasta = ?");
            //$stmt->bindValue(1,$id,\PDO::PARAM_STR);
            //$stmt->execute();
            $stmt =  parent::getInstance()->prepare("DELETE FROM pasta WHERE Id_pasta = ? AND fk_Pessoa_Id_usu = ?");
            $stmt->bindValue(1,$id,\PDO::PARAM_STR);
            $stmt->bindValue(2,$_SESSION["usuario"]->getidusu(),\PDO::PARAM_STR);
            $stmt->execute();
            parent::getInstance()->commit();
            return json_encode(["retorno" => true, "msg" => "Pasta excluída com sucesso"]);
        }catch(\PDOException $e){
            echo $e->getMessage();
            return json_encode(["retorno" => false, "msg" => "Erro ao excluir pasta"]);
        }
    }
    public function select($parametros){
        $fk = $parametros["fk_id_pessoa"];
        $usu = $parametros["id_usu"];
        try{
            $stmt = parent::getInstance()->prepare("SELECT * FROM pasta WHERE fk_Pessoa_Id_usu = ? order by Nome");
            $stmt->bindValue(1,$usu,\PDO::PARAM_STR);
            $stmt->execute();
            $retorno = [];
            while($linha = $stmt->fetch()){
                $obj = new Pasta($linha["Id_pasta"],$linha["Nome"],$linha["IP"],$linha["Data"],$linha["Compartilhamento_status"],$linha["id_unico"],$linha["fk_Pessoa_Id_usu"]);
                $retorno[] = json_decode($obj->getJson());
            }
            return json_encode($retorno);
            
        }catch(\PDOException $e){

            echo $e->getMessage();
            return json_encode(["retorno" => false]);

        }

    }
    public function update($parametros){
        $id = $parametros["id_pasta"];
        $nome = $parametros["nome"];
        try{

            $stmt = parent::getInstance()->prepare("UPDATE pasta SET Nome = ? WHERE Id_pasta = ?");
            $stmt->bindValue(1,$nome,\PDO::PARAM_STR);
            $stmt->bindValue(2,$id,\PDO::PARAM_STR);
            $stmt->execute();
            return true;

        }catch(\PDOException $e){

            echo $e->getMessage();
            return false;

        }

    }


}


?>