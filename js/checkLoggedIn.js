var photo =null;
var money=null;


$(document).ready(function(){

	run();
	$("#slotsLink").click(slots);
	$("#blackJack_button").click(blackJack);
	$("#roulette_button").click(roulette);

});

function run(){
	$.ajax({
		url:"http://casino/checkLoggedIn.php",
		dataType:"json",
		success: done
	});
	
}

function done(data){
	$("#footer").load('http://casino/footer.html');
	if(data.loggedIn){
		money=data.money;
		photo="http://casino/"+data.photo;

		$("#header").load('http://casino/header/loggedInHeader.html',headerLoaded);
		
		
	}
	else{

		$("#header").load('http://casino/header/loggedOutHeader.html');
		
		
	}
}
function headerLoaded(){
	$("#headerImg").attr("src",photo);
	$("#headerMoney").text(money);
}

function slots(){
	$.ajax({
		url:"http://casino/checkLoggedIn.php",
		dataType:"json",
		success: doneSlots	
	});
	
}

function doneSlots(data){

	if(data.loggedIn){
		window.location = "http://casino/slots/slots.html";
	}
	else{

		window.location = "http://casino/error/notLoggedIn.html";
	}
}

function blackJack(){
	$.ajax({
		url:"http://casino/checkLoggedIn.php",
		dataType:"json",
		success: blackJack_verified	
	});
	
}

function blackJack_verified(data){

	if(data.loggedIn){
		window.location = "http://casino/blackJack/blackJack.html";
	}
	else{

		window.location = "http://casino/error/notLoggedIn.html";
	}
}

function roulette(){
	$.ajax({
		url:"http://casino/checkLoggedIn.php",
		dataType:"json",
		success: roulette_verified	
	});
	
}

function roulette_verified(data){

	if(data.loggedIn){
		window.location = "http://casino/error/notLoggedIn.html";
	}
	else{

		window.location = "http://casino/error/notLoggedIn.html";
	}
}