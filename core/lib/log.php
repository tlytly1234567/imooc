<?php
namespace core\lib;
use core\imooc;

class log{

      static $class;

       public static function init(){
           $drive = \core\lib\conf::get("drive","log");
           $drive_class = "\\core\\lib\\drive\\log\\".$drive;
           self::$class = new $drive_class;
       }

        public static function log($name){
            self::$class->log($name);
        }





}

