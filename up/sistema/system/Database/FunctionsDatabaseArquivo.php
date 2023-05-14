<?php
namespace System\Database;
use \System\Database\FunctionsDatabase;
use \System\Entity\Arquivo;
final class FunctionsDatabaseArquivo extends FunctionsDatabase{
    public function __construct(){

        parent::__construct();
        
    }
    
    public function insert($parametros){
        $id = uniqid();
        $ip = $_SERVER["REMOTE_ADDR"];
        $data = Date("Y-m-d H:i:s");
        $idUnic = uniqid();
        try{

            $stmt = parent::getInstance()->prepare("INSERT INTO arquivos(id_arquivo,Nome,Arquivo,Tipo,IP,Data,Id_unico,Compartilhamento_status,fk_Pasta_id_pasta,tamanho) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindValue(1,$id,\PDO::PARAM_STR);
            $stmt->bindValue(2,$parametros["nome"],\PDO::PARAM_STR);
            $stmt->bindValue(3,$parametros["arquivo"],\PDO::PARAM_STR);
            $stmt->bindValue(4,$parametros["tipo"],\PDO::PARAM_STR);
            $stmt->bindValue(5,$ip,\PDO::PARAM_STR);
            $stmt->bindValue(6,$data,\PDO::PARAM_STR);
            $stmt->bindValue(7,$idUnic,\PDO::PARAM_STR);
            $stmt->bindValue(8,$parametros["status"],\PDO::PARAM_BOOL);
            $stmt->bindValue(9,$parametros["fk_pasta_id"],\PDO::PARAM_STR);
            $stmt->bindValue(10,$parametros["tamanho"],\PDO::PARAM_STR);
            $stmt->execute();
            return json_encode(["retorno" =>true]);
        }catch(\PDOException $e){
            echo $e->getMessage();
            return json_encode(["retorno" =>false]);

        }


    }
    public function delete($parametros){
        try{

            $stmt = parent::getInstance()->prepare("DELETE FROM arquivos WHERE id_arquivo = ?");
            $stmt->bindValue(1,$parametros["id_arquivo"],\PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }catch(\PDOException $e){

            echo $e->getMessage();
            return false;

        }
    }
    public function select($parametros){
        try{

            $stmt = parent::getInstance()->prepare("SELECT a.id_arquivo as id_arquivo, a.Nome as nome, a.Tipo as tipo, a.IP as ip, a.Data as data,a.Id_unico as id_unico, a.Compartilhamento_status as status,a.fk_Pasta_Id_pasta as fk_pasta FROM arquivos a, usuario u ,pasta p WHERE a.fk_Pasta_Id_pasta = p.Id_pasta AND u.id_usu = ? AND p.Id_pasta = ?");
            $stmt->bindValue(1,$_SESSION["usuario"]->getidusu(),\PDO::PARAM_STR);
            $stmt->bindValue(2,$parametros["id-pasta"],\PDO::PARAM_STR);
            $stmt->execute();
            $retorno = [];
            while($linha = $stmt->fetch()){

                $obj = new Arquivo($linha["id_arquivo"],$linha["nome"],null,$linha["tipo"],$linha["ip"],$linha["data"],$linha["id_unico"],$linha["status"],$linha["fk_pasta"]);
                $retorno[] = json_decode($obj->getJson());

            }
            return json_encode($retorno);

        }catch(\PDOException $e){
            echo $e->getMessage();
            return json_encode(["retorno" => false]);

        }
    }
    public function getArquivo($parametros){
        try{

            $stmt = parent::getInstance()->prepare("SELECT a.id_arquivo as id_arquivo,a.Arquivo as arquivo, a.Nome as nome, a.Tipo as tipo, a.IP as ip, a.Data as data,a.Id_unico as id_unico, a.Compartilhamento_status as status,a.fk_Pasta_Id_pasta as fk_pasta,a.tamanho as tam FROM arquivos as a, pasta as p, usuario as u WHERE a.id_arquivo = ? AND p.Id_pasta = ? AND u.id_usu = ?");
            $stmt->bindValue(1,$parametros["id-arquivo"],\PDO::PARAM_STR);
            $stmt->bindValue(2,$parametros["id-pasta"],\PDO::PARAM_STR);
            $stmt->bindValue(3,$_SESSION["usuario"]->getidusu(),\PDO::PARAM_STR);
            $stmt->execute();
            
                while($linha = $stmt->fetch()){
                    
                    header("Content-Type: application/xml;");
                    header("Content-Type:text/xml; charset=utf-8");
                    header('Content-Description: File Transfer');
                    header('Content-Disposition: attachment; filename="'.$linha["nome"].'"');
                    header('Content-Type: application/octet-stream');
                    header('Content-Transfer-Encoding: binary');
                    header('Content-Length: ' .$linha["tam"]);
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Pragma: public');
                    header('Expires: 0');
                    print($linha["arquivo"]);
                }
            
            

        }catch(\PDOException $e){
            echo $e->getMessage();
            return json_encode(["retorno" => false]);

        }
    }
    public function update($parametros){

        try{

            $stmt = parent::getInstance()->prepare("UPDATE arquivos SET Nome = ? WHERE id_arquivo = ?");
            $stmt->bindValue(1,$parametros["nome"],\PDO::PARAM_STR);
            $stmt->bindValue(2,$parametros["id_arquivo"],\PDO::PARAM_STR);
            $stmt->execute();
            return true;

        }catch(\PDOException $e){

            echo $e->getMessage();
            return false;

        }

    }

}

?>