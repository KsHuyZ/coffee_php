<?php 

class Home extends Controller {
    
    function action(){
 $action =$this->Model("UserModel");

       //Views
 $homepage = "home";
 $user=$action->AllUser();
 if(isset($_SESSION['name'])){
     if($_SESSION['name']['isAdmin']==1){
$homepage= "Admin";
     }
     }
       $this->View("Masterlayout",
       [
           "Page"=>$homepage,
           "User"=>$user
          ]         
   );
    }
 function managerproduct(){
     $action=$this->Model("UserModel");
     if(isset($_SESSION['name'])&&$_SESSION['name']['isAdmin']==1){
     $this->View("Masterlayout",[
         "Page"=>"Managerproduct",
         "List"=> $action->ListCoffee(),
         "Trash"=>$action->TrashList(),
         "Type"=>$action->ShowListType()
     ]);
    }else{
        $this->View("404");
    }
 }
 function managertype(){
     $action=$this->Model("UserModel");

   if(isset($_SESSION['name'])&&$_SESSION['name']['isAdmin']==1){
    $this->View("Masterlayout",[
        "Page"=>"ManagerUser",
        "Type"=>$action->ShowListType(),
    ]);
   }
   else{
       $this->View("404");
   }
 }
 function managerorder(){
     $action = $this->Model("UserModel");
     if(isset($_SESSION['name'])&&$_SESSION['name']['isAdmin']==1){
     $this->View("Masterlayout",[
         "Page"=>"ManagerOrder",
     ]);
    }
    else{
        $this->View("404");
    }
 }

    function Show($a,$b){
        //Model
        $teo=$this->Model("UserModel");
        $tong = $teo->Tong($a,$b);
        //Views
        $this->View("Aodep",
        [
            "Number"=>$tong,
            "Page"=>"news",
            "SV"=>$teo->SV()]
            
    );
    }
}
?>