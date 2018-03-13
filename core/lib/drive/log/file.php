<?php
namespace core\lib\drive\log;
use \core\lib\conf;
class file{

    public $path;
    public function __construct()
    {
        $this->path = conf::get('option',"log")["path"];

    }

    public function log($message,$file="log"){
        if(!is_dir($this->path)){
            mkdir($this->path,"0777",true);
        }
        $message=date("Y-m-d H:i:s").'   '.$message;
        return file_put_contents($this->path.$file.'.php',json_encode($message).PHP_EOL,FILE_APPEND);

    }


}

