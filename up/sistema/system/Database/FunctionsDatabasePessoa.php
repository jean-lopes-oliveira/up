<?php
namespace System\Database;
use \System\Database\FunctionsDatabase;
use \System\Entity\Usuario;
use \System\Entity\IP;
final class FunctionsDatabasePessoa extends FunctionsDatabase{
    public function __construct(){
        parent::__construct();
    }
    private function getSalt(){
        $string = [];
        $char = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6","7","8","9"];
        for($i = 0; $i <22;$i++){

            array_push($string,$char[rand(0,61)]);

        }
        $valor = implode("",$string);
        return $valor;

    }
    public function insert($parametros){
        try{
            $id = uniqid();
            $custo = '12';
            $salt = $this->getSalt();
            $hash = crypt($parametros["senha"], '$2a$' . $custo . '$' . $salt . '$');
            $ip = $_SERVER["REMOTE_ADDR"];
            $data = date("Y-m-d H:i:s");
            $id2 = uniqid();
            parent::getInstance()->beginTransaction();
            $stmt = parent::getInstance()->prepare("SELECT * FROM pessoa WHERE Email = ?");
            $stmt->bindValue(1,$parametros["email"],\PDO::PARAM_STR);
            $stmt->execute();
            $fetch = $stmt->fetchAll();
            $valor = count($fetch);
            if($valor < 1){
                
                $stmt = parent::getInstance()->prepare("INSERT INTO pessoa(Id_usu,Nome,Sobrenome,Email,Senha,Data,IP_cadastro) VALUES (?,?,?,?,?,?,?)");
                $stmt->bindValue(1,$id,\PDO::PARAM_STR);
                $stmt->bindValue(2,$parametros["nome"],\PDO::PARAM_STR);
                $stmt->bindValue(3,$parametros["sobrenome"],\PDO::PARAM_STR);
                $stmt->bindValue(4,$parametros["email"],\PDO::PARAM_STR);
                $stmt->bindValue(5,$hash,\PDO::PARAM_STR);
                $stmt->bindValue(6,$data,\PDO::PARAM_STR);
                $stmt->bindValue(7,$ip,\PDO::PARAM_STR);
                $stmt->execute();
                $stmt = parent::getInstance()->prepare("INSERT INTO usuario(id_usu,telefone,fk_Pessoa_Id_usu) VALUES (?,?,?)");
                $stmt->bindValue(1,$id2,\PDO::PARAM_STR);
                $stmt->bindValue(2,$parametros["telefone"],\PDO::PARAM_STR);
                $stmt->bindValue(3,$id,\PDO::PARAM_STR);
                $stmt->execute();
                parent::getInstance()->commit();
                $retorno = ["retorno"=> true, "msg" => "Cadastro concluido com sucesso","func" => "cad"];
                return json_encode($retorno);
            }else{
                parent::getInstance()->commit();
                return json_encode(["retorno" => false,"msg" => "E-mail consta em nossa base de dados.Utilize outro e-mail.","func" => "cad"]);
            }
            
            
        }catch(\PDOException $e){
            parent::getInstance()->rollBack();
            return json_encode(["retorno" => false,"msg" => "Erro ao tentar realizar o cadastro.","func" => "cad"]);

        }
        
        
    }
    public function delete($parametros){
        try{
            parent::getInstance()->beginTransaction();
            $stmt = parent::getInstance()->prepare("DELETE FROM usuario where id_usu = ?");
            $stmt->bindValue(1,$parametros["id_usuario"],\PDO::PARAM_STR);
            $stmt->execute();
            $stmt = parent::getInstance()->prepare("DELETE FROM pessoa where Id_usu = ?");
            $stmt->bindValue(1,$parametros["id_pessoa"],\PDO::PARAM_STR);
            $stmt->execute();
            parent::getInstance()->commit();
            return true;
        }catch(\PDOException $e){
            parent::getInstance()->rollBack();
            $e->getMessage();
            return false;
        }
        
    }
    public function select($parametros){
        try{
            $stmt = parent::getInstance()->query("SELECT * FROM pessoa p, usuario u WHERE p.Id_usu = u.fk_Pessoa_Id_usu and p.email like '%?%'");
            $stmt->bindValue(1,$parametros["email"],\PDO::PARAM_STR);
            $retorno = [];
            while($linha = $stmt->fetch(\PDO::FETCH_ASSOC)){
                $obj = new Usuario($linha["p.Id_usu"],$linha["p.Nome"],$linha["p.Sobrenome"],$linha["p.Email"],$linha["p.Data"],$linha["p.IP_cadastro"],$linha["u.id_usu"],$linha["u.telefone"],$linha["u.fk_Pessoa_Id_usu"],self::listIP($linha["p.Id_usu"]));
                $retorno[] = $obj;
            }
            return $retorno;
        }catch(\PDOException $e){

            echo $e->getMessage();
            return false;
    }

    }
    public function update($parametros){
        try{
            $stmt = parent::getInstance()->prepare("UPDATE usuario u, pessoa p SET p.Nome = ?, p.Sobrenome = ?, p.Email = ? , u.Telefone = ? WHERE u.id_usu = ? AND p.Id_usu = ?");
            $stmt->bindValue(1,$parametros["nome"],\PDO::PARAM_STR);
            $stmt->bindValue(2,$parametros["sobrenome"],\PDO::PARAM_STR);
            $stmt->bindValue(3,$parametros["email"],\PDO::PARAM_STR);
            $stmt->bindValue(4,$parametros["telefone"],\PDO::PARAM_STR);
            $stmt->bindValue(5,$parametros["id_usu"],\PDO::PARAM_STR);
            $stmt->bindValue(6,$parametros["id_pessoa"],\PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }catch(\PDOException $e){
            
            echo $e->getMessage();
            return false;

        }
    }
    public function entrar($email,$senha){

       
        try{
            parent::getInstance()->beginTransaction();
            $stmt = parent::getInstance()->prepare("SELECT * FROM pessoa AS p, usuario AS u WHERE p.Id_usu = u.fk_Pessoa_Id_usu AND p.Email = :email" );
            $stmt->bindValue("email",$email);
            $stmt->execute();
            if(count($stmt->fetchAll()) == 1){

                $stmt2 = parent::getInstance()->prepare("SELECT p.Id_usu as id_pessoa, p.Senha as senha, p.Nome as nome, p.Sobrenome as sobrenome, p.Email as email , p.Data as data,p.IP_cadastro as ip, u.id_usu as id_usu,u.Telefone as telefone, u.fk_Pessoa_Id_usu as fk_pessoa FROM pessoa AS p, usuario AS u WHERE p.Id_usu = u.fk_Pessoa_Id_usu AND p.Email = :email");
                $stmt2->bindValue("email",$email);
                $stmt2->execute();
                while($s = $stmt2->fetch()){
                    //print_r($s);
                    $id = $s["id_pessoa"];
                    $s2 = $s["senha"];
                    if(crypt($senha,$s2) == $s2){
                        $usuario = new Usuario($s["id_pessoa"],$s["nome"],$s["sobrenome"],$s["email"],$s["data"],$s["ip"],$s["id_usu"],$s["telefone"],$s["fk_pessoa"],$this->listIP($s["id_pessoa"]));
                        session_regenerate_id(true);
                        $_SESSION["usuario"] = $usuario;
                        $f = parent::getInstance()->prepare("INSERT INTO ip(ip,FK_Pessoa_Id_usu) VALUES(?,?)");
                        $f->bindValue(1,$_SERVER["REMOTE_ADDR"],\PDO::PARAM_STR);
                        $f->bindValue(2,$id,\PDO::PARAM_STR);
                        $f->execute();
                        parent::getInstance()->commit();
                        $retorno = ["retorno" => true,"msg" => "Usuário validado","func" => "entrar"];
                        return json_encode($retorno);
                    }else{

                        parent::getInstance()->commit();
                        $retorno = ["retorno" => false,"msg"=>"Username ou senha inválido", "func" => "entrar"];
                        return json_encode($retorno);
                    }
                
                }
            }else{
                $retorno = ["retorno" => false,"msg"=>"Username ou senha inválido1", "func" => "entrar"];
                return json_encode($retorno);


            }
            
            
        }catch(\PDOException $e){
            self::getInstance()->rollBack();
            $retorno = ["retorno" => false, "msg" => "Erro ao tentar acessa  a conta","func" => "entrar"];
            echo $e->getMessage();
            return json_encode($retorno);

        }
    }
    public function sair(){
        
        unset($_SESSION["usuario"]);
        session_destroy();
        return json_encode(["retorno" => true,"func" => "sair"]);
        
    }
    private function listIP($idPessoa){
        try{
            $stmt = parent::getInstance()->prepare("SELECT * FROM ip WHERE FK_Pessoa_Id_usu = :id_pessoa");
            $stmt->bindValue("id_pessoa",$idPessoa);
            $stmt->execute();
            $listaIp = [];
            while($linha = $stmt->fetch()){

                $listaIp[] = new IP($linha["id_ip"],$linha["ip"],$linha["FK_Pessoa_Id_usu"]); 

            }
            return $listaIp;

        }catch(\PDOException $e){
            echo $e->getMessage();
            return false;

        }
    }
   

}

?>