var loadFile = function(event) {
    var output = document.getElementById('preview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  
  const signupbtn= document.querySelector('.signup-btn');
  const loginform = document.querySelector('.container');
  const regisform = document.querySelector('.signup-form');
  const signinbtn = document.querySelector('.Loginnow');
  const img = document.querySelector('#preview');
  const dky = document.querySelector('.singup-btn');
  const loginbtn = document.querySelector('.Login');

  signupbtn.addEventListener('click',()=>{
   loginform.classList.add('active');
   regisform.classList.add('active');
   img.classList.add('active');
  })
  signinbtn.addEventListener('click',()=>{
   loginform.classList.remove('active');
   regisform.classList.remove('active');
   img.classList.add('active');
  })
  dky.addEventListener('click',(e)=>{
      e.preventDefault();
      const file=$('#image-title').prop('files')[0];
     const user= document.querySelector('#email-title').value;
     const fullname= document.querySelector('#fullname-title').value;
     const addrs= document.querySelector('#Address-title').value;
     const phone= document.querySelector('#phonenumber-title').value;
     const pass= document.querySelector('#pass-title').value;
 
     const form_data = new FormData();
     form_data.append('user',user);
     form_data.append('fullname',fullname);
     form_data.append('addrs',addrs);
     form_data.append('phone',phone);
     form_data.append('pass',pass);
     form_data.append('file',file);
     $.ajax({
         type: "POST",
         url: "http://localhost/php_mvc/Ajax/HandleRegis",
         data: form_data,
         contentType:false,
         processData:false,
         cache:false,
         success: function (response) {
       if(response.trim()==""){
        loginform.classList.remove('active');
        regisform.classList.remove('active');
        img.classList.add('active');
       }
       else{
        document.querySelector(".error-regis").innerText=response;
       }

         }
     });
  });

  loginbtn.addEventListener("click",(e)=>{
    const username = document.querySelector(".email-login").value;
    const pasword = document.querySelector(".pass-login").value;
    $.ajax({
      type: "POST",
      url: "http://localhost/php_mvc/Ajax/HandleLogin",
      data: {
        username,
        pasword
      },
      success: function (response) {
        if("http://localhost/php_mvc/home"!=response.trim()){
          document.querySelector('.error-login').innerText = response;
        }
        else{
          location.replace('http://localhost/php_mvc/home');
        }
     
      },
      error: function(response){
  console.log(response);
      }
    });

  })

