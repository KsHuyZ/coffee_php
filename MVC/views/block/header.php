<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php_mvc/public/css/header.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="http://localhost/php_mvc/public/image/coffee-cup (3).png" />
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script> 
</head>

<body>
    <header>
<div class="menu">
    <div class="logo">
COFFEE SHOP
    </div>

    <nav>
<ul class="nav_link">
    <?php 
  if(!isset($_SESSION['name'])||$_SESSION['name']['isAdmin']==0){
?>
    <li> <a href="http://localhost/php_mvc/Home">
    Home
</a></li>
    <li> <a href="http://localhost/php_mvc/Product">
   Order online
</a></li>
    <?php
  }else if($_SESSION['name']['isAdmin']==1){
      ?>

    <li> <a href="http://localhost/php_mvc/home/managerproduct">
  Manager Product
</a></li>

    <li> <a href="http://localhost/php_mvc/home/managertype">
Manager Type
</a></li>
    <li> <a href="http://localhost/php_mvc/home/managerorder">
Manager Order
</a></li>
    <?php
  }
  ?>
     </ul>
<div class="burger">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
</div>
    </nav>
    <nav class="Other">
  <?php  if(!isset($_SESSION['name'])||$_SESSION['name']['isAdmin']==0){
    echo '    <a class="iconcart">
    <ion-icon name="cart-outline"></ion-icon>
</a>';
    } ?>
<a href="/php_mvc/Login/Logout" class="Login" onclick="Logout()">
<?php 
    if(isset($_SESSION['name'])){?>
    <img class="iconlogin" src="http://localhost/php_mvc/public/image/<?php print_r($_SESSION['name']['Image']);?>" />
<?php
    }
    else{
       ?>
       <ion-icon class="iconuser" name="person-outline"></ion-icon>
       <?php 
} ?>
    <p class="Sign">
<?php
    if(isset($_SESSION['name'])) 
    { 
print_r($_SESSION['name']['FullName']);
    }
?>
    </p>
</a>
<input type="text" class="iduser_hide" value="<?php     if(isset($_SESSION['name'])) 
    { 
print_r($_SESSION['name']['ID']);
   
    } 
   ?>">
    </nav>
</div>
    </header>
   <?php 
   if(!isset($_SESSION['name'])||$_SESSION['name']['isAdmin']==0){
       ?>

<div class=" cart-form-container">
       <form action="">
           <div class="top">
       <h3>Shopping Cart</h3>
       <ion-icon class="closeform" name="close-outline"></ion-icon>
           </div>
           <div class="carts">
       
           </div>
           <div class="total">
       <div class="top-2">
           <div class="tong">
       Total
           </div>
           <div class="price-c">
       $0
           </div>
       </div>
       <div class="buy">
           <button class="active-acept" type="button">
       <ion-icon name="cart-outline"></ion-icon>Check out
           </button>
       </div>
           </div>
       </form>
           </div>
       
       <!-- Acceptedform -->
       <div class="acepted-form">
               <form action="">
                   <div class="close-acepted">
                       <ion-icon name="close-circle-outline"></ion-icon>
                   </div>
               <div class="title">
           Accepted Buy
       </div>
       <div class="product">
           <div class="list-product">
               <div class="index td">
                   #
               </div>
               <div class="name td">
           Name
               </div>
               <div class="price td">
           Price
               </div>
               <div class="quantity td">
           Quantity
               </div>
           
               <div class="size td">
           Size
               </div>
           
           </div>
           
       <div class="list-products">
       
       </div>
       
       
       </div>
       <div class="total-a">Total
           <br>
           $<span class="Total-ac"></span>
       </div>
       <div class="address">
           Address
           <p class="des-addr"></p>
       </div>
       <div class="phone-number">
           PhoneNumber
           <p></p>
       </div>
       
       <div class="acept-btn">
           <button type="button" onclick="AddSell(<?php  if(isset($_SESSION['name'])) {
       print_r($_SESSION['name']['ID']);}?>)">Accept</button>
       </div>
               </form>
           </div>

       <?php
   }
   ?>
</body>

</html>