<?php 
include './models/UserModel.php';
$record_per_page = 6;
$page='';
$output='';
if(isset($_POST['page'])){
    $page = $_POST['page'];
}
else{
    $page =1;
}
$star_from =($page-1) * $record_per_page;
$data=$this->ListCoffee($star_from,$record_per_page);
$total_record = mysqli_num_rows($data);
$total_page = ceil($total_record/$record_per_page);
for($i =0; $i<$total_page;$i++){
    $output.="<span class='pagination_link' id='".$i."'>".$i."</span>";
    echo $output;
}
?>