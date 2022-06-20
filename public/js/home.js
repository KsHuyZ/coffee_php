
const imgBtn =document.querySelectorAll('.img-btn');
imgBtn.forEach(btn =>{
    btn.addEventListener('click',()=>{
        document.querySelector('.controls .active').classList.remove('active');
        btn.classList.add('active');
        const src = btn.getAttribute('data-src');
        document.querySelector('#img-slider').src=src;
    })
})
var counter=1;
setInterval(function(){
    document.getElementById('radio'+counter).checked = true;
    counter++;
    if(counter>4){
        counter = 1;
    }
},5000)
