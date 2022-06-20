<?php 
class UserModel extends DB{
    public function SV(){
        $qr="SELECT * FROM thanhvien";
        return mysqli_query($this->conn,$qr);
    }
    public function ListCoffee(){
        $qr ="SELECT * FROM coffee WHERE isDel=0";
        return mysqli_query($this->conn,$qr);
    }
    public function Addproduct($name,$price,$file,$desc,$type,$qty){
        $qr="INSERT INTO coffee(Name,Price,Image,Description,type,quantity,isDel) VALUES('$name',$price,'$file','$desc','$type',$qty,0)";
        return mysqli_query($this->conn,$qr);
    }
    public function SDelProduct($id){
        $qr = "UPDATE coffee SET isDel=1 WHERE ID=$id";
        return mysqli_query($this->conn,$qr);
    }
    public function TrashList(){
        $qr ="SELECT * FROM coffee WHERE isDel=1";
        return mysqli_query($this->conn,$qr);
    }
    public function DelProduct($id){
        $qr="DELETE FROM coffee WHERE ID=$id";
        return mysqli_query($this->conn,$qr);
    }
    public function Restore($id){
        $qr = "UPDATE coffee SET isDel=0 WHERE ID=$id";
        return mysqli_query($this->conn,$qr);
    }
    public function getProductbyID($id){
        $qr = "SELECT * FROM coffee WHERE ID = '$id'";
        return mysqli_query($this->conn,$qr);
    }
    public function UpdateProduct($id,$name,$price,$file,$desc,$type,$qty){
        $qr ="UPDATE coffee SET Name='$name',Price=$price,Image='$file',Description='$desc',type='$type',quantity=$qty WHERE ID=$id";
        return mysqli_query($this->conn,$qr);
    }
    public function UpdateProductnoImg($id,$name,$price,$desc,$type,$qty){
        $qr ="UPDATE coffee SET Name='$name',Price=$price,Description='$desc',type='$type',quantity=$qty WHERE ID=$id";
        return mysqli_query($this->conn,$qr);
    }
    public function Tong($a,$b){
        return $a +$b;
    }
 
