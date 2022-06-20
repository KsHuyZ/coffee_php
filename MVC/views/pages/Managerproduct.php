<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php_mvc/public/css/Managerproduct.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <title>Document</title>
</head>
<body>
<div class="all-product">
<div class="title">
    <div class="name">
        List Product
    </div>
    <div class="cf">
        <div class="backhome">
            <a href="http://localhost/php_mvc/home">Back Home</a>
        </div>
        <div class="addlist">
            <button class="call_active"><ion-icon name="add-outline"></ion-icon>Add new product</button>
        </div>
        <input class="search-input" type="text" name="" id="">
        <ion-icon class="search" name="search-outline"></ion-icon>
        <div class="productdel" onclick="TrashList()">
        <ion-icon name="trash-outline"></ion-icon>
        <div  class="trashnum"><?php echo mysqli_num_rows($data['Trash']); ?></div>
        </div>
        <input id="isDel" type="hidden" name="" value=0>
        <div class="listprdct">
        <ion-icon onclick="ShowProductList()" name="list-outline"></ion-icon>
        </div>
    </div>
   
   </div>
    <div class="container">
        <div class="left">
  
            <div class="categories">
                <p class="category-title">Catgories</p>
                <div class="select">
                    <div class="option active">
                        <img src="https://img.icons8.com/carbon-copy/100/000000/check-all--v2.png"/>
                        <p>All</p>
                    </div> 
  <?php
  while($row = mysqli_fetch_array($data['Type'])){
      echo '                  <div class=" option">
      <img src="http://localhost/php_mvc/public/image/'.$row['Image'].'" alt="">
      <p>'.$row['Type'].'</p>
  </div>';
  }
  mysqli_data_seek($data['Type'], 0);
  ?>
                </div>
            </div>
            <div class="price">
                <p class="price-title">Price</p>
                <div class="price-value">
                    <div class="price-value-in">
                        <input type="radio" name="price" value="Under20$"> <label for="">Under $20</label>
                    </div>
                    <div class="price-value-in">
                        <input type="radio" name="price" value="20$-50$"> <label for="">$20 to $50</label>
                    </div>
                    <div class="price-value-in">
                        <input type="radio" name="price" value="50$-100$"> <label for="">$50 to $100</label>
                    </div>
                    <div class="price-value-in">
                        <input type="radio" name="price" value="Above100$"> <label for="">Above $100</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="table">
                <div class="row-title">
                    <ul>
                        <li class="img-product">Image</li>
                        <li class="name-product">Name</li>
                        <li class="des-product">Description</li>
                        <li class="price-product">Price</li>
                        <li class="act-product">Action</li>
                    </ul>
                </div>
                <div class="row-products">
<?php 
while($row= mysqli_fetch_array($data['List'])){?>
                    <ul class="row-product">
                        <li class="img-product"><img src="http://localhost/php_mvc/public/image/<?php echo $row['Image'] ?>" alt=""></li>
                        <a href="http://localhost/php_mvc/Product/detail/<?php echo $row['ID'] ?>">
                        <li class="name-product"><?php echo $row['Name'] ?></li>
</a>
                        <li class="des-product" ><?php echo $row['Description'] ?></li>
                        <li  class="price-product">$<?php echo $row['Price'] ?></li>
                        <li  class="act-product"><ion-icon onclick="EditPr(<?php echo $row['ID']; ?>)" name="create-outline"></ion-icon>
                            <ion-icon onclick="DelPr(<?php echo $row['ID']; ?>)" name="close-circle-outline"></ion-icon></li>
                    </ul>
<?php
}

?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- formaddproduct -->
<div class="addproduct-form">
    <form id="cartform" method="POST" enctype="multipart/form-data">
    <div class="closeform"><ion-icon name="close-circle-outline"></ion-icon></div>
<div class="title">
    Add Product
</div>
<div class="addform">
    <div class="left">
        <div class="type">
            Typing
<div class="dropdown">
    <select class="select" name="" id="">
        <option class="option" selected disabled value="">Choose type</option>
      
       <?php while($row = mysqli_fetch_array($data['Type'])){
          echo '  <option class="option"  value="'.$row['Type'].'">'.$row['Type'].'</option>';
        }
        mysqli_data_seek($data['Type'], 0);?>
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
            <input type="file" id="image" name="uploadimg" onchange="loadFile(event)">
            <img id="preview" alt="">
            <div class="title-img">
           
                <ion-icon name="arrow-down-outline"></ion-icon>
            </div>
           </div>
        </div>
        <div class="price">
            <div class="price-title">
                Price
            </div>
             $  <input type="number" class="input number" value=0>
        </div>

        <div class="submit">
            <button class="btnsmit" type="button" >Upload</button>
        </div>
        </div>
   
    <div class="right">
<div class="name">
    Name
<div class="name-title">
    <input class="name-p" type="text" placeholder="Enter name product here...">
</div>
</div>
<div class="quantity">
  <div class="quantity-title">
    Quantity
  </div>
    <input type="number" min="1" class="numberqty" placeholder="Enter quantity here..">
</div>
<div class="des">
    <div class="des-title">
        Description
    </div>
    <textarea name="editor1" rows="10"  cols="5"></textarea>
</div>
    </div>
</div>
    </form>
    <div class="ok"></div>
</div>


