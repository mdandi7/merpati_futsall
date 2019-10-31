/* 
File : JSfunction.js
Author : Danny Bastian M.
Use : Every Javascript function will be placed here for merpati_futsal project.
Version : 1.0.0
*/

//Autofill date field in page
function fillDate(e){
  var tgl = e;
  var today = new Date();
  if(today.getDate() < 10){
    var date = '-0'+today.getDate();
  }else{
    var date = '-'+today.getDate();
  }
  if((today.getMonth()+1) < 10){
    var month = '-0'+(today.getMonth()+1);
  }else {
    var month = '-'+(today.getMonth()+1);
  }

  var fullDate = today.getFullYear()+month+date;
  document.getElementById(tgl).value = fullDate;
}

//Auto disable button based on current time
function fillButton(e){
  var today = new Date();
  var hours = today.getHours();
  var jam = e;

  var lapA = jam+'lapA';
  var lapB = jam+'lapB';
  var lapBat = jam+'lapBat';
    
  if(hours >= jam){
    document.getElementById(lapA).disabled = true;
    document.getElementById(lapB).disabled = true;
    document.getElementById(lapBat).disabled = true;
  }
}

//this function will disabled unnecessary button
function fillButtonOnclick(tgl,id){
  
  var today = new Date();
  var choosenDate = new Date(tgl);
  var hours = today.getHours();
  var tgl = parseInt(tgl.substring(8));

  if(today.getDate() < 10){
    var date = '-0'+today.getDate();
  }else{
    var date = '-'+today.getDate();
  }
  if((today.getMonth()+1) < 10){
    var month = '-0'+(today.getMonth()+1);
  }else {
    var month = '-'+(today.getMonth()+1);
  }
  var fullDate = today.getFullYear()+month+date;
  var today = new Date(fullDate);

  var jam = [7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22];
  for (var i = 0;i < jam.length; i++){
    var lap = jam[i]+id;
    
    document.getElementById(lap).disabled = false;
    if(choosenDate < today){
      document.getElementById(lap).disabled = true;
    }else if((choosenDate.getTime() === today.getTime()) && (hours >= jam[i])){ 
      document.getElementById(lap).disabled = true; 
    }
  }
}

//Autofill form booking when time button clicked
function fillFormBooking(e,lap){
  var fieldTgl = 'tgl'+lap;
  var tgl = document.getElementById(fieldTgl).value;
  var lap = 'Lapangan '+lap.substring(3);
  document.getElementById('tglForm').value = tgl;
  document.getElementById('jam').value = e;
  document.getElementById('lapangan').value = lap;
}
