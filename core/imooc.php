<?php
namespace core;
class  imooc{

    public static $classMap = [];

    public static function run(){
        $route = new \core\lib\route();
        $ctrl    = $route->ctrl;
        $action  = $route->action;

        $ctrlFile = app."\\ctrl\\".str_replace("/","\\",ucfirst($ctrl))."Ctrl".".php";
        if(is_file($ctrlFile)){
            include $ctrlFile;
         }else{
            throw new \Exception("没有找到控制器");
        }
        $ctrl = "\\app\\ctrl\\".ucfirst($ctrl)."Ctrl";
        (new $ctrl)->$action();
        \core\lib\log::init();
        \core\lib\log::log("ctrl:".$route->ctrl."    "."action:".$action);


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

    public function render($view,$data=[]){
        if(!empty($data)){
            extract($data);
        }
        $view_file = app."\\views\\".$view.".php";
        if(is_file($view_file)){
            include $view_file;
        }else{
            throw new \Exception("没有找到视图文件");
        }

    }


}