<!-- //editproduct form -->
<div class="editproduct-form">
    <input type="hidden" class="idpr" name="">
    <form id="cartform" method="POST" enctype="multipart/form-data">
    <div class="closeform-e"><ion-icon name="close-circle-outline"></ion-icon></div>
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
        <?php while($row = mysqli_fetch_array($data['Type'])){
          echo '  <option class="option"  value="'.$row['Type'].'">'.$row['Type'].'</option>';
        }?>
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
            <input type="file" id="image-edit" name="uploadimg" onchange="loadFilee(event)" >
          <img class="file-edit" alt="">
            <div class="title-img">
           
                <ion-icon name="arrow-down-outline"></ion-icon>
            </div>
           </div>
        </div>
        <div class="price">
            <div class="price-title">
                Price
            </div>
             $                               <input class="price-e" type="number" class="input">
        </div>

        <div class="submit">
            <button class="btnsmit-e" type="button" onclick="Update()" >Upload</button>
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
</div>

<script src="http://localhost/php_mvc/public/js/Addproduct.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
    
</script>
<script>
    CKEDITOR.replace( 'editor2' );
</script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.btnsmit').on("click",function(){
            var file_data = $('#image').prop('files')[0];
            const name = document.querySelector('.name-p').value;
            const quantity = document.querySelector('.numberqty').value;
            const descr = CKEDITOR.instances.editor1.getData();
            const type = $('.select').find(":selected").text();
            const price =document.querySelector('.number').value;
            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('name', name);
            form_data.append('qty', quantity);
            form_data.append('descr', descr);
            form_data.append('type', type);
            form_data.append('price',price);
            console.log(form_data);
            $.ajax({
                type: "POST",
                url: "http://localhost/php_mvc/Ajax/Uploadimg",
                data: form_data,
                contentType:false,
                processData:false,
                cache:false,
                success: function (response) {
                    ShowProductList();
                //  window.location.reload();
                    document.getElementById('cartform').reset();
                },
                error: function (response){

                    console.log(response);
                }
            });
        });
        const keyword = $('.search-input');

       
$('.search-input').keyup(function(){
    const type = document.querySelector('.active').innerText;
    const isDel=$('#isDel').val();
    $.ajax({
        type: "POST",
        url: "http://localhost/php_mvc/Ajax/SearchTypeAdmin",
        data: {keyword:keyword.val(),
        isDel:isDel,
        type,
        },
        success: function (response) {
            $('.row-products').html(response);
        },
        error: function(response){
            console.log(response);
        }
    });
});
    })
    function TrashList(){
$.ajax({
    type: "POST",
    url: "http://localhost/php_mvc/Ajax/TrashList",
    success: function (response) {
        $('.row-products').html(response);
    }
});
}
    function ShowProductList(){
    $.ajax({
        type: "POST",
        url: "http://localhost/php_mvc/Ajax/ProductList",
        success: function (response) {
            $('.row-products').html(response);
        }
    });
}
function EditPr(id){
   $.ajax({
       type: "POST",
       url: "http://localhost/php_mvc/Ajax/ShowEdit",
       data:{id},

       success: function (response) {
 const data =JSON.parse(response);
document.querySelector('.name-e').value=data["Name"];
document.querySelector('.qty-e').value=data['quantity'];
CKEDITOR.instances.editor2.setData(data["Description"]);
$('select option[value="'+data['type']+'"]').attr("selected",true);
document.querySelector('.price-e').value=data["Price"];
document.querySelector('.idpr').value=data["ID"];
setTimeout(()=>document.querySelector('.file-edit').src="http://localhost/php_mvc/public/image/"+data["Image"],1000);
const FormActive= document.querySelector('.editproduct-form');
FormActive.classList.add('active');
const CloseForm=document.querySelector('.closeform-e');
const Image = document.querySelector('.file-edit');
Image.style.display="block";
CloseForm.addEventListener('click',()=>{
    FormActive.classList.remove('active');
    Image.style.display="none";
})
       }
   });
}
var loadFile = function(event) {
    var output = document.getElementById('preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  var loadFilee = function(event) {
      var outputy = document.querySelector('.file-edit');
      outputy.src = URL.createObjectURL(event.target.files[0]);
    outputy.onload = function() {
      URL.revokeObjectURL(outputy.src) // free memory
    }
  }
  function Update(){
    var file_data = $('#image-edit').prop('files')[0];
            const name = document.querySelector('.name-e').value;
            const quantity = document.querySelector('.qty-e').value;
            const descr = CKEDITOR.instances.editor2.getData();
            const type = $('.select-e').find(":selected").text();
            const price =document.querySelector('.price-e').value;
            const id = document.querySelector('.idpr').value;
            const form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('name', name);
            form_data.append('qty', quantity);
            form_data.append('descr', descr);
            form_data.append('type', type);
            form_data.append('price',price);
            form_data.append('id',id);
            console.log(file_data);
            $.ajax({
                type: "POST",
                url: "http://localhost/php_mvc/Ajax/EditSuccess",
                data: form_data,
                contentType:false,
                processData:false,
                cache:false,
                success: function (response) {
                    ShowProductList();
                //  window.location.reload();
                    document.getElementById('cartform').reset();
                    ShowProductList()
                    console.log(response);
                },
                error: function (response){

                    console.log(response);
                }
            });
  }
  

  
</script>
</body>

</html>