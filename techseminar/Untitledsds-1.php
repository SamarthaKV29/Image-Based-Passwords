<div id="download_div" class="subdivblanket">
  <div class="close_login"></div>
  <h2>Download Seminar Presentation</h2>
  <hr id="line">
 
  <p><strong>File Name :- </strong><span id="filetext"></span>.ppt</p>
  
  <form id="downloadseminar" action="" method="post" enctype="multipart/form-data">
   <p><strong>Choose Graphical Pattern and Password</strong><br/><br/>
    <select required id="download_imagepass" name="download_imagepass">
    <option value=""></option>
    <option value="pattern1">Point Image</option>
    <option value="pattern2">Numerical Graphical password</option>
    <option value="pattern3">Slider Image</option>
    <option value="pattern4">Make word Image</option>
    </select><p>
    <p><input type="hidden" id="fileid" name="fileid" /></p>
    <p><input type="hidden" name="down_pattern" id="down_pattern"/>
    <div id="dpattern1" class="password_patterns">
 <img src="images/classroompng.png" class="classroom_pattern1" alt="Select a point in the image as your graphical password" />
 <p><label>Selected Coordinates :- </label> <input type="text" class="selcoordinates"  id="dselleft"  size="5" />&nbsp;&nbsp;<input type="text"  id="dseltop" size="5" class="selcoordinates" /></p>
 
 </div>
 <div id="dpattern2" class="password_patterns">
 <div id="password" class="numpass1">
<ul>
</ul></div>
<strong>Click on the numerical keypad below to generate a max 8-length numerical graphical password</strong>
<div id="pass" class="numpass" >
<ul>
<li><img  src="images/orange-number-1-filled-48.png"  /></li>
<li><img src="images/orange-number-2-filled-48.png"  /></li>
<li><img src="images/orange-number-3-filled-48.png"  /></li><br/>
<li><img src="images/orange-number-4-filled-48.png"  /></li>
<li><img src="images/orange-number-5-filled-48.png"  /></li>
<li><img src="images/orange-number-6-filled-48.png"  /></li><br/>
<li><img src="images/orange-number-7-filled-48.png"  /></li>
<li><img src="images/orange-number-8-filled-48.png"  /></li>
<li><img src="images/orange-number-9-filled-48.png"  /></li>
</ul>
</div>
  </div>
  <p><input type="submit" value="Check Credentials" id="checkdownload" class="submit" /> <div id="downloadhref">
  
  </div> </p>
  </form>
  
  </div>
  
  
  <div id="upload_div" class="subdivblanket">
  <div class="close_login"></div>
  <h2>Upload Seminar Presentation</h2>
  <hr id="line">
  
  	<form id="uploadseminar" action="" method="post" enctype="multipart/form-data">
		
		<div id="selectImage">
	<p><input type="file" name="file" id="file" required /></p>
	<p><input type="hidden" name="sem_subject" id="sem_subject" /></p>
    <p><input type="hidden" name="pass_pattern" id="pass_pattern"/></p>
    <p><strong>Select a option to choose a Graphical password</strong><br/><br/>
    <select required id="upload_imagepass" name="upload_imagepass">
    <option value=""></option>
    <option value="pattern1">Point Image</option>
    <option value="pattern2">Numerical graphical password</option>
    <option value="pattern3">Slider Image</option>
    <option value="pattern4">Make word Image</option>
    </select><p>
     <div id="upattern1" class="password_patterns">
 <img src="images/classroompng.png" class="classroom_pattern1" alt="Select a point in the image as your graphical password" />
 <p><label>Selected Coordinates :- </label> <input type="text" class="selcoordinates"   readonly id="uselleft"  size="5" />&nbsp;&nbsp;<input type="text" readonly class="selcoordinates"    id="useltop" size="5" /></p>
 </div>
<div id="upattern2" class="password_patterns">
 <div id="password" class="numpass1">
<ul>
</ul></div>
<strong>Click on the numerical keypad below to generate a max 8-length numerical graphical password</strong>
<div id="pass" class="numpass">
<ul>
<li><img  src="images/orange-number-1-filled-48.png"  /></li>
<li><img src="images/orange-number-2-filled-48.png"  /></li>
<li><img src="images/orange-number-3-filled-48.png"  /></li><br/>
<li><img src="images/orange-number-4-filled-48.png"  /></li>
<li><img src="images/orange-number-5-filled-48.png"  /></li>
<li><img src="images/orange-number-6-filled-48.png"  /></li><br/>
<li><img src="images/orange-number-7-filled-48.png"  /></li>
<li><img src="images/orange-number-8-filled-48.png"  /></li>
<li><img src="images/orange-number-9-filled-48.png"  /></li>
</ul>
</div>
  </div>
 
 
    <p><input type="submit" value="Upload" class="submit" /></p>
	</div>
</form>
<h4 id='loading' >Uploading.. Please Wait</h4>
<div id="message"></div>

  </div>
  
  $('#upload_imagepass').change(function(){
		$('.password_patterns').hide();
		$('#password ul').empty();
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
  $("#upattern2 #pass img").on("click",function(){
    if($('#password ul').children().length < 8)
	{
		var imga = $(this).attr('src');
		$("#password ul").append('<li><img src="' + imga + '" /><span class=close>&times;</span></li>');
		numericalimage.push(imga);
		$('#pass_pattern').val(numericalimage);
	
	
$("#upattern2 #password ul li span").click(function(){
	$(this).parents('li').remove();
	numericalimage=[];
	$('#upattern1 #password ul li img').each(function(i)
	{
   		var numi=$(this).attr('src');
		numericalimage.push(numi);
		$('#upattern2 #pass_pattern').val(numericalimage);
	});
	
});

	
	
	}
	else
	{
		alert('Numerical graphical password maximum length has been reached ');
	}
	
	
	
});

  
///////////////////Uploading a seminar topic	
	$("#uploadseminar").on('submit',(function(e) {

	
	if($('#pass_pattern').val().length == 0)
	{
		alert('Please enter your graphical password by click based on the pattern selected ');
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