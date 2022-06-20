var keyword = document.querySelector(".search-input");

try {
  var items = $(".ultra-box .box");
  var numItems = items.length;
  var perPage = 3;
  items.slice(perPage).hide();
  $("#pagination-container").pagination({
    items: numItems,
    itemsOnPage: perPage,
    prevText: "<<",
    nextText: ">>",
    onPageClick: function (pageNumber) {
      var showFrom = perPage * (pageNumber - 1);
      var showTo = showFrom + perPage;
      items.hide().slice(showFrom, showTo).show();
    },
  });
} catch (error) {}

const all = document.querySelector(".all");

const milk = document.querySelector(".milk");
const tea = document.querySelector(".tea");
const frappe = document.querySelector(".frappe");
var JJ = document.querySelectorAll.bind(document);
var J = document.querySelector.bind(document);
const options = JJ(".option");
options.forEach((option) => {
  option.onclick = function () {
    J(".option.activee").classList.remove("activee");
    this.classList.add("activee");
    var type = document.querySelector(".activee").innerText;
    const radio = document.querySelector(
      "input[type=radio][name=price]:checked"
    );

    if (type == "All") {
      if (radio) {
        radio.checked = false;
        ShowByPrice();
      }
     
    }
    else{
      if(radio){
        ShowByPrice(radio.value);
      }else{
        ShowByPrice();
      }
    
    }
   
  };
  $(".search-input").keyup(function () {
    var type = document.querySelector(".activee").innerText;
    ShowByPrice();
  });
});
const ShowByPrice = (price) => {
  const keySearch = document.querySelector(".search-input").value;
  const typeChecked = document.querySelector(".activee").innerText.trim();
 
  $.ajax({
    type: "POST",
    url: "http://localhost/php_mvc/Ajax/PriceSearch",
    data: {
      keySearch,
      typeChecked,
      price,
    },
    beforeSend: function (response) {
      $(".ultra-box").html('<div class="lds-dual-ring"></div>');
    },
    success: function (response) {
      setTimeout(() => {
        $(".ultra-box").html(response);
      }, 500);
    },
  });
};

$("input[type=radio][name=price]").change(function () {
  ShowByPrice(this.value);
});
