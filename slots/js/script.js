var machine1=null;
var machine2=null;
var machine3=null;
var machine4=null;
var machine5=null;
var randomNumbers=null;

var resultIcon="";
var resultType="";

var money=0;
var tempMoney=0;

var headerPhoto =null;
var headerMoney=null;

var result=["cherries","oranges","grapefruits","bells","bars","sevens"];



$(document).ready(function(){
  start();
    

    $("#playButton").click(verify);
   
});

function start(){
    machine1 = $('#machine1').slotMachine({ delay: 0 });
    machine2 = $('#machine2').slotMachine({ delay: 0 });
    machine3 = $('#machine3').slotMachine({ delay: 0 });
    machine4 = $('#machine4').slotMachine({ delay: 0 });
    machine5 = $('#machine5').slotMachine({ delay: 0 });

    $.ajax({
        url:"http://casino/checkLoggedIn.php",
        dataType:"json",
        success: done
      });
}

function done(data){

  
  if(data.loggedIn){
    headerMoney=data.money;
    headerPhoto="http://casino/"+data.photo;

    $("#header").load('http://casino/header/loggedInHeader.html',headerLoaded);
    $("#footer").load('http://casino/footer.html');

    
  }
  else{

    window.location = "http://casino/error/notLoggedIn.html";
    
    
  }
}

function headerLoaded(){
  $("#headerImg").attr("src",headerPhoto);
  $("#headerMoney").text(headerMoney);
}



function verify(){
   money = $("#chosenAmount").val();
  if(money!="" && money>=5 ){
      $.ajax({
        url: "http://casino/slots/verify.php?s="+money, 
        dataType: "json",
        success: run
      });
    }
    else{
      $("#result").text("Bet must be above 5 gold coins");
     $("#winner").text("");
    }
  
}


function run(data){
  if(data.check){
   spent();
   playButtonClick();
  }
  else{
    $("#result").text("Insufficient funds");
    $("#winner").text("");

    }
}


function spent(e){

  tempMoney=0;
  
  console.log("user spent:"+money);
  
  $.ajax({
    url: "http://casino/slots/spentMoney.php?s=" + money, 
    dataType: "json",
    success: updatedMoney
  });
  
  }
function updatedMoney(data){
  
    $('#headerMoney').text(data.money);
    tempMoney=data.tempMoney;

}


function playButtonClick(){
  
  $.ajax({
    url: "json.php", 
    dataType: "json",
    success: shuffleSlots
  });
  
}


function shuffleSlots(data){
  randomNumbers=data;
  $("#winner").text("");
  $("#result").text("");
  machine1.shuffle(4);
  machine1.nextActive = randomNumbers.col1;

  machine2.shuffle(5);
  machine2.nextActive = randomNumbers.col2;

  machine3.shuffle(6);
  machine3.nextActive = randomNumbers.col3;

  machine4.shuffle(7);
  machine4.nextActive = randomNumbers.col4;

  machine5.shuffle(8,complete);
  machine5.nextActive = randomNumbers.col5;


}



function win(){
  var userSpent = $("#chosenAmount").val();
  $.ajax({
    url: "http://casino/slots/winSlots.php?i="+resultIcon+"&t="+resultType+"&s="+userSpent+"&h="+tempMoney, 
    dataType: "json",
    success: checkWin
  });
   
}

function checkWin(data){
  if(data.check){
    $("#headerMoney").text(data.money);
    $("#winner").append("You won! "+ data.win+" gold coins"+"<br>");
    console.log("winnings: "+data.win);
    console.log("-------------");
  }
  else{
    $("#result").text("");
    $("#winner").text("");
  }
}

function complete(action){

        resultIcon=null;
        resultType=null;
  var completeText="";
  

  var n1=randomNumbers.col1;
  var n2=randomNumbers.col2;
  var n3=randomNumbers.col3;
  var n4=randomNumbers.col4;
  var n5=randomNumbers.col5;

  var slots = [("a"+n1), ("b"+n2), ("c"+n3) , ("d"+n4) , ("e"+n5) ];

  //winner-winner chicken dinner
  for(var i=0;i<6;i++){
    if(containsAll([("a"+i),("b"+i), ("c"+i),("d"+i),("e"+i)], slots)){
        completeText= "winner winner chicken dinner";
        $('#result').text(completeText);
        resultIcon=result[i];
        resultType=5;
        win();
        return;
      }
    }

   //Perfect- fourInaRow
    for(var i=0;i<6;i++){
    if(containsAll([("a"+i), ("b"+i),("c"+i),("d"+i)], slots)){
        completeText="Four of a Kind: "+result[i];
        $('#result').text(completeText);
        resultIcon=result[i];
        resultType=4;
        win();
        return;
      }
    }

    for(var i=0;i<6;i++){
    if(containsAll([("b"+i), ("c"+i),("d"+i),("e"+i)], slots)){
        completeText="Four of a Kind: "+result[i];
        $('#result').text(completeText);
        resultIcon=result[i];
        resultType=4;
        win();
        return;
      }
    }

  

//Perfect- triss
  for(var i=0;i<6;i++){
    if(containsAll([("a"+i), ("b"+i),("c"+i)], slots)){

        completeText="Three of a Kind: "+result[i];
        $('#result').append(completeText+"<br>");
        resultIcon=result[i];
        resultType=3;
         win();
         for(var j=0;j<6;j++){
            if(containsAll([("d"+j), ("e"+j)], slots)){
              completeText="Pair: "+result[j];
              $('#result').append(completeText);
              resultIcon=result[j];
              resultType=2;
               win();
            }
         }


        return;
      }
    }

    for(var i=0;i<6;i++){
    if(containsAll([("b"+i), ("c"+i),("d"+i)], slots)){
        completeText="Three of a Kind: "+result[i];
        $('#result').append(completeText);
        resultIcon=result[i];
        resultType=3;
        win();
        


        return;
      }
    }

    for(var i=0;i<6;i++){
    if(containsAll([("c"+i), ("d"+i),("e"+i)], slots)){
        completeText="Three of a Kind: "+result[i];
        $('#result').append(completeText+"<br>");
        resultIcon=result[i];
        resultType=3;
        win();
        for(var j=0;j<6;j++){
            if(containsAll([("a"+j), ("b"+j)], slots)){
              completeText="Pair: "+result[j];
              $('#result').append(completeText);
              resultIcon=result[j];
              resultType=2;
               win();
            }
         }

        return;
      }
    }


  //Perfect-pairs
  var fl="a";
  var sl="b";
  for(var i=0;i<4;i++){
    
    for(var j=0;j<6;j++){
      if(containsAll([(fl+j), (sl+j)], slots)){
        completeText="Pair of "+result[j];
        $('#result').append(completeText+"<br>");
        resultIcon=result[j];
        resultType=2;
        win();
      }
   }
   //first letter
   if(fl=="a"){
    fl="b";
   }
   else if(fl=="b"){
    fl="c";
   }
   else if(fl=="c"){
    fl="d";
   }

   //second letter
   if(sl=="b"){
    sl="c";
   }
   else if(sl=="c"){
    sl="d";
   }
   else if(sl=="d"){
    sl="e";
   }
  }
 

}


function containsAll(needles, haystack){ 
  for(var i = 0 , len = needles.length; i < len; i++){
     if($.inArray(needles[i], haystack) == -1) return false;
  }
  return true;
}

 $("#chosenAmount").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$(function() {
  $('#staticParent').on('keydown', '#chosenAmount', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})