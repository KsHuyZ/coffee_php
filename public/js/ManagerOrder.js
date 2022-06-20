OrderList();
function ShowDetail(id){
   const activeform = document.querySelector('.acepted-form');
   activeform.classList.add('active');
$.ajax({
    type: "POST",
    url: "http://localhost/php_mvc/Ajax/ShowOrderDetail",
    data: {id},
    success: function (response) {
      const data = JSON.parse(response);
      console.log(data);
      document.querySelector('.des-addr').innerText=data['Address'];
      document.querySelector('.phone-number span').innerText=data['PhoneNumber'];
      document.querySelector('.name-des').innerText = data['FullName'];
      document.querySelector('.date-des').innerText= data['Time'];
      document.querySelector('.Total-ac').innerText= data['Total'];
    }
    ,
    error: function(data){
        console.log(data);
    }
});


$.ajax({
    type: "POST",
    url: "http://localhost/php_mvc/Ajax/ShowProductOrder",
    data: {id},
    success: function (response) {
        $('.list-products').html(response);
    }
});
}

function AceptOrder(id){
    $.ajax({
        type: "POST",
        url: "http://localhost/php_mvc/Ajax/AceptedBuyer",
        data: {id},
        success: function (response) {
            OrderList();
        }
    });
}
function OrderList(){
    $.ajax({
        type: "POST",
        url: "http://localhost/php_mvc/Ajax/OrderList",
        success: function (response) {
            $('.list').html(response);
        }
    });
}
