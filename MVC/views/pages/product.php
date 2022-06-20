<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/product.css">
    <title>Detail Products</title>
</head>

<body>
    <div class="banner">
        <img src="./public/image/banner.jpg" alt="">
    </div>
    <div class="container">
        <div class="left">
            <div class="categories">
                <p class="category-title">Catgories</p>
                <div class="select">
                <div class="all option activee">
                        <img src="https://img.icons8.com/carbon-copy/100/000000/check-all--v2.png" alt="">
                        <p>All</p>
                    </div>
<?php 
while($row= mysqli_fetch_array($data['type'])){
    echo '                    <div class=" option">
    <img src="./public/image/'.$row['Image'].'" alt="">
    <p>'.$row['Type'].'</p>
</div>';
}
?>

                </div>
            </div>
            <div class="price">
                <p class="price-title">Price</p>
                <div class="price-value">
                             
                    <div class="price-value-in">
                        <input type="radio" name="price" value="<20$"> <label for="">Under $20</label>
                    </div>
                    <div class="price-value-in">
                        <input type="radio" name="price" value="20$-50$"> <label for="">$20 to $50</label>
                    </div>
                    <div class="price-value-in">
                        <input type="radio" name="price" value="50$-100$"> <label for="">$50 to $100</label>
                    </div>
                    <div class="price-value-in">
                        <input type="radio" name="price" value=">100$"> <label for="">Above $100</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="top">
                <div class="search">
                    <input class="search-input" type="text" placeholder="Search your product"> <button><img src="./public/image/loupe.png"
                            alt=""> </button>
                </div>
                <div class="dropdown">
                    <div class="dropdown-select">
                        <span class="select">Selectd item</span>
                        <ion-icon name="chevron-down-outline"></ion-icon>
                    </div>
                    <div class="dropdown-list">
                        <div class="dropdown-item">Price: Low to High</div>
                        <div class="dropdown-item">Price: Hight to Low</div>
                    </div>
                </div>
            </div>
            <div class="bottom" id="data-container">
                <div class="ultra-box" >
               
                <?php 
                    while($row=mysqli_fetch_array($data['List'])){
                        echo ' <a href="./Product/detail/'.$row['ID'].'">
                        <div class="box">
                        <div class="title">
                            <div class="top">
                                <div class="name">'.$row['Name'].'</div>
                                <div class="price">$'.$row['Price'].'</div>
                            </div>
                            <div class="bottom">
                                <div class="love">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </div>
                                <div class="share">
                                    <ion-icon name="paper-plane-outline"></ion-icon>
                                </div>
                           
                            </div>
                        </div>
                        <div class="content">
                            <div class="image">
                                <img src="./public/image/'.$row['Image'].'" alt="">
                            </div>
                            <div class="cart">
                                <button>
                                    <ion-icon name="add-circle-outline"></ion-icon>
                                    <span>To Cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                        
                        </a>
                ';
                    }
                    ?>
            </div>
            <div id="pagination-container"></div>
        </div>
    </div>
 </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>
        <script src="./public/js/product.js">

        </script>

      


</body>

</html>