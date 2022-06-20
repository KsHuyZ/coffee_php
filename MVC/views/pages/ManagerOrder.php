<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php_mvc/public/css/ManagerOrder.css">
    <title>Document</title>
</head>
<body>

<div class="container">
<div class="backhome">
            <a href="http://localhost/php_mvc/home">Back Home</a>
        </div>
        <div class="title">
            <div class="index td">
                #
            </div>
            <div class="name td">
                Name
            </div>
            <div class="email td">
                Email
            </div>
            <div class="total td">Total</div>
            <div class="address td">
                Address
            </div>
            <div class="phone td">
                PhoneNumber
            </div>
            <div class="view td">
                Action
            </div>
        </div>
<div class="list">

</div>
<div class="total ct"></div>
    </div>

    <div class="acepted-form">
               <form action="">
                   <div class="close-acepted">
                       <ion-icon name="close-circle-outline"></ion-icon>
                   </div>
       <div class="address">
           Address
           <p class="des-addr"></p>
       </div>
       <div class="phone-number">
           PhoneNumber:
           <span></span>
       </div>
<div class="name-a">
Name: <span class="name-des"></span>
</div>
<div class="date">
Date: <span class="date-des"></span>
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
       <div class="acept-btn">
           <button type="button" onclick="AddSell(<?php  if(isset($_SESSION['name'])) {
       print_r($_SESSION['name']['ID']);
           }    ?>)">Accept</button>
       </div>
               </form>
           </div>
           <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
           <script src="http://localhost/php_mvc/public/js/ManagerOrder.js"></script>
</body>
</html>