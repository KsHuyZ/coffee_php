<?php 
class Product extends Controller {
    function action(){
$action = $this->Model('UserModel');
$this->view("Masterlayout",[
    "List"=> $action->ListCoffee(),
    "type"=>$action->ShowListType(),
    "Page"=>"Product",
]);
    }
    public function detail($id){
$action = $this->Model('UserModel');
$this->view("Masterlayout",[
    "Product"=>$action->getProductbyID($id),
    "Page"=>"detailproduct",
]);
    }
}

?>