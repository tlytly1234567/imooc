<?php
namespace core;
class  imooc{

    public static $classMap = [];

    public static function run(){
        echo "run";
        $route = new \core\route();
    }


    public static function autoload($class){
        $file = imooc.'\\'.str_replace("/","\\",$class).'.php';
        if(in_array($class,self::$classMap)){
            return false;
        }
        if(is_file($file)){
            include $file;
            self::$classMap[]=$class;
        }else{
            return false;
        }
    }


}