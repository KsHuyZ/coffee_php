const LikeShowCmt = (replyID) => {
    const id = $('#hide_input').val()
    $.ajax({
        url: "http://localhost/php_mvc/Ajax/showreply",
    data:{
    id:id,
    replyID:replyID
    },
    method:"POST",
        success: function (data) {
    $('.comment_reply_tiny_'+replyID).html(data);
    
   
        }
    })
}

function showcomment(){
    var id = $('#hide_input').val();
$.ajax({
    url: "http://localhost/php_mvc/Ajax/showcomment",
data:{
id:id
},
method:"POST",
    success: function (data) {
$('.bigwrap').html(data);
    }
});
}
    showcomment();
$(document).ready(function () {
 
    var id = $('#hide_input').val();
    var replyID=$('.hide_id').val();
    $('.add_comment_btn').on('click', function () {
            var cmt = $('.comment_textbox').val();
            var id = $('#hide_input').val();
   
    if (cmt == '') {
                alert('Nooo');
            } else {
                $.ajax({
                    url: "http://localhost/php_mvc/Ajax/addcomment",
                    method: "POST",
                    data: {
                        cmt: cmt,
                        id: id
                    },
                    success: function (data) {
                        $('#form')[0].reset();
                        showcomment();
                    }
                });
    }
 


});
});


var JJ = document.querySelectorAll.bind(document);
var J = document.querySelector.bind(document);
const options=JJ('.option');
options.forEach((option)=>{
    option.onclick=function(){
        J('.option.active').classList.remove('active');
       this.classList.add('active');
    }
})
const increase =document.getElementById('increase');
const decrease = document.getElementById('decrease');
increase.addEventListener('click',()=>{
    var num = document.querySelector('.sl').value;
    num++;
    document.querySelector('.sl').value=num++;
})
decrease.addEventListener('click',()=>{
    var num = document.querySelector('.sl').value;
if(num>1){
    num--;
    document.querySelector('.sl').value=num--;
}
})
function AddCart(){ //Đây là hàm thêm nè
  const name=  $('.left .name').text();
const size =document.querySelector('.option.active').innerText;
var quantity = $('.sl').val(); 
var price = document.querySelector('.PriceNum').innerText;
var image = document.querySelector('.center input').value;
var id = $('#hide_input').val();
var idu=$('.iduser_hide').val();
$.ajax({
    url: "http://localhost/php_mvc/Ajax/AddtoCart",
    data: {
        name:name,
    size:size,
    qty:quantity,
    price:price,
    img:image,
    idp:id,
    idu:idu
    },
 method:"POST",
    success: function (response) {
console.log(response);
    }
});

}

function showreply(replyID){
var reply = document.querySelectorAll('.comment_reply_tiny_'+replyID+' .wrapper_comment_tiny');
var inputrep = document.querySelector('.reply_comment_'+replyID);

var send_cmt = document.querySelector('.btn_send_'+replyID);
if(reply.length==0){
    var id = $('#hide_input').val();
    $.ajax({
        url: "http://localhost/php_mvc/Ajax/showreply",
    data:{
    id:id,
    replyID:replyID
    },
    method:"POST",
        success: function (data) {
    $('.comment_reply_tiny_'+replyID).html(data);
    if(reply.length==0){
        
    }
    document.querySelector('.rep'+replyID+' .buttonnn').innerHTML="Hidden reply";
    inputrep.style.display="block";
    send_cmt.style.display="block";
        }
    });
    console.log('Success'); 
}
if(reply.length!=0){
    var id = $('#hide_input').val();
    $.ajax({
        url: "http://localhost/php_mvc/Ajax/showreply",
    data:{
    id:id,
    replyID:0
    },
    method:"POST",
        success: function (data) {
    $('.comment_reply_tiny_'+replyID).html(data);
    document.querySelector('.rep'+replyID+' .buttonnn').innerHTML="Show reply";
    inputrep.style.display="none";
    send_cmt.style.display="none";
        }
    });
    console.log('Failed');
}
};

function reply(replyID){
    var rcmt = $('.reply_comment_'+replyID).val();
    var rid = $('#hide_input').val();
if (rcmt == '') {
        alert('Nooo');
    } else {
        $.ajax({
            url: "http://localhost/php_mvc/Ajax/reply",                    
            data: {
                rcmt: rcmt,
                rid: rid,
                replyID:replyID
            },
            method: "POST",
            success: function (data) {  
            $('.repForm_'+replyID)[0].reset();
            var id = $('#hide_input').val();
            $.ajax({
                url: "http://localhost/php_mvc/Ajax/showreply",
            data:{
            id:id,
            replyID:replyID
            },
            method:"POST",
                success: function (data) {
            $('.comment_reply_tiny_'+replyID).html(data);
                }
            });
            }
        });
    }
}


function Like(id,replyid){
    $.ajax({
        type: "POST",
        url: "http://localhost/php_mvc/Ajax/Like",
        data: {id,
        like:true
        },
        success: function (response) {
            if(typeof replyid !=='undefined'){
                LikeShowCmt(replyid)
               
              }
              else{
                showcomment();
              }
        }
    });
}
function Unlike(id,replyid){
    $.ajax({
        type: "POST",
        url: "http://localhost/php_mvc/Ajax/Like",
        data: {id,
        Unlike:true
        },
        success: function (response) {
            if(typeof replyid !=='undefined'){
                LikeShowCmt(replyid)
               
              }
              else{
                showcomment();
              }
        }
    });
}






