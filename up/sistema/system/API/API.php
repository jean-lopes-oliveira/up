<?php
namespace System\API;
require_once "./../../vendor/autoload.php";
 use \System\Database\FunctionsDatabasePasta;
 use \System\Database\FunctionsDatabasePessoa;
 use \System\Database\FunctionsDatabaseArquivo;
 use \System\Entity\Usuario;
 class API{
    public static function getJson(){
        $func = new FunctionsDatabasePessoa();
        $get = filter_input(INPUT_GET,"func",FILTER_SANITIZE_SPECIAL_CHARS);
        $idPasta = filter_input(INPUT_GET,"id-pasta",FILTER_SANITIZE_SPECIAL_CHARS);
        $idArquivo = filter_input(INPUT_GET,"id-arquivo",FILTER_SANITIZE_SPECIAL_CHARS);
        $pasta = new FunctionsDatabasePasta();
        $arquivo = new FunctionsDatabaseArquivo();
            if(isset($get)){
                session_start();
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if($get === "cadastro"){
                        $nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
                        $sobrenome = filter_input(INPUT_POST,"sobrenome",FILTER_SANITIZE_SPECIAL_CHARS);
                        $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
                        $senha = filter_input(INPUT_POST,"senha",FILTER_SANITIZE_SPECIAL_CHARS);
                        $telefone = filter_input(INPUT_POST,"telefone",FILTER_SANITIZE_SPECIAL_CHARS);
                        $parametros = ["nome"=>$nome, "sobrenome" => $sobrenome,"email" => $email, "senha" => $senha, "telefone" => $telefone];
                        $resultado = $func->insert($parametros);
                        header("Content-Type: application/json;");
                        echo $resultado;

                    }else if($get === "entrar" && (!isset($_SESSION["usuario"]))){
                        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
                        $senha = filter_input(INPUT_POST,"senha2", FILTER_SANITIZE_SPECIAL_CHARS);
                        $resultado = $func->entrar($username,$senha);
                        header("Content-Type: application/json;");
                        echo $resultado;

                    }else if($get === "criar-pasta" && isset($_SESSION["usuario"])){
                        $parametros = ["nome" =>filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS),"id_usu" => $_SESSION["usuario"]->getidusu()];
                        echo $pasta->insert($parametros);

                    }else if($get === "upload" && isset($_SESSION["usuario"])){
                            
                            $arq = $_FILES["arquivos"]["tmp_name"];
                            $file = fopen($arq,"r");
                            $size = $_FILES["arquivos"]["size"];
                            $conteudo = fread($file,$size);
                            $parametros = ["nome" => $_FILES["arquivos"]["name"],"arquivo" => $conteudo,"tipo" => $_FILES["arquivos"]["type"], "status" => false,"fk_pasta_id" =>filter_input(INPUT_POST,"id-pasta",FILTER_SANITIZE_SPECIAL_CHARS),"tamanho"=>$_FILES["arquivos"]["size"]];
                            fclose($file);
                            echo $arquivo->insert($parametros);
                            
                        

                    }else if($get === "excluir-pasta" && isset($_SESSION["usuario"])){
                        $id = filter_input(INPUT_POST,"id-pasta",FILTER_SANITIZE_SPECIAL_CHARS);
                        header("Content-Type: application/json;");
                        $parametros = ["id" => $id];
                        echo $pasta->delete($parametros);

                    }else{
                        
                        header("Content-Type: application/json;");
                        $retorno = ["retorno" => false, "msg" =>"Erro", "func" => "entrar"];
                        echo json_encode($retorno);

                    }

                }else if($get === "get-arquivo" && isset($idArquivo) && isset($idPasta) && isset($_SESSION["usuario"])){
                    $parametros =["id-arquivo" =>$idArquivo,"id-pasta" => $idPasta];
                    $arquivo->getArquivo($parametros);

                }else if($get === "listar-arquivos" && isset($idPasta) && isset($_SESSION["usuario"])){
                    $parametros = ["id-pasta" =>$idPasta];
                    header("Content-Type: application/json;");
                    echo $arquivo->select($parametros);

                }else if($get === "listar-pasta" && isset($_SESSION["usuario"])){
                    header("Content-Type: application/json;");
                    $parametros = ["id_usu" => $_SESSION["usuario"]->getidusu(),"fk_id_pessoa" => $_SESSION["usuario"]->getFkPessoaIdUsu()];
                    echo $pasta->select($parametros);

                }else if($get === "sair"  && isset($_SESSION["usuario"])){
                    header("Content-Type: application/json;");
                    $retorno = $func->sair();
                    echo $retorno;
            
                }
            }else{ echo "erro1";}

        }  
 }
 API::getJson();
?>