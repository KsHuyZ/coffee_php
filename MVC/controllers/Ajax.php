<?php 
class Ajax extends Controller{
  public function addcomment(){

   $name =  $_SESSION['name']['FullName'];
   $iduser = $_SESSION['name']['ID'];
      $action =$this->Model('UserModel');
      $cmt = $_POST['cmt'];
      $id = $_POST['id'];
      $date =date("Y/m/d") ;
      $action->Addcomment($name,$cmt,$id,$date,$iduser);
  }
public function showcomment(){
  $id = $_POST['id'];
  $action = $this->Model('UserModel');
$result=$action->Listcomment($id);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){

    ?>
           <div class="wrapper_comment">
         <div class="comment_content">
              <div class="top">
                  <div class="name"><?php echo $row['FullName']; ?></div>
                  <div class="time">
                  <?php echo $row['date']; ?>
                  </div>
              </div>
              <div class="content">
                <?php echo $row['comment_value'];
                              if(isset($_SESSION['name'])&&mysqli_num_rows($action->CheckisLike($_SESSION['name']['ID'],$row['ID']))==1){
                                
               ?>
                <div onclick="Unlike(<?php echo $row['ID']; ?>)" class="love-icon">
                <?php 
                if($row['clike']!=0){

              
                ?>
               <span class="numberlike">
               <?php echo $row['clike'];} ?>
               </span>
               <?php  

                echo '
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
</svg>';
}
else{
  if(!isset($_SESSION['name'])){


  ?>
  <div class="love-icon">

  <?php 
  }
  else {
   echo '<div onclick="Like( '.$row['ID'].')" class="love-icon">'; 
  }
  if($row['clike']!=0){


  ?>
 <span class="numberlike">
 <?php echo $row['clike'];} ?>
 </span>
 <?php  
  echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
</svg>';
}
             
               
                 ?>


                </div>
                  <div class="reply rep<?php echo $row['ID']; ?>">
                <button class="buttonnn" onclick="showreply(<?php echo $row['ID']; ?>)" >show reply</button>
                      <br>
                      <div class="comment_reply_tiny_<?php echo $row['ID']; ?>"></div>
                     <form class="repForm_<?php echo $row['ID']; ?> replycmtt" method="POST">
                     <input type="text" class="hide_id" value="<?php echo $row['ID']; ?>">
                      <input type="text" class="reply_comment_<?php echo $row['ID'];?> repp" placeholder="Reply here...">
                      <button onclick="reply(<?php echo $row['ID']; ?>)" type="button" class="add_comment_btn_reply btn_send_<?php echo $row['ID']; ?>"><ion-icon name="arrow-forward-outline"></ion-icon></button>
                     </form>
                  </div>
              </div>
          </div>
         </div>
         <?php
  }
    }
    else if(mysqli_num_rows($result)==0){
      echo "Become first reviews";
    }
}
  public function reply(){
    $name =  $_SESSION['name']['FullName'];
    $iduser = $_SESSION['name']['ID'];
    $action =$this->Model('UserModel');
    $cmt = $_POST['rcmt'];
    $id = $_POST['rid'];
    $date =date("Y/m/d") ;
    $replyID =$_POST['replyID'];
    $action->Reply_comment($id,$replyID,$name,$cmt,$date,$iduser);
  }
  public function showreply(){
    $action=$this->Model('UserModel');
    $idProduct=$_POST['id'];
    $idReply = $_POST['replyID'];
$result =$action->Showreply($idProduct,$idReply);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){?>
 <div class="wrapper_comment_tiny">
       <div class="comment_content">
            <div class="top">
                <div class="name"><?php echo $row['FullName']; ?></div>
                <div class="time">
                    <?php echo $row['date']; ?>
                </div>
            </div>
            <div class="content">
              <?php echo $row['comment_value']; 
               if(isset($_SESSION['name'])&&mysqli_num_rows($action->CheckisLike($_SESSION['name']['ID'],$row['ID']))==1){
                                
                ?>
                 <div onclick="Unlike(<?php echo $row['ID']; ?>,<?php echo $row['replyID'] ?>)" class="love-icon">
                 <?php 
                 if($row['clike']!=0){
 
               
                 ?>
                <span class="numberlike">
                <?php echo $row['clike'];} ?>
                </span>
                <?php  
 
                 echo '
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
   <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
 </svg>';
 }
 else{
   if(!isset($_SESSION['name'])){
 
 
   ?>
   <div class="love-icon">
 
   <?php 
   }
   else {
    echo '<div onclick="Like('.$row['ID'].','.$row['replyID'].')" class="love-icon">'; 
   }
   if($row['clike']!=0){
 
 
   ?>
  <span class="numberlike">
  <?php echo $row['clike'];} ?>
  </span>
  <?php  
   echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
 </svg>';
 }?>
                <div class="reply">
                    <br>
        
                </div>
            </div>
        </div>
       </div>

<?php 
  }
}
  }
  public function AddtoCart(){
    $name = $_POST['name'];
    $size = $_POST['size'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $img =$_POST['img'];
    $idp=$_POST['idp'];
    $idu=$_POST['idu'];
    $action=$this->Model('UserModel');
  
if(mysqli_num_rows($action->Checkexits($idp,$idu,$size))>0){
  $action->Updatequantity($idp,$qty,$idu);
}else{
  $action->AddtoCart($idp,$name,$price,$img,$qty,$size,$idu);
}
  }
  public function CartList(){
    $id=$_POST['id'];
    $action= $this->Model('UserModel');
 $result=  $action->CartList($id);
 if($result == false){
   ?>
<div class="emtycart">
  <img src="http://localhost/php_mvc/public/image/Loginf.svg" alt="">
</div>
<div class="text">
  Please login first!
</div>

   <?php
 }
 else
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){?>
             <div class="product">
               <input type="text" class="id_cart_hide" value="<?php echo $row['ID'] ?>">
                    <div class="img">
                        <img src="http://localhost/php_mvc/public/image/<?php echo $row['Image'] ?>" alt="">
                    </div>
                    <div class="middle">
                        <div class="name"><?php echo $row['Name'] ?></div>
                       <div class="price">$<?php echo $row['Price'] ?> <input type="hidden" name="pricei" class="pricei" value="<?php echo $row['Price'] ?>"></div>
                        <div class="quantity">
                          <ion-icon class="decre" name="remove-outline"></ion-icon>
                             <input readonly type="number" name="" class="quantity-num" id="num" value="<?php echo $row['Number'] ?>">
                             <ion-icon class="incre" name="add-outline"></ion-icon>
                           
                        </div>
                    </div>
                    <div class="right">  <div class="option-c">
                          <?php echo $row['Size']; ?>
                        </div>
                      <div class="remaining">Remain:
                     <span class="conlai"><?php echo $row['quantity']; ?></span>
                      </div>
                      </div>
                    <div class="trash">
                        <ion-icon  onclick="delCart(<?php echo $row['ID'] ?>)" name="close-outline"></ion-icon>
                    </div>
                </div>

<?php
    }
  }
  else{
   ?>
<div class="emtycart">
  <img src="http://localhost/php_mvc/public/image/emty.svg" alt="">
</div>
<div class="text">
 Your cart is empty!
</div>

   <?php
  }    
  }
  public function IfBuyer(){
$id = $_POST['id'];
$action= $this->Model("UserModel");
$result=$action->CartList($id);
$index=0;
while($row = mysqli_fetch_array($result)){
  
echo '<div class="list">
<div class="index sp">
  '.++$index.'
</div>
<div class="name sp">
 '.$row['Name'].'
</div>
<div class="price sp">
    $'.$row['Price'].'
</div>
<div class="quantity sp">
    '.$row['Number'].'
</div>
<div class="size sp">
'.$row['Size'].'
</div>
</div>';
}

  }
  public function InforUser(){
    $id = $_POST['id'];
    $action= $this->Model('UserModel');
   $result= $action->ShowIfUser($id);
while($row= mysqli_fetch_array($result)){
  echo json_encode($row);
}
  }
  public function DelCart(){
    $idc = $_POST['id'];
    $action = $this->Model('UserModel');
    $action->DelCart($idc);
  }
  public function AddSell(){
    $action= $this->Model('UserModel');
    $id = $_POST['id']; 
    $total = $_POST['total'];
 $action->AddOrder($id,$total);
 $orderid = $action->GetIdInsert();
$result= $action->CartList($id);
while($row = mysqli_fetch_array($result)){
 $action->AddOrderDetail($orderid,$row['IDProduct'],$row['Number'],$row['Price'],$row['Size']);
 $action->SellQuantity($row['IDProduct'],$row['Number']);
}
    $action->ClearSell($id);
  }
  public function ShowOrderDetail(){
$action = $this->Model('UserModel');
$id = $_POST['id'];
$result =$action->ShowIfOrderDetail($id);
while($row = mysqli_fetch_array($result)){
echo json_encode($row);
}
  }
  public function ShowProductOrder(){
    $action = $this->Model('UserModel');
$id = $_POST['id'];
$result = $action->ShowProductOrder($id);
$index=0;
while($row= mysqli_fetch_array($result)){
  echo '<div class="list">
  <div class="index sp">
    '.++$index.'
  </div>
  <div class="name sp">
   '.$row['Name'].'
  </div>
  <div class="price sp">
      $'.$row['Price'].'
  </div>
  <div class="quantity sp">
      '.$row['Number'].'
  </div>
  <div class="size sp">
      '.$row['Size'].'
  </div>
  </div>';
}
  }
  public function Incre(){
    $action=$this->Model('UserModel');
    $idcart=$_POST['idcart'];
 
  $action->IncreBtn($idcart);
  }
  public function Decre(){
    $action=$this->Model('UserModel');
    $idcart=$_POST['idcart'];
  $action->DecreBtn($idcart);
  }
  public function Chartjs(){
  
    header('Content-Type: application/json');
  $data=array();
      $action=$this->Model('UserModel');
    $result =$action->Demo();

    foreach($result as $row){
      $data[]=$row;
      }

      print json_encode($data,JSON_PRETTY_PRINT);
  }
  public function Uploadimg(){
   $action= $this->Model('UserModel');
   $targetdir="public/image/";
   if(isset($_FILES['file']['name'])){
    $target_file = $targetdir . basename($_FILES['file']['name']);
    $uploadOk=1;
    $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 $check = getimagesize($_FILES['file']['tmp_name']);
 if($check!==false){
   $uploadOk=1;
 }
 else{
   $uploadOk=0;
 }
 
 if(file_exists($target_file)){
   $uploadOk = 0;
 }
 if ($_FILES["file"]["size"] > 500000) {
   $uploadOk = 0;
 }
 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
   $uploadOk = 0;
 }
 if($uploadOk==0){
   //nọthig
 } else{
   if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
    $file=$_FILES['file']['name'];
    $qty= $_POST['qty'];
    $name = $_POST['name'];
    $desc =$_POST['descr'];
    $type = $_POST['type'];
     $price = $_POST['price'];
    $action->Addproduct($name,$price,$file,$desc,$type,$qty);
   
   }
   else{
   //Éo được nè
   }
 }


   }
  
  }
  public function ProductList(){
    $action= $this->Model('UserModel');
    $result=$action->ListCoffee();
    while($row =mysqli_fetch_array($result)){?>

   <input id="isDel" type="hidden" name="" value=<?php echo $row['isDel'] ?>>
      <ul class="row-product">
      <li class="img-product"><img src="http://localhost/php_mvc/public/image/<?php echo $row['Image'] ?>" alt=""></li>
      <a href="http://localhost/php_mvc/Product/detail/<?php echo $row['ID'] ?>">
      <li class="name-product"><?php echo $row['Name'] ?></li>
      </a>
      <li class="des-product" ><?php echo $row['Description'] ?></li>
      <li  class="price-product">$<?php echo $row['Price'] ?></li>
      <li  class="act-product"><ion-icon onclick="EditPr(<?php echo $row['ID']; ?>)" name="create-outline"></ion-icon>
          <ion-icon onclick="DelPr(<?php echo $row['ID']; ?>)" class="delprdct" name="close-circle-outline"></ion-icon></li>
    </ul>

    <?php
    }
  }
  public function SDeleteProduct(){
$action=$this->Model('UserModel');
$id = $_POST['id'];
$action->SDelProduct($id);
  }
  public function TrashList(){
    $action=$this->Model('UserModel');
    $result = $action->TrashList();
    while($row =mysqli_fetch_array($result)){?>
 
      <ul class="row-product">
      <li class="img-product"><img src="http://localhost/php_mvc/public/image/<?php echo $row['Image'] ?>" alt=""></li>
      <a href="http://localhost/php_mvc/Product/detail/<?php echo $row['ID'] ?>">
      <li class="name-product"><?php echo $row['Name'] ?></li>
      </a>
      <li class="des-product" ><?php echo $row['Description'] ?></li>
      <li  class="price-product">$<?php echo $row['Price'] ?></li>
      <li  class="act-product"><ion-icon onclick="Restore(<?php echo $row['ID']; ?>)" name="refresh-outline"></ion-icon>
          <ion-icon onclick="DelTr(<?php echo $row['ID']; ?>)" class="delprdct" name="close-circle-outline"></ion-icon></li>
    </ul>

    <?php
    }
  }
  public function RestoreProduct(){
    $action=$this->Model('UserModel');
    $id = $_POST['idp'];
    $action->Restore($id);
  }
  public function CountTrash(){
    $action= $this->Model('UserModel');
    $result =mysqli_num_rows($action->TrashList());
echo $result;

  }
  public function DelTrash(){
$id = $_POST['id'];
$action= $this->Model('UserModel');
$result=$action->getProductbyID($id);
while($row =mysqli_fetch_array($result)){
  $name= $row['Image'];
}
$path = "public/image/$name";
if($action->DelProduct($id)){
  unlink($path);
}
  }
 public function ShowEdit(){
   $id = $_POST['id'];
   $action= $this->Model('UserModel');
   $result=$action->getProductbyID($id);
   while($row=mysqli_fetch_array($result)){
    echo(json_encode($row));
   }

 }
 public function EditSuccess(){

  $qty= $_POST['qty'];
  $name = $_POST['name'];
  $desc =$_POST['descr'];
  $type = $_POST['type'];
   $price = $_POST['price'];
   $id = $_POST['id'];
  $action= $this->Model('UserModel');
  $targetdir="public/image/";
  if(isset($_FILES['file']['name'])){
   $target_file = $targetdir . basename($_FILES['file']['name']);
   $uploadOk=1;
   $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES['file']['tmp_name']);
if($check!==false){
  $uploadOk=1;
}
else{
  $uploadOk=0;
  echo "Fake image";
}

if(file_exists($target_file)){
  $uploadOk = 0;
  echo "exits";
}
if ($_FILES["file"]["size"] > 500000) {
  $uploadOk = 0;
  echo "Big size";
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $uploadOk = 0;
  echo "Not file tail";
}
if($uploadOk==0){
 echo "Nope";
} else{
  if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
    $file=$_FILES['file']['name'];
    $action->UpdateProduct($id,$name,$price,$file,$desc,$type,$qty);
   
  }
  else{
  echo "oken't";
  } 
}
  }else{
  $action->UpdateProductnoImg($id,$name,$price,$desc,$type,$qty);
  echo "No";
  }
 
 }
 public function LiveSearch(){
  $name =$_POST['keyword'];
  $action = $this->Model('UserModel');
   if(isset($_POST['typee'])&&$_POST['typee'] !="All"){
    $type = $_POST['typee'];
   $result= $action->SearchType($name,$type);
  }else{
    $result = $action->SearchAll($name);
  }
if(mysqli_num_rows($result)!=0){
  while($row = mysqli_fetch_array($result)){
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
  <script>
  try{
    var items=$(".ultra-box .box");
    var numItems = items.length;
    var perPage=3;
    items.slice(perPage).hide();
    $("#pagination-container").pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "<<",
        nextText: ">>",
        onPageClick:function(pageNumber){
            var showFrom = perPage *(pageNumber-1);
            var showTo = showFrom+perPage;
            items.hide().slice(showFrom,showTo).show();
        }
    });
  }catch(error){
  
  }
  </script>
  ';
   
       
     }
} else{
 echo ' <div class="nope-product">
 <img src="http://localhost/php_mvc/public/image/emptyproduct.svg" alt="">
 </div>
 <div class="text-tb">
 Your product not exits
 </div>';
}

 } 
 public function ShowType(){
   $type = $_POST['type'];
   $action = $this->Model('UserModel');
   if($type!="All"){
  $result= $action->ShowType($type);
   }else{
     $result=$action->ListCoffee();
   }
   if(mysqli_num_rows($result)!=0){
    while($row = mysqli_fetch_array($result)){
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
    <script>
    try{
      var items=$(".ultra-box .box");
      var numItems = items.length;
      var perPage=3;
      items.slice(perPage).hide();
      $("#pagination-container").pagination({
          items: numItems,
          itemsOnPage: perPage,
          prevText: "<<",
          nextText: ">>",
          onPageClick:function(pageNumber){
              var showFrom = perPage *(pageNumber-1);
              var showTo = showFrom+perPage;
              items.hide().slice(showFrom,showTo).show();
          }
      });
    }catch(error){
    
    }
    </script>
    ';
     
         
       }
  } else{
   echo ' <div class="nope-product">
   <img src="http://localhost/php_mvc/public/image/emptyproduct.svg" alt="">
   </div>
   <div class="text-tb">
   Your product not exits
   </div>';
  }
 }
 public function LiveSearchP(){
   $isDel = $_POST['isDel'];
   $name =$_POST['keyword'];
  $action=$this->Model('UserModel');
$result=  $action->LiveSearch($name,$isDel);
if(mysqli_num_rows($result)){
while($row = mysqli_fetch_array($result)){?>
<input id="isDel" type="hidden" name="" value=<?php echo $row['isDel'] ?>>

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
</a>

<?php
}
 }
 else{
 echo '  <div class="empty-img">
 <img src="http://localhost/php_mvc/public/image/emptyproduct.svg" alt="">
 </div>
 <div class="text-tb">
 Your product not exits</div>';
 }
  }
  public function ShowTypeAdmin(){
    $isDel = $_POST['isDel'];
    $action = $this->Model('UserModel');
    if(isset($_POST['type'])){
      if($_POST['type']!="All"){
        $type  = $_POST['type'];
        $result=$action->ShowTypeAdmin($type,$isDel);
      }else{
        $result = $action->ShowTypeAll($isDel);
            }
    }
    while($row = mysqli_fetch_array($result)){
      if($isDel==1){
        echo ' 
    
        <ul class="row-product">
        <li class="img-product"><img src="http://localhost/php_mvc/public/image/'.$row['Image'].'" alt=""></li>
            <a href="http://localhost/php_mvc/Product/detail/'.$row['ID'].'">
        <li class="name-product">'.$row['Name'].'</li>
        </a>
        <li class="des-product" >'.$row['Description'].'</li>
        <li  class="price-product">$'.$row['Price'].'</li>
        <li  class="act-product"><ion-icon onclick="Restore('.$row['ID'].')" name="refresh-outline"></ion-icon>
            <ion-icon onclick="DelTr('.$row['ID'].')" class="delprdct" name="close-circle-outline"></ion-icon></li>
      </ul>
       </a>';
      }else{

      echo ' 
  
       <ul class="row-product">
           <li class="img-product"><img src="http://localhost/php_mvc/public/image/'.$row['Image'].'" alt=""></li>
           <a href="http://localhost/php_mvc/Product/detail/'.$row['ID'].'">
           <li class="name-product"> '.$row['Name'].' </li>
           </a>
           <li class="des-product" >'.$row['Description'].'</li>
           <li  class="price-product">$'.$row['Price'].'</li>
           <li  class="act-product"><ion-icon onclick="EditPr('.$row['ID'].')" name="create-outline"></ion-icon>
               <ion-icon onclick="DelPr('.$row['ID'].')" name="close-circle-outline"></ion-icon></li>
       </ul>
       </a>';
      }
     }

  }

  public function SearchTypeAdmin(){

    $name =$_POST['keyword'];

    $isDel = $_POST['isDel'];

    $action = $this->Model('UserModel');
    if(isset($_POST['type'])&&$_POST['type']!="All"){
      $type = $_POST['type'];
     $result= $action->ShowTypeByNameAdmin($name,$type,$isDel);
    }else{
     $result= $action-> SearchTypeAdmin($name,$isDel);
    }
  
    while($row = mysqli_fetch_array($result)){
if($isDel==1){
  echo ' 
  
  <ul class="row-product">
  <li class="img-product"><img src="http://localhost/php_mvc/public/image/'.$row['Image'].'" alt=""></li>
  <a href="http://localhost/php_mvc/Product/detail/'.$row['ID'].'">
  <li class="name-product">'.$row['Name'].'</li>
  </a>
  <li class="des-product" >'.$row['Description'].'</li>
  <li  class="price-product">$'.$row['Price'].'</li>
  <li  class="act-product"><ion-icon onclick="Restore('.$row['ID'].')" name="refresh-outline"></ion-icon>
      <ion-icon onclick="DelTr('.$row['ID'].')" class="delprdct" name="close-circle-outline"></ion-icon></li>
</ul>
';
}
else{
  echo '
  
  <ul class="row-product">
  <li class="img-product"><img src="http://localhost/php_mvc/public/image/'.$row['Image'].'" alt=""></li>
  <a href="http://localhost/php_mvc/Product/detail/'.$row['ID'].'">
  <li class="name-product">'.$row['Name'].'</li>
  </a>
  <li class="des-product" >'.$row['Description'].'</li>
  <li  class="price-product">$'.$row['Price'].'</li>
  <li  class="act-product"><ion-icon onclick="EditPr('.$row['ID'].')" name="create-outline"></ion-icon>
      <ion-icon onclick="DelPr('.$row['ID'].')" name="close-circle-outline"></ion-icon></li>
</ul>
  ';
}
     }
  }

  public function ShowTypeAll(){
    $action=$this->Model('UserModel');
    $result=$action->ShowListType();
    while($row=mysqli_fetch_array($result)){
      echo '  <ul class="row-product">
      <li class="name-product">'.$row['Type'].'</li>
      <li class="des-product" ><img src="http://localhost/php_mvc/public/image/'.$row['Image'].'" alt=""></li>
      <li  class="act-product" onclick="ShowType('.$row['ID'].')"><ion-icon name="create-outline"></ion-icon>
          <ion-icon name="close-circle-outline"></ion-icon></li>
    </ul>';
    }
  }
  public function ShowTypeByID(){
   $id =$_POST['id'];
$action=$this->Model('UserModel');

$result=$action->ShowTypeByID($id);
while($row= mysqli_fetch_array($result)){
  echo(json_encode($row));
}
  }
  public function UpdateType(){
    $type = $_POST['type'];
    $id = $_POST['id'];
$action= $this->Model('UserModel');
$picture =$action->getImageEditAdmin($id);
while($roww=mysqli_fetch_array($picture)){
  $picpath =$roww['Image'];
}
$path="public/image/$picpath";

    $targetdir="public/image/";
    if(isset($_FILES['file']['name'])){
      $target_file = $targetdir . basename($_FILES['file']['name']);
      $uploadOk=1;
      $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   $check = getimagesize($_FILES['file']['tmp_name']);
   if($check!==false){
     $uploadOk=1;
   }
   else{
     $uploadOk=0;
     echo "Fake image";
   }
   
   if(file_exists($target_file)){
     $uploadOk = 0;
     echo "exits";
   }
   if ($_FILES["file"]["size"] > 500000) {
     $uploadOk = 0;
     echo "Big size";
   }
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" && $imageFileType != "svg" ) {
     $uploadOk = 0;
     echo "Not file tail";
   }
   if($uploadOk==0){
    echo "Nope";
   } else{
     if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
       $file=$_FILES['file']['name'];
       $action->UpdateType($id,$type,$file);
      unlink($path);
     }
     else{
     echo "oken't";
     } 
   }
     }
     else{
$action->UpdateTypeNoImg($id,$type);
     }
    
  }
  public function AddType(){
    $action = $this->Model('UserModel');
    $type =$_POST['type'];
    $targetdir="public/image/";
    if(isset($_FILES['file']['name'])){
      $target_file = $targetdir . basename($_FILES['file']['name']);
      $uploadOk=1;
      $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   $check = getimagesize($_FILES['file']['tmp_name']);
   if($check!==false){
     $uploadOk=1;
   }
   else{
     $uploadOk=0;
     echo "Fake image";
   }
   
   if(file_exists($target_file)){
     $uploadOk = 0;
     echo "exits";
   }
   if ($_FILES["file"]["size"] > 5000000) {
     $uploadOk = 0;
     echo "Big size";
   }
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" && $imageFileType != "svg" ) {
     $uploadOk = 0;
     echo "Not file tail";
   }
   if($uploadOk==0){
    echo "Nope";
   } else{
     if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
       $file=$_FILES['file']['name'];
       $action->AddType($type,$file);
      echo $file;
      echo $type;
     }
     else{
     echo "oken't";
     } 
   }
     }
     else{

     }
  }

  public function DeleType(){
    $id =$_POST['id'];
    $action= $this->Model('UserModel');
    $picture =$action->getImageEditAdmin($id);
while($roww=mysqli_fetch_array($picture)){
  $picpath =$roww['Image'];
}
$path="public/image/$picpath";
    $action->DelTypee($id);
    unlink($path);
  }
  public function AceptedOrder(){
    $id =$_POST['id'];
    $action= $this->Model("UserModel");
    $action->TongBan($id);
  }
  public function Like(){
    if(isset($_SESSION['name']['ID'])){
      $idu =$_SESSION['name']['ID'];
      $id = $_POST['id'];
      $action= $this->Model("UserModel");
    if(isset($_POST['like'])){
      $action->Like($id);
      $action->AddLike($idu,$id);
    }
  if(isset($_POST['Unlike'])){
      $action->Unlike($id);
      $action->DelLike($idu,$id);
    }
    }
 
  }

  public function ShowListUser(){
    if(isset($_SESSION['name'])){
      $id = $_SESSION['name']['ID'];
      $action = $this->Model("UserModel");
      $result= $action->ShowListChat($id);
      while($row= mysqli_fetch_array($result)){
        echo '
        <div class="user" onclick="ShowMesseage('.$row['ID'].')">
        <input type="hidden" name="" id="userid" value='.$row['ID'].'>
                <div class="img">
                    <img src="http://localhost/php_mvc/public/image/'.$row['Image'].'" alt="">
                </div>
                <div class="name-user">
                    <span class="name">'.$row['FullName'].'</span>
                </div>
            </div>';
    }

   }
  }
  public function ChatContent(){
    if(isset($_SESSION['name'])){
      $id = $_SESSION['name']['ID'];
      $id2 = $_POST['id'];
      $action= $this->Model("UserModel");
      $result = $action->ContentChat($id,$id2);
if(mysqli_num_rows($result)==0){
echo '<span class="Nomess">
No messages in chat</span>';
}
else{
  while($row= mysqli_fetch_array($result)){
    if($row['FromUser']==$id){
      echo ' <div class="from">
      <div class="from-user">
      '.$row['messeage'].'
      </div>
   </div>';
    }
    else{

   echo ' <div class="to">
   <div class="to-user">
      '.$row['messeage'].'
   </div>
  </div>';
    }
  }
}
    }
  }
  public function ShowUser(){
$id = $_POST['id'];
$action = $this->Model("UserModel");
$result =$action->ShowIfUser($id);
while($row = mysqli_fetch_array($result)){
  echo json_encode($row);
}
  }
  public function SendMess(){
    $to = $_POST['to'];
    $from = $_SESSION['name']['ID'];
    $mess = $_POST['mess'];
    $action = $this->Model('UserModel');
    $action->SendChat($from,$to,$mess);
  }
  public function AceptedBuyer(){
$id = $_POST['id'];
$action = $this->Model("UserModel");
$action->Addsell($id);
$action->ClearOrder($id);
$action->ClearOrderDetail($id);
  }
  public function OrderList(){
    $action = $this->Model("UserModel");
  $result=  $action->ShowOrder();
  $index =0;
  while($row=mysqli_fetch_array($result)){
    echo '<div class="content">
    <div class="index ct">'.++$index.'</div>
    <div class="name ct">'.$row['FullName'].'</div>
    <div class="email ct">'.$row['Username'].'</div>
    <div class="total ct">'.$row['Total'].'</div>
    <div class="address ct">'.$row['Address'].'</div>
    <div class="phone ct">'.$row['PhoneNumber'].'</div>
    <div class="view ct">
       <div class="confirm">
        <button onclick="AceptOrder('.$row['ID'].')">Order Confirm</button>
       </div>
<div class="detail">
<button onclick="ShowDetail('.$row['ID'].')">Order details</button>
</div>
    </div>
</div>';
  }
  }
  public function HandleRegis(){
    $action =$this->Model("UserModel");

    $targetdir="public/image/";
    if(isset($_FILES['file']['name'])){
     $target_file = $targetdir . basename($_FILES['file']['name']);
     $uploadOk=1;
     $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES['file']['tmp_name']);
  if($check!==false){
    $uploadOk=1;
  }
  else{
    echo "It's not image";
    $uploadOk=0;
  }
  
  if(file_exists($target_file)){
    $uploadOk = 0;
  }
  if ($_FILES["file"]["size"] > 600000) {
    $uploadOk = 0;
    echo "Your image have big size";
  }
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $uploadOk = 0;
    echo "Change type image to use(jpg,png,jpeg,gif)";
  }
  if($uploadOk==0){
    //nọthig
  } else{
    $file=$_FILES['file']['name'];
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $addr = $_POST['addrs'];
   $result= $action->Checkexitsuser($user);
   if(mysqli_num_rows($result)==0){
     $hasspass=password_hash($pass,PASSWORD_DEFAULT);
     $action->Register($user,$hasspass,$fullname,$addr,$phone,$file); 
     move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
   }
else{
 echo "Your email is used";
}
   
  }
  
    }
  }
  public function HandleLogin(){
    $action =$this->Model("UserModel");
    $user = $_POST['username'];
    $pass= $_POST['pasword'];
$result=$action->ShowUserByUserName($user);
if(mysqli_num_rows($result)==1){
  while($row=mysqli_fetch_array($result)){
    $passDb = $row['Password'];
  }
  if(password_verify($pass,$passDb)) {
    $name = $action->getNameLogin($user);
    $_SESSION['name']=$name;
echo "http://localhost/php_mvc/home";
  }
  else{
  echo 'Password is incorrect';
  }
}else{
  echo 'Email is incorrect';
}
}

