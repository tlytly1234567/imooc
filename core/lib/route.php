<?php
namespace core\lib;
class route{

    public $ctrl;
    public $action;

   public function __construct()
   {
       if(isset($_SERVER["REQUEST_URI"])&&$_SERVER["REQUEST_URI"]!="/")
      {
          $r_url =$_SERVER["REQUEST_URI"];
          $url_arr =explode("/",$r_url);
          if(isset($url_arr[1])&&!empty($url_arr[1])){
              $this->ctrl = $url_arr[1];
          }else{
              $this->ctrl = "index";
          }
          if(isset($url_arr[2])&&!empty($url_arr[2])){
              $this->action = $url_arr[2];
          }else{
              $this->action = "index";
          }

      }else{
           $def_route  =  \core\lib\conf::get("def_route","route");
           $this->ctrl = $def_route["ctrl"];
           $this->action =  $def_route["action"];
       }
   }


}


