<?php 
class Login extends Controller {
public function action(){
$action = $this->model('UserModel');
$this->view('login');
}
public function Logout(){
    unset($_SESSION['name']);
    header("Location:http://localhost/php_mvc/Login");
}
}


?>