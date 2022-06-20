var objDiv = document.querySelector(".field-chat");
objDiv.onmouseenter = ()=>{
    objDiv.classList.add('active');
}
objDiv.onmouseleave = ()=>{
    objDiv.classList.remove('active');
}
function ShowMesseage(id){
    const show = document.querySelector('.right-c');
    show.style.display='block';
$.ajax({
    type: "POST",
    url: "http://localhost/php_mvc/Ajax/ShowUser",
    data: {id},
    success: function (response) {
        const data = JSON.parse(response);
        document.querySelector('.title .img img').src="http://localhost/php_mvc/public/image/"+data['Image'];
        document.querySelector('.title .name-title').innerText=data['FullName'];
        document.querySelector('.title-id').value= data['ID'];
     
setInterval(     function ShowChat(){
    const id = document.querySelector('.title-id').value
     $.ajax({
         type: "POST",
         url: "http://localhost/php_mvc/Ajax/ChatContent",
         data: {id},
         success: function (response) {
         $('.field-chat').html(response);
         if(!objDiv.classList.contains("active")){
            objDiv.scrollTop = objDiv.scrollHeight;
          }
         }
     });

 },300)
          

    }
});

    }

function SendMess(){
    const to =document.querySelector('.title-id').value;
const mess = document.querySelector('#mess-content').value;
if(mess!=""){
    $.ajax({
        type: "POST",
        url: "http://localhost/php_mvc/Ajax/SendMess",
        data: {to,
            mess
        },
    
        success: function (response) {
     
            document.querySelector('#mess-content').value="";
            const id = document.querySelector('.title-id').value
            $.ajax({
                type: "POST",
                url: "http://localhost/php_mvc/Ajax/ChatContent",
                data: {id},
                success: function (response) {
                $('.field-chat').html(response);
                objDiv.scrollTop = objDiv.scrollHeight;
                }
            });
        }
    });
}

}



    const mess=document.querySelector('.pop-up');
    const father=document.querySelector('.father');
    var x =0;
    mess.addEventListener('click',()=>{
        if(x==0){
            $.ajax({
                type: "POST",
                url: "http://localhost/php_mvc/Ajax/ShowListUser",
                success: function (response) {
                    $('.users').html(response);
                }
            });
            father.style.display= "block";
            x++;
        }
        else if(x==1){
            father.style.display= "none";
            x--;
        }
    
    })

 