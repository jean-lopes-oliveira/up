<?php
namespace System\Database;
use \System\Database\DAO;
abstract class FunctionsDatabase{
    private static $connection;
    protected function __construct(){

        self::$connection = DAO::getInstance();
    }
    abstract public function insert($parametros);
    abstract public function delete($parametros);
    abstract public function select($parametros);
    abstract public function update($parametros);
    protected static function getInstance(){
        
        return self::$connection;

    }

}


?>