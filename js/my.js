
var dragCheck = false;
var uid1 = "", pass = [""];
var fromLeft = fromRight = false;
var tempMouseX=0;
$(document).ready(function(e){
	$('.slider').scrollable();
		
	$('.btn').mouseover(function(e) {
		$(this).addClass('btnAct'); 
	});
	$('.btn').mouseout(function(e) {
		$(this).removeClass('btnAct'); 
	});
});


function sendAJ(){
	uid1 = document.getElementById('userID');
	$.ajax({
		url:"test1.php",
		data:{userID:uid1, pic:pass},
		error: function(){
			alert("failed");
		},
		success: function(){
			alert("UID="+uid+"Pic: "+pass);
		}
		
	});
	
}

function confirm(){
	alert(pass);
	}					