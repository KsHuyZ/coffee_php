   const closeacept= document.querySelector('.close-acepted');
   const formaceptt = document.querySelector('.acepted-form');
   const activeacept = document.querySelector('.active-acept'); 
   if(activeacept != null){
       console.log( activeacept)
    activeacept.addEventListener('click',()=>{
        var id=$('.iduser_hide').val();
        formaceptt.classList.add('active');
        $.ajax({
            type: "POST",
            url: "http://localhost/php_mvc/Ajax/IfBuyer",
            data: {id},
            success: function (response) {
              $('.list-products').html(response);
            },
            error: function (request, error) {
                console.log(arguments);
                alert(" Can't do because: " + error);
            },
        });
        $.ajax({
            type: "POST",
            url: "http://localhost/php_mvc/Ajax/InforUser",
            data: {id},
            success: function (response) {
                var total = 0;
                const Price= document.getElementsByClassName('pricei');
                const qty =document.querySelectorAll('#num');
                for(let i=0; i<Price.length; i++){
                   total += Price[i].value*qty[i].value;
                }
              const data=  JSON.parse(response);
              document.querySelector('.Total-ac').innerHTML=total;
              document.querySelector('.des-addr').innerHTML=data.Address;
              document.querySelector('.phone-number p').innerHTML=data.PhoneNumber;
            }
        });
    })
   }
if(closeacept!=null){
    closeacept.addEventListener('click',()=>{
        formaceptt.classList.remove('active');
    
    })
}


function CountTotal(){
    var total = 0;
   const Price= document.getElementsByClassName('pricei');
   const qty =document.querySelectorAll('#num');
   for(let i=0; i<Price.length; i++){
      total += Price[i].value*qty[i].value;
   }
   document.querySelector('.price-c').innerText="$"+total;
}
const navSlide =()=>{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav_link');
    const navLinks =document.querySelectorAll('.nav_link li');
    burger.addEventListener('click',()=>{
        //toggle nav
        nav.classList.toggle('nav-active');
           // Animated Link
    navLinks.forEach((link, index) => {
        if(link.style.animation){
            link.style.animation='';
        }else{
            link.style.animation = `navLinkFade 0.5s ease forwards ${index/2 +0.3}s`;
        }
            });
        //burger animation
        burger.classList.toggle('toggle');
    })
}
navSlide();
const Cartform = document.querySelector('.cart-form-container');
const FormClose = document.querySelector('.closeform');
const CartBtn = document.querySelector('.iconcart');
function delCart(id){ //Đây là hàm xóa nè
    $.ajax({
        url: "http://localhost/php_mvc/Ajax/DelCart",
        data: {
        id:id
        },
     method:"POST",
        success: function (response) {
          ShowCart();
        }
    });
}
if(FormClose !=null){
    FormClose.addEventListener('click',()=>{
        Cartform.classList.remove('active');
    })
    
    CartBtn.addEventListener('click',()=>{
    ShowCart();
        Cartform.classList.add('active');
    
    })
    
}
$(window).on("scroll", function() {
    if($(window).scrollTop() > 50) {
        $(".menu").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".menu").removeClass("active");
    }
});
function AddSell(id){
    const total = document.querySelector('.Total-ac').innerHTML;
    $.ajax({
     method:"POST",
        url: "http://localhost/php_mvc/Ajax/AddSell",
        data: {
            total,
            id:id
        },
        success: function (response) {
 ShowCart();
 console.log(response);
        }
    });
    }
    function ShowCart(){
        var id=$('.iduser_hide').val();
        $.ajax({
            url: "http://localhost/php_mvc/Ajax/CartList",
            data: {
            id:id
            },
         method:"POST",
            success: function (response) {
        $('.carts').html(response);
        CountTotal();
        const products =document.querySelectorAll('.product');
        products.forEach((product)=>{
            const increBtn = product.querySelector('.incre');
            const qty = product.querySelector('#num');
            const decreBtn = product.querySelector('.decre');
          if(increBtn){
            increBtn.addEventListener('click',()=>{
                const max = product.querySelector('.conlai').innerText;
if(product.querySelector('#num').value<Number(max)){
    qty.value++;
    product.querySelector('#num').value=qty.value++;
    const idcart = product.querySelector('.id_cart_hide').value;
    $.ajax({
      method:"POST",
       url: "http://localhost/php_mvc/Ajax/Incre",
       data: {
           idcart
       },
       success: function (response) {
       }
   });
    CountTotal();
}
 console.log(max);            
            })
          }
           
          
if(decreBtn){
    decreBtn.addEventListener('click',()=>{
        const idcart = product.querySelector('.id_cart_hide').value;
    if(product.querySelector('#num').value>1){
        qty.value--;
        product.querySelector('#num').value=qty.value--;
        $.ajax({
            method:"POST",
             url: "http://localhost/php_mvc/Ajax/Decre",
             data: {
                 idcart
             },
             success: function (response) {
             }
         });
        CountTotal();
    }
                })
}
        })
            }
        });
    }








