var photo =null;
var money=null;

var playing=false;

var temp_money=null;
var betted_money=null;
var chips_array=[];

var playing_cards_array=[];

var players_cards_value=[];
var player_total_value=null;

var house_total_value=null;
var house_cards_value=[];


$(document).ready(function(){
	
	checkLoggedIn();

	 $("#flipBox").flip({
 		speed: 250,
		back: "#back",
		front: "#front",
		trigger: "manual"
    });
	 
	 
	
 });  



function load_chips(){

	$.ajax({
		url: "http://casino/blackJack/php/loadChips.php",
		dataType: "json",
		success: set_chips
	});
}

function set_chips(data){
	if(data.money>0){
		$("#first_row").append("<img src='http://casino/blackJack/chips_images/1.png' id='1a' class='press_chips'>");
	}
	if(data.money>4){
		$("#first_row").append("<img src='http://casino/blackJack/chips_images/5.png' id='5a' class='press_chips'>");
	}
	if(data.money>24){
		$("#first_row").append("<img src='http://casino/blackJack/chips_images/25.png' id='25a' class='press_chips'>");
	}
	if(data.money>49){
		$("#first_row").append("<img src='http://casino/blackJack/chips_images/50.png' id='50a' class='press_chips'>");
	}
	if(data.money>99){
		$("#first_row").append("<img src='http://casino/blackJack/chips_images/100.png' id='100a' class='press_chips'>");
	}
	if(data.money>499){
		$("#first_row").append("<img src='http://casino/blackJack/chips_images/500.png' id='500a' class='press_chips'>");
	}
	if(data.money>999){
		$("#first_row").append("<img src='http://casino/blackJack/chips_images/1000.png' id='1000a' class='press_chips'>");
	}
	if(data.money>4999){
		$("#first_row").append("<img src='http://casino/blackJack/chips_images/5000.png' id='5000a' class='press_chips'>");
	}
	temp_money=data.money;
	betted_money=0;
	chip_count={chip_count_1:0};
	$(".press_chips").click(spend_chips);
	
	
}
function remove_chips(e){
	var chip_value=parseInt(e.target.id);
	var count=parseInt($("#chip_count_"+chip_value).text());
	console.log(count);
	if(count>1){
		$("#chip_count_"+chip_value).text(count-1);
	}
	else{
		$("#"+chip_value+"b").remove();
		$("#chip_count_"+chip_value).remove();
		var index = chips_array.indexOf(chip_value);
		if (index > -1) {
		  chips_array.splice(index, 1);
		}

	}
	betted_money-=chip_value;
	temp_money+=chip_value;
	$("#players_bet_text").text("Your Bet: "+betted_money);
	var j=1;

	for(var i=0;i<8;i++){	
		if( $("#"+j+"a").closest('#chips_box').length==false ){
			if(temp_money>j){
				var img = $('<img />', {id: j+'a' ,src:'http://casino/blackJack/chips_images/'+j+'.png',class:'press_chips'});
				img.appendTo($("#first_row"));
				img.on('click',spend_chips);
			}
		}
		if(j==1){
			j=5;
		}
		else if(j==5){
			j=25;
		}
		else if(j==25){
			j=50;
		}
		else if(j==50){
			j=100;
		}
		else if(j==100){
			j=500;
		}
		else if(j==500){
			j=1000;
		}
		else if(j==1000){
			j=5000;
		}

	}

	


	
	
	
}


function spend_chips(e){
	if(playing==false){
		var chip_value=parseInt(e.target.id);
		if(chip_value<=temp_money){

			if(chips_array.includes(chip_value)==false){

				chips_array.push(chip_value);
				var img = $('<img />', {id: chip_value+'b' ,src:'http://casino/blackJack/chips_images/'+chip_value+'.png',class:'pressed_chips'});
				img.appendTo($("#player_first_row"));
				img.on('click',remove_chips);
	 
				$("#player_first_row").append("<span id='chip_count_"+chip_value+"' class='count_text'>1</span>");	
				

			}
			else{

				var value=parseInt($("#chip_count_"+chip_value).text());
				
				$("#chip_count_"+chip_value).text(value+1);
				
			}
			
			temp_money-=chip_value;
			betted_money+=chip_value;
			$("#players_bet_text").text("Your Bet: "+betted_money);
		}

		if(temp_money<1){
			$("#1a").remove();
			}
		if(temp_money<5){
			$("#5a").remove();	
		}
		if(temp_money<25){
			$("#25a").remove();	
		}
		if(temp_money<50){
			$("#50a").remove();	
		}
		if(temp_money<100){
			$("#100a").remove();	
		}
		if(temp_money<500){
			$("#500a").remove();	
		}
		if(temp_money<1000){
			$("#1000a").remove();	
		}
		if(temp_money<5000){
			$("#5000a").remove();	
		}
		

	}
}


function checkLoggedIn(){
	$.ajax({
		url:"http://casino/checkLoggedIn.php", 
		dataType:"json",
		success: checkLogindone
	});
}

