<?php
namespace core\lib;
class model extends  \PDO{
    public function __construct()
    {
        $database =  \core\lib\conf::all("database");
        try{
            parent::__construct($database["DSN"], $database["UNM"], $database["PWS"]);
        }catch (\PDOException $e){
            dd($e->getMessage());
        }
    }


}

?>