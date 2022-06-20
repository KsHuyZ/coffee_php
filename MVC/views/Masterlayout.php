<?php include './mvc/views/block/header.php';
require_once './mvc/views/pages/'.$data["Page"].'.php';
if(isset($_SESSION['name'])){
    include './mvc/views/block/chat.php';
}
include './mvc/views/block/footer.php';
?>