<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php_mvc/public/css/Addproduct.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <title>Document</title>
</head>
<body>
<div class="editproduct-form">
    <form id="cartform" method="POST" enctype="multipart/form-data">
<div class="title">
    Edit Product
</div>
<div class="addform">
    <div class="left">
        <div class="type">
            Typing
<div class="dropdown">
    <select class="select-e" name="" id="">
        <option class="option" selected disabled value="">Choose type</option>
        <option class="option"  value="Coffee">Coffee</option>
        <option class="option" value="Tea">Tea</option>
        <option class="option" value="Milk">Milk</option>
        <option class="option" value="Graffy">Graffy</option>
    </select>
</div>
            </div>
        <div class="size">
            Size
          <div class="size-list">
             <div class="s size-type">S</div> 
             <div class="M size-type">M</div> 
             <div class="L size-type">L</div> 
             <div class="XL size-type">XL</div> 
          </div>  
        </div>    
        <div class="image">
            Image
           <div class="img">
            <input type="file" id="image-edit" name="uploadimg">
            <div class="title-img">
           
                <ion-icon name="arrow-down-outline"></ion-icon>
            </div>
           </div>
        </div>
        <div class="price">
            <div class="price-title">
                Price
            </div>
             $                               <input type="number" class="input">
        </div>

        <div class="submit">
            <button class="btnsmit-e" type="button" >Upload</button>
        </div>
        </div>
   
    <div class="right">
<div class="name">
    Name
<div class="name-title">
    <input type="text" placeholder="Enter name product here..."class="name-e">
</div>
</div>
<div class="quantity">
  <div class="quantity-title">
    Quantity
  </div>
    <input type="text" placeholder="Enter quantity here.." class="qty-e">
</div>
<div class="des">
    <div class="des-title">
        Description
    </div>
    <textarea class="desc-e" name="editor2" rows="10"  cols="5"></textarea>
</div>
    </div>
</div>
    </form>
    <div class="ok"></div>
</div>

<script>
    CKEDITOR.replace( 'editor2' );
</script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.btnsmit').on("click",function(){
            var file_data = $('#image').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            console.log(form_data);
            $.ajax({
                type: "POST",
                url: "http://localhost/php_mvc/Ajax/Uploadimg",
                data: form_data,
                contentType:false,
                processData:false,
                cache:false,
                success: function (response) {
                    console.log(response);
                },
                error: function (response){
                    console.log(response);
                }
            });
        });
    })
</script>
</body>
</html>