    public function checkLogin($username,$password){
        $qr="SELECT * FROM `user` WHERE Username = '$username' and Password = '$password'";
       $resullt= mysqli_query($this->conn,$qr);
if(mysqli_num_rows($resullt)==1){
    return true;

}else{
    return false;
}
    }
    public function getNameLogin($username){
        $qr="SELECT * FROM `user` WHERE Username = '$username'";
        $resullt= mysqli_query($this->conn,$qr);
        return mysqli_fetch_array($resullt);
        
    }
    public function pagination(){
        $qr="SELECT * FROM thanhvien LIMIT 0,3";
        return mysqli_query($this->conn,$qr);
    }
  public function Listcomment($id){
    $qr = "SELECT * FROM detailsproductcmt WHERE IDProduct=$id AND replyID IS NULL  ORDER BY ID DESC" ;
    return mysqli_query($this->conn,$qr);
  }
  public function Addcomment($username,$cmt_value,$id,$date,$iduser){
      $qr = "INSERT INTO `detailsproductcmt`(`parent_comment`, `FullName`, `comment_value`,`IDProduct`, `date`,`iduser`) VALUES (0,'$username','$cmt_value','$id','$date','$iduser')";
      return mysqli_query($this->conn,$qr);
  }
  public function Showreply($id,$rid){
    $qr = "SELECT * FROM detailsproductcmt WHERE IDProduct=$id AND replyID=$rid";
    return mysqli_query($this->conn,$qr);
  }
   public function Reply_comment($id,$rid,$username,$cmt_value,$date,$iduser){
$qr ="INSERT INTO `detailsproductcmt`(`parent_comment`, `FullName`, `comment_value`, `IDProduct`, `date`, `replyID`,`iduser`) VALUES (0,'$username','$cmt_value','$id','$date','$rid','$iduser')";
return mysqli_query($this->conn,$qr);
}
public function AddtoCart($idp,$name,$price,$image,$number,$size,$iduser){
$qr ="INSERT INTO `cart`( `Name`, `Price`, `Image`, `Number`, `Size`, `IDProduct`,`IDUser`) VALUES ('$name','$price','$image','$number','$size','$idp','$iduser')";
return mysqli_query($this->conn,$qr);
}
public function Checkexits($idp,$idu,$size){
$qr = "SELECT * FROM `cart` WHERE IDProduct=$idp AND IDUser = $idu AND Size = '$size'";
return mysqli_query($this->conn,$qr);
}
public function Updatequantity($idp,$number,$idu){
$qr="UPDATE `cart`  set Number = Number +$number WHERE IDProduct = $idp AND IDUser = $idu";
return mysqli_query($this->conn,$qr); 
}
public function CartList($iduser){
    $qr= "SELECT t.ID,t.IDProduct,c.Image,c.Name,c.quantity,t.Size,t.Number,c.Price FROM cart t INNER JOIN coffee c ON t.IDProduct= c.ID WHERE t.IDUser=$iduser";
    return mysqli_query($this->conn,$qr);
}
public function DelCart($idc){
    $qr = "DELETE FROM `cart` WHERE ID=$idc";
    return mysqli_query($this->conn,$qr);
}
public function Addsell($idu){
    $qr = "INSERT INTO sell(Name,Size,Number) SELECT c.Name,o.size,o.Number FROM order_details o INNER JOIN coffee c ON o.Product_id = c.ID WHERE o.Order_id='$idu'";
    return mysqli_query($this->conn,$qr);
}
public function ClearSell($idu){
    $qr = "DELETE FROM cart WHERE IDUser = $idu";
    return mysqli_query($this->conn,$qr);
}
public function AddOrder($id,$total){
    $qr = "INSERT INTO order_t(IdUser,Total) VALUES($id,$total)";
    return mysqli_query($this->conn,$qr);
}
public function AddOrderDetail($idorder,$idproduct,$number,$price,$size){
    $qr = "INSERT INTO order_details(Order_id,Product_id,Number,Price,size) VALUES($idorder,$idproduct,$number,$price,'$size')";
    return mysqli_query($this->conn,$qr);
  }
public function ShowSell(){

}
public function IncreBtn($id){
$qr = "UPDATE cart SET Number= Number+1 WHERE ID=$id";
return mysqli_query($this->conn,$qr);
}
public function DecreBtn($id){
$qr = "UPDATE cart SET Number= Number-1 WHERE ID=$id";
return mysqli_query($this->conn,$qr);
}
public function Demo(){
    $qr = "SELECT Name,Size,Month(Date) AS Month, Number from sell";
    return mysqli_query($this->conn,$qr);
}
public function AllUser(){
    $qr = "SELECT COUNT(*) FROM user WHERE isAdmin =0";
    return mysqli_query($this->conn,$qr);
}
public function LiveSearch($name,$isDel){
    $qr = "SELECT * FROM COFFEE WHERE Name LIKE '%$name%' AND isDel =$isDel";
    return mysqli_query($this->conn,$qr);
}
public function SearchType($name,$type){
    $qr ="SELECT * FROM COFFEE WHERE Name LIKE '%$name%' AND type ='$type' AND isDel =0";
    return mysqli_query($this->conn,$qr);
}
public function ShowType($type){
    $qr="SELECT * FROM COFFEE WHERE type ='$type' AND isDel =0";
    return mysqli_query($this->conn,$qr);
}
public function ShowTypeAll($isDel){
    $qr ="SELECT * FROM COFFEE WHERE isDel=$isDel";
    return mysqli_query($this->conn,$qr);
}
public function ShowTypeByNameAdmin($name,$type,$isDel){
$qr= "SELECT * FROM COFFEE WHERE Name LIKE '%$name%'  AND type ='$type' AND isDel =$isDel";
return mysqli_query($this->conn,$qr);
}
public function SearchTypeAdmin($name,$isDel){
    $qr= "SELECT * FROM COFFEE WHERE Name LIKE '%$name%' AND isDel =$isDel";
    return mysqli_query($this->conn,$qr);
}
public function ShowTypeAdmin($type,$isDel){
    $qr="SELECT * FROM COFFEE WHERE type ='$type' AND isDel =$isDel";
    return mysqli_query($this->conn,$qr);
}

public function SearchAll($name){
    $qr ="SELECT * FROM COFFEE WHERE Name LIKE '%$name%' AND isDel =0";
    return mysqli_query($this->conn,$qr);  
}

public function ShowListType(){
    $qr ="SELECT * FROM typecoffee";
    return mysqli_query($this->conn,$qr);
}
public function ShowTypeByID($id){
    $qr ="SELECT * FROM typecoffee WHERE ID='$id'";
    return mysqli_query($this->conn,$qr);
}
public function UpdateType($id,$name,$image){
    $qr= "UPDATE typecoffee SET `Type` ='$name',Image ='$image' WHERE ID =$id";
    return mysqli_query($this->conn,$qr);
}
public function UpdateTypeNoImg($id,$type){
    $qr= "UPDATE typecoffee SET `Type` ='$type' WHERE ID =$id";
    return mysqli_query($this->conn,$qr);
}
public function AddType($name,$image){
    $qr = "INSERT INTO typecoffee(Type,Image) VALUES('$name','$image')";
    return mysqli_query($this->conn,$qr);
}
public function getImageEditAdmin($id){
    $qr ="SELECT Image from typecoffee WHERE ID='$id'";
    return mysqli_query($this->conn,$qr);
}
public function DelTypee($id){
    $qr ="DELETE FROM typecoffee WHERE ID='$id'";
    return mysqli_query($this->conn,$qr);
}
public function GetIdInsert(){
    return mysqli_insert_id($this->conn);
}
public function ShowIfUser($id){
$qr = "SELECT * FROM user WHERE ID = $id";
return mysqli_query($this->conn,$qr);
}
public function ShowOrder(){
    $qr = "SELECT u.FullName,u.Username,u.Address,u.PhoneNumber,o.Total,o.ID FROM user u INNER JOIN order_t o ON u.ID=o.IdUser";
    return mysqli_query($this->conn,$qr);
}
public function ShowIfOrderDetail($id){
    $qr="SELECT u.FullName, u.Address,u.PhoneNumber,o.Total,o.Time FROM user u INNER JOIN order_t o ON u.ID=o.IdUser WHERE o.ID=$id";
    return mysqli_query($this->conn,$qr);
}
public function ShowProductOrder($id){
    $qr="SELECT c.Name,o.Number,o.Price,o.Size FROM coffee c INNER JOIN order_details o ON c.ID=o.Product_id WHERE Order_id=$id";
    return mysqli_query($this->conn,$qr);
}
public function TongBan($id){
    $qr = "INSERT INTO SELECT c.Name,o.Number,o.Price,o.Size FROM coffee c INNER JOIN order_details o ON c.ID=o.Product_id WHERE Order_id=$id";
    return mysqli_query($this->conn,$qr);
}
public function CheckisLike($iduser,$idcmt){
$qr ="SELECT * FROM likecmt
 WHERE IdUser=$iduser AND IDcmt=$idcmt";
    return mysqli_query($this->conn,$qr);
}
public function Like($id){
$qr ="UPDATE  detailsproductcmt SET clike= clike +1 WHERE ID=$id";
return mysqli_query($this->conn,$qr);
}
public function AddLike($idu,$id){
    $qr = "INSERT INTO likecmt(IdUser,IDcmt) VALUES($idu,$id)";
    return mysqli_query($this->conn,$qr);
}
public function UnLike($id){
    $qr ="UPDATE  detailsproductcmt SET clike= clike -1 WHERE ID=$id";
    return mysqli_query($this->conn,$qr);
}
public function DelLike($idu,$id){
    $qr = "DELETE FROM likecmt WHERE IDUser=$idu AND Idcmt = $id";
    return mysqli_query($this->conn,$qr);
}
public function ShowListChat($id){
    $qr = "SELECT * FROM user WHERE ID <> '$id'";
    return mysqli_query($this->conn,$qr);
}
public function ContentChat($id,$idc){
    $qr ="SELECT * FROM messeage WHERE  (FromUser=$id AND ToUser = $idc) OR (FromUser=$idc AND ToUser =$id)";
    return mysqli_query($this->conn,$qr);
}
public function SendChat($from,$to,$mess){
    $qr = "INSERT INTO messeage(FromUser,ToUser,messeage) VALUES ($from,$to,'$mess')";
    return mysqli_query($this->conn,$qr);
}
public function ClearOrder($id){
$qr = "DELETE FROM order_t WHERE ID='$id'";
return mysqli_query($this->conn,$qr);
}
public function ClearOrderDetail($id){
$qr = "DELETE FROM order_details WHERE Order_id = '$id'";
return mysqli_query($this->conn,$qr);
}
public function SellQuantity($id,$num){
    $qr= "UPDATE coffee SET quantity = quantity -$num WHERE ID = $id";
    return mysqli_query($this->conn,$qr);
}
public function Register($user,$pass,$fullname,$addr,$phone,$file){
    $qr = "INSERT INTO user(Username,Password,FullName,Address,PhoneNumber,isAdmin,Image) VALUES ('$user','$pass','$fullname','$addr','$phone',0,'$file')";
    return mysqli_query($this->conn,$qr);
}
public function ShowUserByUserName($username){
    $qr="SELECT Password FROM user WHERE Username='$username'";
    return mysqli_query($this->conn,$qr);
}
public function Checkexitsuser($username){
    $qr = "SELECT * FROM user WHERE Username ='$username'";
    return mysqli_query($this->conn,$qr);
}
public function SearchbyUserL($price,$keySearch,$type){
    if($type=='All'){
        $qr = "SELECT * FROM `coffee` WHERE Price < $price AND Name LIKE '%$keySearch%' AND isDel = 0 ";
    }
else{
    $qr = "SELECT * FROM `coffee` WHERE Price < $price AND Name LIKE '%$keySearch%' AND type='$type' AND isDel = 0";
}
return mysqli_query($this->conn,$qr);
}
public function SearchbyUserH($price,$keySearch,$type){
    if($type=='All'){
$qr = "SELECT * FROM `coffee` WHERE Price > $price AND Name LIKE '%$keySearch%' AND isDel = 0";
    }else{
        $qr = "SELECT * FROM `coffee` WHERE Price > $price AND Name LIKE '%$keySearch%' AND type='$type' AND isDel = 0";   
    }
return mysqli_query($this->conn,$qr);
}
public function SearchbyUser($price1,$price2,$keySearch,$type){
    if($type=='All'){
        $qr = "SELECT * FROM `coffee` WHERE Price BETWEEN $price1 AND $price2 AND Name LIKE '%$keySearch%' AND isDel = 0";
    }else{
        $qr = "SELECT * FROM `coffee` WHERE Price BETWEEN $price1 AND $price2 AND Name LIKE '%$keySearch%' AND type='$type' AND isDel = 0";
    }
return mysqli_query($this->conn,$qr);
}
public function SearchbyUserNoPrice($keySearch,$type){
    if($type=='All'){
        $qr = "SELECT * FROM `coffee` WHERE Name LIKE '%$keySearch%' AND isDel = 0";
            }else{
                $qr = "SELECT * FROM `coffee` WHERE Name LIKE '%$keySearch%' AND type='$type' AND isDel = 0";   
            }
        return mysqli_query($this->conn,$qr);
}
}
?>