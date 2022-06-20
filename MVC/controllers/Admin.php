<?php 
class Admin extends Controller{
    function action(){
        $action=$this->Model("UserModel");
        $this->View("Masterlayout",[
            "Page"=>"Addproduct"
        ]);
    }
}


?>