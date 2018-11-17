

$(document).ready(function(){
	run();
});

function run(){
	$.ajax({
		url: "http://casino/profile/stats.php",
		dataType:"json",
		success: done
	});
	
}

function done(data){
	$("#headerImg").attr("src","http://casino/"+data.photo);
	$("#headerMoney").text(data.money);

	$("#pair_cherries").text(data.pair_cherries); 
	$("#pair_oranges").text(data.pair_oranges);
	$("#pair_grapefruits").text(data.pair_grapefruits);
	$("#pair_bells").text(data.pair_bells);
	$("#pair_bars").text(data.pair_bars);
	$("#pair_sevens").text(data.pair_sevens);
	$("#pair_total").text(data.pair_total);

	$("#three_cherries").text(data.three_cherries);
	$("#three_oranges").text(data.three_oranges);
	$("#three_grapefruits").text(data.three_grapefruits);
	$("#three_bells").text(data.three_bells);
	$("#three_bars").text(data.three_bars);
	$("#three_sevens").text(data.three_sevens);
	$("#three_total").text(data.three_total);

	$("#four_cherries").text(data.four_cherries);
	$("#four_oranges").text(data.four_oranges);
	$("#four_grapefruits").text(data.four_grapefruits);
	$("#four_bells").text(data.four_bells);
	$("#four_bars").text(data.four_bars);
	$("#four_sevens").text(data.four_sevens);
	$("#four_total").text(data.four_total);

	$("#five_cherries").text(data.five_cherries);
	$("#five_oranges").text(data.five_oranges);
	$("#five_grapefruits").text(data.five_grapefruits);
	$("#five_bells").text(data.five_bells);
	$("#five_bars").text(data.five_bars);
	$("#five_sevens").text(data.five_sevens);
	$("#five_total").text(data.five_total);

	$("#highestbet").text(data.highestbet);
	$("#highestwin").text(data.highestwin);
	$("#totalspins").text(data.totalspins);
}