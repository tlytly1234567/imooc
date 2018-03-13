<?php
namespace core\lib;
use core\imooc;

class conf{
    protected static $fileArr = [];

    public static function get($name,$file_name){
        $file = imooc."\\core\\config\\".$file_name.".php";
        if(isset(self::$fileArr[$file_name])){
            return self::$fileArr[$file_name][$name];
        }
        if(is_file($file)){
            $config = include $file;
            if(isset($config[$name])){
                  self::$fileArr[$file_name] =$config;
                    return $config[$name];
            }else{
                throw new \Exception("没有这个配置项");
            }
        }else{
            throw new \Exception("没有这个配置文件");
        }
    }

    public static function all($file_name){
        $file = imooc."\\core\\config\\".$file_name.".php";
        if(isset(self::$fileArr[$file_name])){
            return self::$fileArr[$file_name];
        }
        if(is_file($file)){
            self::$fileArr[$file_name] = $file;
            $config = include $file;
            return $config;
        }else{
            throw new \Exception("没有这个配置文件");
        }
    }




}
