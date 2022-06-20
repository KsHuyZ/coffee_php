<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php_mvc/public/css/productdetail.css">
    <script src="https://unpkg.com/phosphor-icons"></script>
    <title>Detail Product</title>
</head>

<body>
  <div class="papasuke">
  <?php while($row=mysqli_fetch_array($data['Product'])){
    ?>
    <div class="container">
        <div class="left">
            <div class="name"><?php echo $row['Name']?>
            </div>
            <div class="size">
                Size
                <div class="select">
                    <div  class="option active">
                        S
                    </div>
                    <div class="option">
                        M
                    </div>
                    <div class="option">
                        L
                    </div>
                    <div class="option">
                        XL
                    </div>
                </div>
            </div>
            <div class="number">
                <p>Quantity</p>
                <ion-icon id="decrease" name="remove-outline"></ion-icon> <input class="sl" type="text" name="" id="" value="1">
                <ion-icon id="increase" name="add-outline"></ion-icon>
            </div>
            <div class="price">
           $
                <div class="PriceNum">
                    <?php echo $row['Price']; ?>
                </div>

            </div>
    
            <div class="description">
            <?php echo $row['Description']; ?>
            </div>
            <button onclick="AddCart()">
                <ion-icon name="cart-outline"></ion-icon>
                <span>Add To Cart</span>
            </button>
        </div>
        <div class="center"><img src="http://localhost/php_mvc/public/image/<?php echo $row['Image'] ?>" alt="">
        <input type="text" name="" id="" value="<?php echo $row['Image']; ?>" class="hideee">
        </div>
    </div>

<div class="chia"></div>
    <div class="comment">
        <div class="main-comment">
            <form id="form" method="POST" name="form">
                <div id="error_status"></div>

                <input type="text" name="hide" id="hide_input" value="<?php echo $row['ID'] ?>">

                <input class="comment_textbox form_control" name="" id="" placeholder="Write your review here">
                <button type="button" class="add_comment_btn"><ion-icon name="arrow-forward-outline"></ion-icon> </button>
            </form>
        </div>
<div class="bigwrap">

</div>
   
    </div>
    <?php

}?>

  </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://localhost/php_mvc/public/js/custom.js"></script>
    <script>

    </script>
</body>

</html>