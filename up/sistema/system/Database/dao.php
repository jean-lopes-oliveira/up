<?php
    namespace System\Database;
    use \PDO;
    class DAO{
        private const host = "hos";
        private const dbname = "dbname";
        private const username = "usuario";
        private const password = "senha";
        private static $instance = null;
        private function __construct(){


        }
        private static function getConnection(){
            try{

                $conn = new PDO("mysql:host=".self::host.";dbname=".self::dbname."",self::username,self::password);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $conn;
            }catch(\PDOException $e){

                echo $e->getMessage();
                return null;
                
            
            }
        }
        public static function getInstance(){

            if(!isset(self::$instance)){
                self::$instance = self::getConnection(); 
                return self::$instance;
            }else{

                return self::$instance;

            }
            

        }
 
    }
    
?>