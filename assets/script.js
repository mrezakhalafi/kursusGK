$(document).ready(function(){


	$("#next-1").click(function(){
		$("#second").show();
		$("#first").hide();
		$('#progressBar').css('width','100%');
		$('#progressText').html("Step 2");
	});

	// $("#next-2").click(function(){
	// 	$("#third").show();
	// 	$("#second").hide();
	// 	$('#progressBar').css('width','100%');
	// 	$('#progressText').html("Step 3");
	// });

	$("#prev-2").click(function(){
		$("#first").show();
		$("#second").hide();
		$('#progressBar').css('width','50%');
		$('#progressText').html("Step 1");
	});

	// $("#prev-3").click(function(){
	// 	$("#second").show();
	// 	$("#third").hide();
	// 	$('#progressBar').css('width','66.6%');
	// 	$('#progressText').html("Step 2");
	// });

	$("#btnBayar").click(function(){
		$("#pay").show();
	});

	$("#btnNanti").click(function(){
		$("#pay").hide();
	});




});