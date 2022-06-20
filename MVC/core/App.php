<?php 
class App{

    protected $controller="Home";
    protected $action="action";
    protected $params=[];
    public function __construct(){
        // Array ( [0] => abcd [1] => 123 [2] => hoem )
 $arr = $this->Urlprocess();
//Xu ly controller
    if(file_exists("./mvc/controllers/".$arr[0].".php")){
        $this->controller = $arr[0];
        unset($arr[0]);
       
       
     }
     else{
         $this->controller="Er";
     }
     require_once "./mvc/controllers/".$this->controller.".php";
      
     
     $this->controller = new $this->controller;
//Xu ly action
if(isset($arr[1])){
    if(method_exists($this->controller,$arr[1])){
$this->action = $arr[1];
    }
    unset($arr[1]);
}

//Xu ly params
$this->params = $arr?array_values($arr):[];

call_user_func_array([$this->controller,$this->action],$this->params);

    }
    public function Urlprocess(){
        //abcd/123/hoem
        if(isset($_GET['url'])){
         return   explode("/",filter_var(trim($_GET['url'],"/")));

        }
    }
}

?>