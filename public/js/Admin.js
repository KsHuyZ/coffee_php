
const count = document.querySelector('.count');
const speed = 1;

const updateCount = ()=>{
  const target = +count.getAttribute('data-target');
 const coun = +count.innerText;
 const inc = target/speed;
if(coun<target){
count.innerText= Math.round(coun +inc);
setTimeout(updateCount,3)
} else{
  coun.innerText=target;
}
}
updateCount();
const percent= document.querySelector('.bot');
const speedd = 80;
updatePercent = ()=>{
    const targett = +percent.getAttribute('data-up');
  const percen = +percent.innerText;
  const inc = targett/speedd;
  if(percen<targett){
    percent.innerText= Math.round(percen +inc);
    
    setTimeout(updatePercent,10)
    } else{
      percen.innerText=targett;
    }

}
updatePercent();
$(document).ready(function () {
  $.ajax({
   method:"GET",
    url: "http://localhost/php_mvc/Ajax/Chartjs",
    success: function (response) {
// Forlinejs
var month={
  Jan:0,
  Feb:0,
  Mar:0,
  Apr:0,
  May:0,
  June:0,
  July:0,
  Aug:0,
  Sep:0,
  Oc:0,
  No:0,
  Dec:0
};
      // For bar js
      var number={
        M:0,
        S:0,
        L:0,
        XL:0
      };  
    for(let i =0; i<response.length; i++){
      if(response[i].Size=="S"){
        number.S= number.S+Number(response[i].Number);
    
      }
       if(response[i].Size=="M"){
        number.M= number.M+Number(response[i].Number);
  
      }
      if(response[i].Size=="L"){
        number.L=  number.L+Number(response[i].Number);
      // console.log(number.L);
      }
       if(response[i].Size=="XL"){
        number.XL= number.XL+Number(response[i].Number);
      }
      if(response[i].Month=="1"){
        month.Jan +=Number(response[i].Number);
        console.log(month.Jan);
      }
      if(response[i].Month=="2"){
        month.Feb +=Number(response[i].Number);
        
      }
      if(response[i].Month=="3"){
        month.Mar +=Number(response[i].Number);
        
      }
      if(response[i].Month=="4"){
        month.Apr +=Number(response[i].Number);
        
      }
      if(response[i].Month=="5"){
        month.May +=Number(response[i].Number);
        
      }
      if(response[i].Month=="6"){
        month.June +=Number(response[i].Number);
        
      }
      if(response[i].Month=="7"){
        month.July +=Number(response[i].Number);
        
      }
      if(response[i].Month=="8"){
        month.Aug +=Number(response[i].Number);
        
      }
      if(response[i].Month=="9"){
        month.Sep +=Number(response[i].Number);
        
      }
      if(response[i].Month=="10"){
        month.Oc +=Number(response[i].Number);
        
      }
      if(response[i].Month=="2"){
        month.No +=Number(response[i].Number);
        
      }
      if(response[i].Month=="2"){
        month.Dec +=Number(response[i].Number);
        
      }
   
      
    }
    var ctx = document.getElementById('myChart3');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['M', 'L', 'S', 'XL'],
            datasets: [{
                label: '# of Votes',
                data: [number.M,number.L,number.S,number.XL],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
              
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
  
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    const line = document.getElementById('myChart2');
 const myChart1 = new Chart(line, {
  type: 'line',
  data: {
    labels:[
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December'
],
    datasets: [{
    label: 'My First Dataset',
    data: [month.Jan,month.Feb,month.Mar,month.Apr,month.May,month.June,month.July,month.Aug,month.Sep,month.Oc,month.No,month.Dec],
    fill: false,
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
  },
  options: {
   	//cutoutPercentage: 40,
    responsive: true,

  }
});
    },
    error: function(response){
      console.log(response);
    }
  });
});
 