public function PriceSearch(){
  
  $keySearch = $_POST['keySearch'];
  $type = $_POST['typeChecked'];
  $action =$this->Model("UserModel");
  if(isset($_POST['price'])){
    $price = $_POST['price'];
    switch ($price) {
      case '<20$':
      $result= $action->SearchbyUserL(20,$keySearch,$type);
  
        break;
      case '20$-50$':
        $result= $action->SearchbyUser(20,50,$keySearch,$type);
        break;
      case '50$-100$':
        $result= $action->SearchbyUser(50,100,$keySearch,$type);
        break;
      case '>100$':
        $result= $action->SearchbyUserH(100,$keySearch,$type);
        break;
    }
  }else {
    $result = $action->SearchbyUserNoPrice($keySearch,$type);
  }
 
  if(mysqli_num_rows($result)!=0){
    while($row = mysqli_fetch_array($result)){
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
    <script>
    try{
      var items=$(".ultra-box .box");
      var numItems = items.length;
      var perPage=3;
      items.slice(perPage).hide();
      $("#pagination-container").pagination({
          items: numItems,
          itemsOnPage: perPage,
          prevText: "<<",
          nextText: ">>",
          onPageClick:function(pageNumber){
              var showFrom = perPage *(pageNumber-1);
              var showTo = showFrom+perPage;
              items.hide().slice(showFrom,showTo).show();
          }
      });
    }catch(error){
    
    }
    </script>
    ';
     
         
       }
  } else{
   echo ' <div class="nope-product">
   <img src="http://localhost/php_mvc/public/image/emptyproduct.svg" alt="">
   </div>
   <div class="text-tb">
   Your product not exits
   </div>';
  }
  
}
}

?>


