// JavaScript Document
$(document).ready(function(){
	var clickedlink;
	var showdiv;
	var clicksign;
	var showsign;
	var image=[];
	var loginimage=[];
	var selcoor;;
	
	var count;
	$('#csea').css('text-decoration','underline');
	$('#csea').css('font-weight','bold');
	$('#cse_seminar').show();
	$('#seminar_subject').val('csea');
	$('#csea').click(function(){
		clickedlink='csea';
		showdiv='cse_seminar';
		techclick_Semi(clickedlink,showdiv);
	});
	$('#loginsignupa').click(function(){
		clicksign='signina';
		showsign='login_div';
		loginclick_Semi(clicksign,showsign);
	});
	$('#signina').click(function(){
		clicksign='signina';
		showsign='login_div';
		loginclick_Semi(clicksign,showsign);
	});
	$('#signupa').click(function(){
		clicksign='signupa';
		showsign='signup_div';
		loginclick_Semi(clicksign,showsign);
	});
	$('.close_login').click(function(){
		window.location.reload();
		
	});
	
	//// ///////////selecting a grphical password whilew  uploading
	$('#upload_imagepass').change(function(){
		$('.password_patterns').hide();
		var select_patt=$(this).val();
		$('#u'+select_patt).show();
	});
	
	$('.classroom_pattern1').click(function(e) {
		var selcoor;
		$('#selleft').val('');
		$('#seltop').val('');
		var imgcoordinates=[];
		
		var offset = $(this).offset();
		var xcoor=e.pageX - offset.left;
		var ycoor=e.pageY - offset.top;
		ycoor=ycoor.toFixed();
		$('#uselleft').val(xcoor);
		$('#useltop').val(ycoor);
		$('#dselleft').val(xcoor);
		$('#dseltop').val(ycoor);
		imgcoordinates.push(xcoor);
		imgcoordinates.push(ycoor);
		selcoor=imgcoordinates.toString();
		$('#pass_pattern').val(selcoor);
		$('#down_pattern').val(selcoor);
		
		
	});
	
	
	///////////////////Uploading a seminar topic	
	$("#uploadseminar").on('submit',(function(e) {
		
		if($('#pass_pattern').val().length == 0)
		{
			alert('Please enter your graphical password by click/drag based on the pattern selected ');
			e.preventDefault();
		}
		else
		{
			var sem_subject=$('#seminar_subject').val();
			var patternpass=$('#pass_pattern').val();
			
			$('#sem_subject').val(sem_subject);
			
			e.preventDefault();
			$("#message").empty();
			$('#loading').show();
			
			$.ajax({
				url: "ajax_file_upload.php", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content stype used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,        // To send DOMDocument or non processed data file it is set to false
				success: function(data)   // A function to be called if request succeeds
				{
					$('#loading').hide();
					alert(data);
					$('#uploadseminar')[0].reset();
					$('.password_patterns').hide();
					$('#pass_pattern').val('');
				}
			});
			
		}
		
		
	}));
	
	// Function to preview image after validation
	$(function() {
		$("#file").change(function() {
			$("#message").empty(); // To remove the previous error message
			var file = this.files[0];
			var imagefile = file.type;
			//var match= ["application/vnd.openxmlformats-officedocument.presentationml.presentation","image/png","image/jpg"];
			//if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
			var match= ["application/vnd.openxmlformats-officedocument.presentationml.presentation"];
			if(!((imagefile==match[0])))
			{
				$("#message").html("<p id='error'>Please Select A valid Seminar Presentation</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only .pptx type extension  	allowed</span>");
				$('#file').val('');
				return false;
				
			}
			else
			{
				var reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(this.files[0]);
			}
		});
	});
	function imageIsLoaded(e) {
		$("#file").css("color","green");
	};
	
	
	$('#signup_div .divimage_select ul li img').click(function(){
		
		var fileName = $(this).attr('src');
		var selectid=$(this).attr('id');
		
		if($.inArray(fileName,image)!== -1)
		{
			
			image.splice($.inArray(fileName,image),1);
			$("#signup_div .divimage_select ul li #"+selectid).removeClass('border-highlight');
			
			
		}
		else
		{
			image.push(fileName);
			$("#signup_div .divimage_select ul li #"+selectid).addClass('border-highlight');
			
		}
		
	});
	
	$('.nologseminar_click').click(function(){
		alert('Please login to download the seminar');
	});
	
	$('#login_div .divimage_select ul li img').click(function(){
		var selectid=$(this).attr('id');
		var fileName = $(this).attr('src');
		loginimage.push(fileName);
		$("#login_div .divimage_select ul li #"+selectid).addClass('border-highlight');
		
		
	});
	$('.seminaroptions').change(function(){
		$('#seminarSel').empty();
		$('#seminarheader').empty();
		var option=$(this).val();
		var subject=$('#seminar_subject').val();
		showSeminarTopic(option,subject);
	});
	
	$("#signup_form").on("submit", function(e) {
		e.preventDefault();
		var pass=$('#signuptb2').val();
		var conpass=$('#signuptb3').val();
		var username=$('#signuptb1').val();
		var email=$('#signuptb4').val();
		if(pass != conpass)
		{
			alert('Your confirm password & password are not same');
			$('#signuptb2').val('');
			$('#signuptb3').val('');
			
		}
		else if(image.length < 3)
		{
			alert('Please select your 3 favourite animals as graphcal password');
		}
		else if(image.length > 3)
		{
			alert('Please select only three images'); 
		}
		else
		{
			var gp=image.toString();
			
			$.post("signup.php", {username:username,password:pass,email:email,gp:gp}, function(result){
				response(result);
			});
		}
	});
	
	$("#login_form").on("submit", function(e) {
		e.preventDefault();
		var username=$('#tstb1').val();
		var password=$('#tstb2').val();
		if(loginimage.length < 3)
		{
			alert('Please select your graphical password');
		}
		else
		{
			var gp=loginimage.toString();
			
			$.post("login.php", {username:username,password:password,gp:gp}, function(result){
				lresponse(result);
				
				
			});
			
		}
	});
	$('.upload_seminar').click(function(){
		var sem_sub=$('#seminar_subject').val();
		$('#blanket').show(500);
		$('#upload_div').show();
	});
	
	$('.selcoordinates').keyup(function(){
		if(isNaN($(this).val()))
		{
			alert('Enter valid coordinates');
			$(this).val('');
		}
		else
		{}
	});
	
	/*****************************************/
	$('#download_imagepass').change(function(){
		$('.password_patterns').hide();
		$('.selcoordinates').val('');
		$('#down_pattern').val('');
		$('#downloadhref').empty();
		var select_patt=$(this).val();
		$('#d'+select_patt).show();
	});
	
	$("#downloadseminar").on('submit',(function(e) {
		
		e.preventDefault();
		$("#message").empty();
		$('#loading').show();
		var downcoor=[];
		downcoor[0]=$('#dselleft').val();
		downcoor[1]=$('#dseltop').val();
		var coor=downcoor.toString();
		$('#down_pattern').val(coor);
		$.ajax({
			url: "downloadfile.php", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content stype used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				$('#loading').hide();
				if(data == '0')
				{
					alert('Invalid Pattern- Graphical Password Combination'); 
					$('.selcoordinates').val('');
					$('#down_pattern').val('');
					//window.location.reload();
				}
				else
				{
					
					$('#downloadhref').html(data);
					$('.selcoordinates').val('');
					$('#down_pattern').val('');
					
					
					
				}
			}
		});
	}));
	$('.loginlogseminar_click').click(function(){
		var uploadid=$(this).attr('id');
		var filename=$(this).html();
		showDownloadSeminar(uploadid,filename);	
	});
	
});
function showSeminarTopic(option,subject)
{
	if(option == 'null')
	{
		$('#'+subject+'_topicdiv').html("");
	}
	else
	{
		$.post("seminartopics.php", {option:option,subject:subject}, function(result){
			$('#'+subject+'_topicdiv').html(result);
			$('.loginlogseminar_click').click(function(){
				var uploadid=$(this).attr('id');
				var filename=$(this).html();
				showDownloadSeminar(uploadid,filename);	
			});
		});
	}
}
function  showDownloadSeminar(uploadid,filename){
	$('#blanket').show(500);
	$('#download_div').show(500);
	$('#filetext').text(filename);
	$('#fileid').val(uploadid);
	
}

function lresponse(data)
{
	alert(data);
	window.location.reload();
	
	
	
}



function response(data)
{
	alert(data);
	$('#signup_form')[0].reset();
	
	
}

function techclick_Semi(clickedlink,showdiv){
	$('.subject_alink').css('text-decoration','none');
	$('.subject_alink').css('font-weight','normal');
	$('#'+clickedlink).css('text-decoration','underline');
	$('#'+clickedlink).css('font-weight','bold');
	
	$('.seminar_noshow').hide();
	$('#'+showdiv).show();
	$('#seminar_subject').val(clickedlink);
	
}
function loginclick_Semi(clicksign,showsign){
	$('.loginsigninblanket').hide();
	$('.subject_alink').css('text-decoration','none');
	$('.subject_alink').css('font-weight','normal');
	$('#'+clicksign).css('text-decoration','underline');
	$('#'+clicksign).css('font-weight','bold');
	$('#blanket').show();
	$('#loginsignup_div').show(300);
	$('#'+showsign).show();
	
}