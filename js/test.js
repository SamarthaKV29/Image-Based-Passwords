// JavaScript Document

$(document).ready(function(e) {
	var pass = [];
	/*function checkP(){
		if(!(pass.length > 0)){
			showPopup("You need to select the password!", "error");
		}
		else{
			showPopup("You password is "+pass, "");
		}
	}*/
	var op;
	function showPopup(appendTo, msg, flag, s){
		$(appendTo).append("<div class='blanket'><div class='popup "+flag+"'></div></div>");
		$(".popup").append("<p><strong>"+msg+"</strong><br/></p>");
		$('.popup').append("<center>Closing..<span>");
		op = 1;
		var IID = setInterval(function(){$(".popup center span").html(sec);s--;}, 1000);
		$('.popup').append("<span></center>");
		setTimeout(function(){$('.blanket').remove();clearInterval(IID);}, s*000);
	}


	//header animation
	$("#header, #header .logo, #header a, #header #demo, #header ol li").removeClass("small");
	$("#header").height(80);
	$("#header a, #header #demo, #header ol li").css("height", "20px").css("font-size", "18px").css("line-height", "20px");
	$("#header .logo").css("font-size", "20px");
	$("#header h3").css("background-size", "50px 50px");
	$(document).scroll(
        function(e){
        var dY = window.pageYOffset || document.documentElement.scrollTop,
            sOn = 300;
        if (dY > sOn) {
     		$("#header, #header .logo, #header a, #header #demo, #header ol li").css("line-height", "20px").css("height", "60px").css("font-size", "14px").addClass("small");
			$("#header #demo, #header a, #header #demo, #header ol li").css("height", "20px");
			$("#header .logo").css("height", "40px");
			
			$("#header h3").css("background-size", "30px 30px");
        } else {
            if ($("#header, #header .logo, #header a, #header .demo, #header ol li").hasClass("small")) {
				$("#header, #header .logo, #header a, #header #demo, #header ol li").removeClass("small");
				$("#header").height(80);
				$("#header a, #header #demo, #header ol li").css("height", "20px").css("font-size", "18px").css("line-height", "20px");
				$("#header .logo").css("font-size", "20px").css("height", "50px");
				$("#header h3").css("background-size", "50px 50px");
            }
    }
    });
	$('#demo span').click(function(e) {
        window.location.href = "./techseminar/index.php";
    });
	$("#header .logo").hover(function(e) {
        $(this).css("cursor", "pointer");
    });
	$("#header .logo").click(function(e) {
		window.location.href="index.php";
    });
	$('#demo').mouseenter(function(e) {
    	$(this).children("li").css("visibility", "visible");
		$(this).css("height", "100px");
		$(this).css("border-bottom-color","rgba(0,204,255,1)");
		$(this).css("border-bottom-width","medium");
		$(this).css("border-bottom-style","solid");
	});
	$('#demo').mouseleave(function(e) {
    	$(this).children("li").css("visibility", "hidden");
		$(this).css("height", "20px");
		$(this).css("border", "none");
	});

});