function checkLogindone(data){
	if(data.loggedIn){
		$("#play").click(play);

		load_chips();

		money=data.money;
		photo="http://casino/"+data.photo;
		$("#header").load('http://casino/header/loggedInHeader.html',done);
		//$("#footer").load('http://casino/footer.html');
	}
	else{
		window.location = "http://casino/error/notLoggedIn.html";
	}
}

 function done(){
 	$("#headerImg").attr("src",photo);
	$("#headerMoney").text(money);
 }

function play(){
	
	if(playing || betted_money==0){

	}
	else{
		playing=true;
		$("#play").remove();

		
		var stay = $('<button>Stand</button>', {id: "stay" ,class:''});
		stay.appendTo($("#buttons"));
		stay.addClass("hit_stay_buttons");
		stay.on('click',player_stay);

		var hit = $('<button>Hit me</button>', {id: "hit" ,class:''});
		hit.appendTo($("#buttons"));
		hit.addClass("hit_stay_buttons");
		hit.on('click',hit_me);

		


		$.ajax({
			url:"http://casino/blackJack/php/shuffle_cards.php", 
			dataType:"json",
			success: starting_hand
		});
	}

	//$("#test").addClass("open");
	//$(".flip").addClass("open");
	//$("#test").one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",trans_end );
}

function player_stay(){
	
		$("#covered_card").remove();
		$('#house_cards_box').append('<img class="theImg" src="http://casino/blackJack/card_images/' + playing_cards_array[0] + '.png" />');
		var value=parseInt(get_value(playing_cards_array[0]));			

		house_cards_value.push(value);
		var temp_value=house_total_value+value;
		if(temp_value>21 && house_cards_value.includes(11)){
			var index=house_cards_value.indexOf(11);
			house_cards_value[index]=1;
			value=1;
		}


		house_total_value+=value;
		playing_cards_array.shift();
		
		if(house_total_value<=16){
			player_stay();
		}
		else{
			checkWin();
		}
	
		
}


function hit_me(){
	
		$('#player_cards_box').append('<img class="theImg" src="http://casino/blackJack/card_images/' + playing_cards_array[0] + '.png" />');
		var value=parseInt(get_value(playing_cards_array[0]));
		
		players_cards_value.push(value);
		var temp_value=player_total_value+value;
		if(temp_value>21 && players_cards_value.includes(11)){
			var index=players_cards_value.indexOf(11);
			players_cards_value[index]=1;
			value=1;
		}

		
		player_total_value+=value;
		playing_cards_array.shift();

		if(player_total_value>21){
			console.log("you fat");
			player_stay();
		}
	

}

function checkWin(){
	console.log("player:"+players_cards_value+" total:"+player_total_value);
	console.log("house value:" + house_cards_value+ " total: "+ house_total_value);

	if(house_total_value<22){
		if(player_total_value<22){
			if(house_total_value>player_total_value){
				$("#result").text("House wins");
			}
			else if(house_total_value==player_total_value){
				$("#result").text("Draw");
			}
			else if(house_total_value<player_total_value){
				$("#result").text("You win!!");
			}
		}
		else{
			$("#result").text("You are fat");
			$("#result").append("<br>"+"House wins");
		}
	}
	else{
		if(player_total_value<22){
			$("#result").text("House is fat");
			$("#result").append("<br>"+"You win!!");
		}
		else if(player_total_value>21){
			$("#result").text("Draw");
		}
	}
	
	$(".hit_stay_buttons").remove();

	var finish = $('<button>Play again</button>', {id: "finish" ,class:''});
		finish.appendTo($("#buttons"));
		finish.on('click',finish_game);

		
	
}

function finish_game(){
	location.reload();
}

function trans_end(){
	//console.log("success");
	//$("#flipBox").flip(true);
}

function starting_hand(data){
	
	playing_cards_array = data.array;
	//playing =true;
	$('#house_cards_box').append('<img class="theImg" src="http://casino/blackJack/card_images/' + playing_cards_array[0] + '.png" />');
	var value=parseInt(get_value(playing_cards_array[0]));
	house_cards_value.push(value);
	house_total_value+=value;
	playing_cards_array.shift();

	$('#house_cards_box').append('<img class="theImg" id="covered_card" src="http://casino/blackJack/card_images/card_back.png" />');
	

	$('#player_cards_box').append('<img class="theImg" src="http://casino/blackJack/card_images/' + playing_cards_array[0] + '.png" />');
	var value=parseInt(get_value(playing_cards_array[0]));
	players_cards_value.push(value);
	player_total_value+=value;
	playing_cards_array.shift();

	$('#player_cards_box').append('<img class="theImg" src="http://casino/blackJack/card_images/' + playing_cards_array[0] + '.png" />');
	var value=parseInt(get_value(playing_cards_array[0]));
	players_cards_value.push(value);
	player_total_value+=value;
	playing_cards_array.shift();
	

	

	if(house_total_value==21){
		$("#result").text("The house got black jack");
		finish_game();
	}
	if(player_total_value==21){
		$("#result").text("You got black jack!!!");
		finish_game();
	}
	

}

function get_value(a){
	var value=null;
		if(a.charAt(0)=="J" || a.charAt(0)=="Q" || a.charAt(0)=="K" || a.charAt(1)=="0"){
			value=10;
			
		}
		else if(a.charAt(0)=="A"){
			value=11;
			
		}
		else{
			value=parseInt(a);
			
		}
	

	return value;
}

