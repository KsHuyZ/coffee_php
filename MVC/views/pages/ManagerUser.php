<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php_mvc/public/css/ManagerUser.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Document</title>
</head>
<body>

    <div class="title-t">
    <div class="backhome">
            <a href="http://localhost/php_mvc/home">Back Home</a>
        </div>
        <div class="name">
            List Type
            
        </div>
        
       </div>
        <div class="container">
            <div class="right">
                <div class="table">
                    <div class="addbtn">
                        <button class="addbtnn">Add type</button>
                    </div>
                    <div class="row-title">
                        <ul>
                            <li class="img-product">Type</li>
                            <li class="name-product">Quantity</li>
                            <li class="act-product">Action</li>
                        </ul>
                    </div>
                    <div class="row-products">
                    
                    
<?php 
while($row = mysqli_fetch_array($data['Type'])){
  echo '  <ul class="row-product">
  
  <li class="name-product">'.$row['Type'].'</li>
  <li class="des-product" ><img src="http://localhost/php_mvc/public/image/'.$row['Image'].'" alt=""></li>
  <li  class="act-product"><ion-icon onclick="ShowType('.$row['ID'].')" name="create-outline"></ion-icon>
      <ion-icon onclick="DelType('.$row['ID'].')" name="close-circle-outline"></ion-icon></li>
</ul>';
}

?>
                    </div>
                </div>
            </div>
        </div> 
        <div class="editform">
            <div class="edit">
            <div class="close">
            <ion-icon name="close-circle-outline"></ion-icon>
            </div>
                <span>Edit Form</span>
                <input type="hidden" name="" class="IDT" value="">
                <div class="name-type"><input class="nameedit" type="text" value =""></div>
<div class="img"><img class="imgedit" src="" alt="">
<input class="img-upload" id="img-upload" type="file" name="" id="" onchange="loadFilee(event)">
<div class="upload">
    <button class="upload-edit">Upload</button>
</div>
</div>
            </div>
        </div>
        <div class="addform">
            <div class="add">
                <div class="close-add">
                <ion-icon name="close-circle-outline"></ion-icon>
                </div>
                <span>Add Form</span>
                <div class="name-type-add">
                    <input type="text" class="nameadd">
                </div>
                <div class="img-add">
                    <img src="" alt="" class="imgadd">
                    <input type="file" id="imgfileadd" onchange="loadFile(event)">
                </div>
                <div class="uploadadd">
                    <button class="upload-add">Upload</button>
                </div>
            </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../../php_mvc/public/js/ManagerType.js"></script>        
<script>
    var loadFilee = function(event) {
    var outputy = document.querySelector('.imgedit');
    outputy.src = URL.createObjectURL(event.target.files[0]);
  outputy.onload = function() {
    URL.revokeObjectURL(outputy.src) // free memory
  }
}
var loadFile = function(event) {
    var output = document.querySelector('.imgadd');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  const add = document.querySelector('.upload-add');
add.addEventListener('click',()=>{
  const type = document.querySelector('.nameadd').value;
  var file_data =$('#imgfileadd').prop('files')[0];
  var form_data = new FormData();
  form_data.append('type',type);
  form_data.append('file',file_data);
  $.ajax({
    type: "POST",
    url: "http://localhost/php_mvc/Ajax/AddType",
    data: form_data,
    contentType:false,
    processData:false,
    cache:false,
    success: function (response) {
        ShowAllType();
    },
    error: function(response){
      console.log(response);
    }
  });
})
</script>
</body>
</html>