	$(document).ready(function(e) {
		$("#inner").css("position", "fixed");
		var pass = [], locked = true;
		$("#outer").css("overflow", "hidden");
		$('.regImgs').mouseenter(function(e) {
            $(this).css("cursor", "pointer")
        });
		$('.regImgs').mouseup(function(e) {

		var imgID = $(this).children("img").attr("id");
		if($(this).children("img").hasClass("high")){
			pass.splice($.inArray(imgID,pass), 1);
		}
		else{
			pass.push(imgID);
		}
		$(this).children("img").toggleClass("high");
		if((locked && pass.length == 4)){
				setTimeout(function(){
					showPopup("#outer", "You are a HUMAN!","", 1);
					$("#inner").remove();
				}, 200);
			}
		else{
			locked = true;
		}
    });
    //Login Signup
	/*var pass =[] ,i =0, uval = false, emval = false, uname, em, login = true, signup = false, ; //password string, username valdation and email validation
	$("#loginsub,#regsubmit").toggleClass("clicked clickable");
	var $log = $("#login"), $sgnup = $("#signup"), $regImgs = $(".regImgs"), $divS = $("#divsignup"), $divL = $("#divlogin");
	$log.click(function(e) {
		if($log.hasClass("tab1")){
			return;
		}
		$log.css("cursor", "auto").toggleClass("tab1 tab2");
		$sgnup.css("cursor", "pointer").css("visibility", "visible").toggleClass("tab1 tab2");
		$divL.css("visibility", "visible").css("zIndex", "99");
		$divS.css("visibility", "hidden").css("zIndex", "2");
		login = true;
		signup = false;
    });
	$sgnup.click(function(e) {
		if($sgnup.hasClass("tab1")){
			return;
		}
		$sgnup.css("cursor", "auto").toggleClass("tab1 tab2");
		$log.css("cursor", "pointer").css("visibility", "visible").toggleClass("tab1 tab2");
		$divS.css("visibility", "visible").css("zIndex", "99");
		$divL.css("visibility", "hidden").css("zIndex", "2");
		signup = true;
		login = false;
    });

	$("#uname.wrong, #uname, #newuser, #newuser.wrong").keyup(function(e) {

		var value = $( this ).val();
		var uexp = /^[a-zA-Z0-9]{3,25}[_]?[a-zA-Z0-9]*$/.test(value);
        if((uexp)){
			uval = true;
			$(this).css("background-color", "rgba(204,255,0,1)");
			uname = value;
		}
		else{
			uval = false;
			$(this).css("background-color", "rgba(255,0,0,1)");
		}
    }).keyup();
	$("#emailid, #emailid.wrong").keyup(function(e) {

		var value = $( this ).val();
		var uexp = /[a-zA-Z0-9_\-\.]+\@[a-zA-Z\.]+\.\w+/.test(value);
        if((uexp)){
			emval = true;
			$(this).css("background-color", "rgba(204,255,0,1)");
			em = value;
		}
		else{
			emval = false;
			$(this).css("background-color", "rgba(255,0,0,1)");
		}
    }).keyup();
	$("#uname.wrong, #uname, #newuser, #newuser.wrong, #emailid, #emailid.wrong").change(function(e) {
        $(this).keyup();
    });
	$("#loginsub, #regsubmit").click(function(e) {
		if((login && pass.length == 4 && uval) || (signup && pass.length == 4 && uval && emval)){
			$("#divlogin,#divsignup").hide(300);
			if(login){
				var data = {};
				data["uname"]=uname;
				data["pass"]=pass;
				$.ajax({
					url: "/login.php",
					type: "GET",
					data: data,
					error: function(){
						alert("Connection Error");
					},
					success: function(){
						showPopup("#basic.section","Logging in", '');
					}
				});
			}
			else if(signup){
				var data = {};

				data["uname"]=uname;
				data["pass"]=pass;
				data["emailid"]=em;
				$.ajax({
					url: "/validate.php",
					type: "GET",
					data: data,
					async:false,
					error: function(){
						alert("Reg failed");
					},
					success: function(){
						showPopup("#basic.section", "Registering", '');
					}
				});
			}
			}
		else{
			$($this).removeClass("clickable");
			return;
		}

    });*/

});
function showPopup(appendTo, msg, flag, s){
		$(appendTo).append("<div class='blanket'><div class='popup "+flag+"'></div></div>");
		$(".popup").append("<p><strong>"+msg+"</strong><br/></p>");
		$('.popup').append("<center>Closing..<span>");
		op = 1;
		var IID = setInterval(function(){$(".popup center span").html(s);s--;}, 990);
		$('.popup').append("<span></center>");
		setTimeout(function(){
			$('.blanket').css("opacity", s*0.9).remove();
			clearInterval(IID);
			}, s*1000);
	}
