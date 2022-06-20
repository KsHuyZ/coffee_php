var keyword = document.querySelector(".search-input");
const AddActive = document.querySelector(".call_active");
const AddForm = document.querySelector(".addproduct-form");
const EditForm = document.querySelector(".editproduct-form");
const CloseFormm = document.querySelector(".closeform ion-icon");
const ProdctDel = document.querySelector(".productdel");
const ProdctList = document.querySelector(".listprdct");
const imageshow = document.querySelector("img#preview");
const isDel = document.querySelector("#isDel").value;
imageshow.style.display = "none";
ProdctList.style.display = "none";
ProdctList.addEventListener("click", () => {
  ProdctList.style.display = "none";
  ProdctDel.style.display = "block";
  document.querySelector("#isDel").value = 0;
  CountTrash();
  console.log(isDel);
});
ProdctDel.addEventListener("click", () => {
  ProdctList.style.display = "block";
  ProdctDel.style.display = "none";
  document.querySelector("#isDel").value = 1;
});
AddActive.addEventListener("click", () => {
  console.log(imageshow);
  AddForm.classList.add("active");
  setTimeout(() => (imageshow.style.display = "block"), 3000);
});
CloseFormm.addEventListener("click", () => {
  AddForm.classList.remove("active");
  imageshow.style.display = "none";
});

function CountTrash() {
  $.ajax({
    type: "POST",
    url: "http://localhost/php_mvc/Ajax/CountTrash",
    success: function (response) {
      $(".trashnum").html(response);
    },
  });
}
function DelPr(id) {
  $.ajax({
    type: "POST",
    url: "http://localhost/php_mvc/Ajax/SDeleteProduct",
    data: {
      id: id,
    },
    success: function (response) {
      ShowProductList();
      CountTrash();
    },
  });
}

function Restore(idp) {
  $.ajax({
    type: "POST",
    url: "http://localhost/php_mvc/Ajax/RestoreProduct",
    data: { idp: idp },
    success: function (response) {
      TrashList();
    },
  });
}
function DelTr(id) {
  $.ajax({
    type: "POST",
    url: "http://localhost/php_mvc/Ajax/DelTrash",
    data: { id: id },
    success: function (response) {
      TrashList();
    },
  });
}
var JJ = document.querySelectorAll.bind(document);
var J = document.querySelector.bind(document);
const options = JJ(".option");
options.forEach((option) => {
  option.onclick = function () {
    var type = this.innerText;
    const isDel = document.getElementById("isDel").value;
    J(".option.active").classList.remove("active");
    this.classList.add("active");
    $.ajax({
      type: "POST",
      url: "http://localhost/php_mvc/Ajax/ShowTypeAdmin",
      data: {
        type: type,
        isDel: isDel,
      },
      success: function (response) {
        $(".row-products").html(response);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(ajaxOptions);
        console.log(thrownError);
      },
    });
  };
});
