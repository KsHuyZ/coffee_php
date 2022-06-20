function ShowType(id){
    const activeform = document.querySelector('.editform');
    activeform.classList.add('active');
  $.ajax({
      type: "POST",
      url: "http://localhost/php_mvc/Ajax/ShowTypeByID",
      data: {id},
      
      success: function (response) {
       const data= JSON.parse(response);
        document.querySelector('.IDT').value =data[0];
         document.querySelector('.nameedit').value=data[1];
         document.querySelector('.imgedit').src="http://localhost/php_mvc/public/image/"+data["Image"];
      }
  });
}
//Update
const update = document.querySelector('.upload-edit');
update.addEventListener('click',()=>{
var name = document.querySelector('.nameedit').value;
var file_data = $('#img-upload').prop('files')[0];
var id = document.querySelector('.IDT').value;
var form_data = new FormData();
form_data.append('type',name);
form_data.append('file',file_data);
form_data.append('id',id)
$.ajax({
  type: "POST",
  url: "http://localhost/php_mvc/Ajax/UpdateType",
  data: form_data,
  contentType:false,
  processData:false,
  cache:false,
  success: function (response) {
    ShowAllType();
    console.log(response);
  }
});
})


var AddForm = document.querySelector('.addform');
const closeF = document.querySelector('.close-add ion-icon');
closeF.addEventListener('click',()=>{
  
  AddForm.classList.remove('active');
})
var EditForm = document.querySelector('.editform');
const closeE =document.querySelector('.close ion-icon');
closeE.addEventListener('click',()=>{
EditForm.classList.remove('active');
})
const activeAdd = document.querySelector('.addbtnn');
activeAdd.addEventListener('click',()=>{
  AddForm.classList.add('active');
})
function ShowAllType(){
$.ajax({
  type: "POST",
  url: "http://localhost/php_mvc/Ajax/ShowTypeAll",
  success: function (response) {
   $('.row-products').html(response); 
  }
});
}
function DelType(id){
$.ajax({
  type: "POST",
  url: "http://localhost/php_mvc/Ajax/DeleType",
  data:{id},
  success: function (response) {
    ShowAllType();
  }
});
}


