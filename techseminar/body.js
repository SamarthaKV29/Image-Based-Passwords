// JavaScript Document
$(document).ready(function(){
	var clickedlink;
	var showdiv;
	var clicksign;
	var showsign;
	var image=[];
	var loginimage=[];
	var selcoor;
	var count;
	var imgcoordinates=[];
	/*****uPattern 1 ***************/
	$('.coordinates').hide();
	
	$('#ucoordinate1').show();
	$('#unextvalue').val('2');
	$('#upreviousbutton').hide();
	$('#upreviousvalue').val('0');
	$('#ucurrentvalue').val('1');
	/**********************************/
	/*****dPattern 1 ***************/
	
	$('#dcoordinate1').show();
	$('#dnextvalue').val('2');
	$('#dpreviousbutton').hide();
	$('#dpreviousvalue').val('0');
	$('#dcurrentvalue').val('1');
	
	
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
	
	$('#signuptb1').blur(function(){
		var user=$(this).val();
		$.post("usercheck.php", {username:user}, function(result){
        usercheck(result);
    	});
	});
	
	function usercheck(result)
	{
		if(result == 'VALID')
		{
			$('#signuptb2').focus();
		}
		else
		{
			alert('Username has already been used.Please try a diffrent one');
			$('#signuptb1').focus();
			//$('#signuptb1').val('');
		}
	}
	
	
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
	
	$('#login_div .divimage_select ul li img,#login_div.divimage_select ul li img.border-highlight').click(function(){
		var fileName = $(this).attr('src');
		var selectid=$(this).attr('id');
		if(loginimage.length != 3){
			if(!($(this).hasClass('border-highlight'))){
				loginimage.push(fileName);
			}
			else{
				loginimage.pop();
				
			}
			$(this).toggleClass('border-highlight');
		}
		else{
			loginimage.length = 0;
			$('.regImgs').removeClass('border-highlight');	
		}	
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
		alert('Please select your 3 favourite animals as graphical password');
	}
	else if(image.length > 3)
	{
		alert('Please select only three images'); 
	}
	else
	{
		var gp=image.toString();
		
		$.post("signup.php", {username:username,password:pass,email:email,gp:gp}, function(result){
			image=[];
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
			loginimage=[];
       lresponse(result);
		});
		
	}
	});
	$('.upload_seminar').click(function(){
		var sem_sub=$('#seminar_subject').val();
		$('#blanket').show(500);
		$('#upload_div').show();
	});
	$('.loginlogseminar_click').click(function(){
	var uploadid=$(this).attr('id');
	var filename=$(this).html();
	showDownloadSeminar(uploadid,filename);	
	});
	/*************Upload ***********/
	 $('#upload_imagepass').change(function(){
		$('.password_patterns').hide();
		var select_patt=$(this).val();
		$('#u'+select_patt).show();
		 if(select_patt == 'pattern3')
		{
			var x = 10;
			var y = 5;
			var t = '<table cellspacing="0" border="1" cellpadding="0" class="grxd">';
			for (var i = 1; i <= (x * y); i++) {
   			t += (i == 1 ? '<tr>' : '');
   			t += '<td style="cursor:pointer;"></td>';
    		if (i == (x * y)) {
        	t += '</tr>';
    		} else {
        	t += (i % 10 === 0 ? '</tr><tr>' : '');
			}
			}
			t += '</table>';
			$("#drawTable").html(t);
			$(".grxd  td").click(function(){
			var col = $(this).css('background-color');
			var column = $(this).parent().children().index(this);
    		var row = $(this).parent().parent().children().index(this.parentNode);
			var cellclicked="column-"+column+"row-"+row;	
			if(col == "rgba(0, 0, 0, 0)" || col == 'transparent')
			{
			
				if(imgcoordinates.length < 8)
				{
					imgcoordinates.push("column-"+column+"row"+row);
					$( this ).css("background-color","#EEEEEE");
					
					$('#pass_pattern').val(imgcoordinates);
				}
				else
				{
					alert('You have selected the maximum no of cells  as your graphical password');
				}
			}
			else
			{
				imgcoordinates=[];
				$('.grxd td').css("background-color","transparent");
				/*$('.grxd  td').each(function(i){
				var col=$(this).css('background-color');	
				if(col == 'rgba(0, 0, 0, 0)' || col == 'transparent' )
				{
				
					
				}
				else
				{
					var column = $(this).parent().children().index(this);
   			 		var row = $(this).parent().parent().children().index(this.parentNode);
			 		imgcoordinates.push("column-"+column+"row"+row);
					$('#pass_pattern').val(imgcoordinates);
				}
				});*/
		
			}
	
			});
		}
		else
		{
			$('#uploadsubmit').show();
		}
		imgcoordinates=[];
		$('#pass_pattern').val('');
	});
/********************Pattern1 *********/
/*
var cb, filter;
    // Create a new Selection object extended from Selection
        var CircleSel = function(){ };
        
        // Set the custom selection's prototype object to be an instance
        // of the built-in Selection object
        CircleSel.prototype = new $.Jcrop.component.Selection();
        
        // Then we can continue extending it
        $.extend(CircleSel.prototype,{
          zoomscale: 1,
          attach: function(){
            this.frame.css({
              background: 'url(' + $('#uimage_pattern1')[0].src.replace('750','750') + ')'
            });
          },
          positionBg: function(b){
            var midx = ( b.x + b.x2 ) / 2;
            var midy = ( b.y + b.y2 ) / 2;
            var ox = (-midx*this.zoomscale)+(b.w/2);
            var oy = (-midy*this.zoomscale)+(b.h/2);
            //this.frame.css({ backgroundPosition: ox+'px '+oy+'px' });
            this.frame.css({ backgroundPosition: -(b.x+1)+'px '+(-b.y-1)+'px' });
          },
          redraw: function(b){
          
            // Call original update() method first, with arguments
            $.Jcrop.component.Selection.prototype.redraw.call(this,b);
            
            this.positionBg(this.last);
            return this;
          },
          prototype: $.Jcrop.component.Selection.prototype
        });
        
        // Jcrop Initialization
        $('#uimage_pattern1').Jcrop({
        
          // Change default Selection component for new selections
          selectionComponent: CircleSel,
          
          // Use a default filter chain that omits shader
          applyFilters: [ 'constrain', 'extent', 'backoff', 'ratio', 'round' ],
          
          // Start with circles only
          aspectRatio: 1,
          
          // Set an initial selection
          setSelect: [ 147, 55, 456, 390 ],
          
          // Only n/s/e/w handles
          handles: [ 'n','s','e','w' ],
          
          // No dragbars or borders
          dragbars: [ ],
          borders: [ ]
          
        },function(){
          this.container.addClass('jcrop-circle-demo');
          interface_load(this);
        });
        
        function interface_load(obj){
          cb = obj;
          
          // Add in a custom shading element...
          cb.container.append($('<div />').addClass('custom-shade'));
          
          function random_coords() {
            return [
              Math.random()*300,
              Math.random()*200,
              (Math.random()*540)+50,
              (Math.random()*340)+60
            ];
          }
          
          // Settings Buttons
          $(document.body).on('click','[data-setting]',function(e){
            var $targ = $(e.target),
                setting = $targ.data('setting'),
                value = $targ.data('value'),
                opt = {};
                
            opt[setting] = value;
            cb.setOptions(opt);
            
            $targ.closest('.btn-group').find('.active').removeClass('active');
            $targ.addClass('active');
            
            if ((setting == 'multi') && !value) {
              var m = cb.ui.multi, s = cb.ui.selection;
              
              for(var i=0;i<m.length;i++)
                if (s !== m[i]) m[i].remove();
                
              cb.ui.multi = [ s ];
              s.focus();
            }
            
            e.preventDefault();
          });
          
          // Animate button event
          $(document.body).on('click','[data-action]',function(e){
            var $targ = $(e.target);
            var action = $targ.data('action');
            
            switch(action){
              case 'random-move':
                cb.ui.selection.animateTo(random_coords());
                break;
            }
            
            cb.ui.selection.refresh();
            
          }).on('selectstart',function(e){
            e.preventDefault();
          }).on('click','a[data-action]',function(e){
            e.preventDefault();
          });
        }*/
		
var jcrop_api;

    $('#uimage_pattern1').Jcrop({
		maxSize:[180,180],
      //onChange:   showCoords,
      onSelect:   showCoords,
      onRelease:  clearCoords
    },function(){
      jcrop_api = this;
    });

    $('#coords').on('change','input',function(e){
      var x1 = $('#x1').val(),
          x2 = $('#x2').val(),
          y1 = $('#y1').val(),
          y2 = $('#y2').val();
      jcrop_api.setSelect([x1,y1,x2,y2]);
    });



  // Simple event handler, called from onChange and onSelect
  // event handlers, as per the Jcrop invocation above
  function showCoords(c)
  {
	  
    $('#x1').val(c.x);
    $('#y1').val(c.y);
    $('#x2').val(c.x2);
    $('#y2').val(c.y2);
    $('#w').val(c.w);
    $('#h').val(c.h);
	
	imgcoordinates.splice(0,2,c.x,c.y);
	imgcoordinates.splice(2,4,c.x2,c.y2);
	imgcoordinates.splice(4,6,c.w,c.h);
	imgcoordinates.splice(6,8,'0','0');
	
	$('#pass_pattern').val(imgcoordinates);
	
	
	
  };

  function clearCoords()
  {
    $('#coords input').val('');
  };

	/*$('#uimage_pattern1').click(function(e) {
	var next=$('#unextvalue').val();
	var previous=$('#upreviousvalue').val();
	var current=$('#ucurrentvalue').val();
	var offset = $(this).offset();
    var xcoor=e.pageX - offset.left;
    var ycoor=e.pageY - offset.top;
	ycoor=ycoor.toFixed();
	
	$('#uselleft'+current).val(xcoor);
	$('#useltop'+current).val(ycoor);
	if(current == '1')
	{
		imgcoordinates.splice(0,2,xcoor,ycoor);
	}
	else if(current == '2')
	{
		imgcoordinates.splice(2,2,xcoor,ycoor);
	}
	else if(current == '3')
	{
		imgcoordinates.splice(4,2,xcoor,ycoor);	
	}
	else
	{
		imgcoordinates.splice(6,2,xcoor,ycoor);	
	}
	$('#pass_pattern').val(imgcoordinates);
	});
	
	$('#unextbutton').click(function(e){
		e.preventDefault();
		
		var next=$('#unextvalue').val();
		var current=$('#ucurrentvalue').val();
		var left1=$('#uselleft'+current).val();
		var top1=$('#useltop'+current).val();
		if(left1.length > 0, top1.length > 0)
		{ 
			$('#upreviousbutton').show();
			var previous=$('#upreviousvalue').val();
			$('#ucoordinate'+current).hide();
			$('#ucoordinate'+next).show();
			current=next;
			if(current == 4)
			{
				$('#ucurrentvalue').val(current);
				$('#unextvalue').val('5');
				$('#unextbutton').hide();
				$('#upreviousvalue').val('3');
				$('#uploadsubmit').show();
				
			}
			else
			{
				previous++;
				next++;
				$('#unextvalue').val(next);
				$('#upreviousvalue').val(previous);
				$('#ucurrentvalue').val(current);
				$('#uploadsubmit').hide();
			}
		}
		else
		{
			alert('Select your '+ current+' set of coordinates then procced');
		}
		
		});
	$('#upreviousbutton').click(function(e){
	e.preventDefault();
	var previous=$('#upreviousvalue').val();
	var current=$('#ucurrentvalue').val();
	var next=$('#unextvalue').val();

	
	$('#ucoordinate'+current).hide();
	$('#ucoordinate'+previous).show();
	current=previous;
	next--;
	$('#unextvalue').val(next);
	if(current == 1)
	{
		$('#ucurrentvalue').val(current);
		$('#upreviousvalue').val('0');
		
		$('#upreviousbutton').hide();
		$('#unextbutton').show();
		

	}
	else
	{
		previous--;
		
		
		$('#upreviousvalue').val(previous);
		$('#ucurrentvalue').val(current);
		$('#unextbutton').show();
	}
	});*/
/**************Pattern 2**********/	
	$("#upattern2 #pass img").on("click",function(){
    if($(' #upattern2 #password ul').children().length == 8)
	{
		alert('Numerical graphical password maximum length has been reached ');
	}
	else
	{
		var imga = $(this).attr('src');
		$(" #upattern2 #password ul").append('<li><img src="' + imga + '" /><span class=close>&times;</span></li>');
		imgcoordinates.push(imga);
		$('#pass_pattern').val(imgcoordinates);
	
	
$("#upattern2 #password ul li span").click(function(){
	
	$(this).parents('li').remove();
	imgcoordinates=[];
	$('#upattern2 #password ul li img').each(function(i)
	{
   		var numi=$(this).attr('src');
		imgcoordinates.push(numi);
		$('#pass_pattern').val(imgcoordinates);
	});
	});
		
	}
});

/**********************Uplaod seminar*/	
	$("#uploadseminar").on('submit',(function(e) {
		e.preventDefault();
		
	if(imgcoordinates.length < 8)
	{
		var pattern=$('#upload_imagepass').val();
		if(pattern == 'pattern1')
		{
			alert('Please draw a circle on the image.');
		}
		else if(pattern == 'pattern2')
		{
			alert('Please click on 8-length graphical  numerical password');
		}
		else if(pattern == 'pattern3')
		 {
			 alert('Please select 8 cells in a grid as your graphical password');
			
		}
	}
	else
	{
		var sem_subject=$('#seminar_subject').val();
		var patternpass=$('#pass_pattern').val();
	
	$('#sem_subject').val(sem_subject);
	
	
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
		window.location.reload();
		
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
var matched= ["application/vnd.openxmlformats-officedocument.presentationml.presentation","application/pdf","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
if(!((imagefile==matched[0]) || (imagefile==matched[1]) || (imagefile==matched[2] || (imagefile==matched[1]) || (imagefile==matched[3]))))
{
	$("#message").html("<p id='error'>Please select a valid document file </p>"+"<h4>Note</h4>"+"<span id='error_message'>Only MS office 2007 version of WORD,EXCEL,and POWERPOINT as well as  PDF files of any size will be allowed</span>");
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
/*****************Downlad *********************/
 $('#download_imagepass').change(function(){
		$('.password_patterns').hide();
		var select_patt=$(this).val();
		$('#downloadhref').html('');
		$('#d'+select_patt).show();
		if(select_patt == 'pattern3')
		{
			var x = 10;
			var y = 5;
			var t = '<table cellspacing="0" border="1" cellpadding="0" class="grxd">';
			for (var i = 1; i <= (x * y); i++) {
   			t += (i == 1 ? '<tr>' : '');
   			t += '<td style="cursor:pointer;"></td>';
    		if (i == (x * y)) {
        	t += '</tr>';
    		} else {
        	t += (i % 10 === 0 ? '</tr><tr>' : '');
			}
			}
			t += '</table>';
			$("#downdrawTable").html(t);
			$(".grxd  td").click(function(){
			var col = $(this).css('background-color');
			var column = $(this).parent().children().index(this);
    		var row = $(this).parent().parent().children().index(this.parentNode);
			var cellclicked="column-"+column+"row-"+row;	
			if(col == "rgba(0, 0, 0, 0)" || col == 'transparent')
			{
			
					imgcoordinates.push("column-"+column+"row"+row);
					$( this ).css("background-color", "white");
					$('#down_pattern').val(imgcoordinates);
				
			}
			else
			{
				imgcoordinates=[];
				$('.grxd  td').css("background-color","transparent");
				/*$('.grxd  td').each(function(i){
				var col=$(this).css('background-color');	
				if(col == 'rgba(0, 0, 0, 0)' || col == 'transparent' )
				{
				
					
				}
				else
				{
					var column = $(this).parent().children().index(this);
   			 		var row = $(this).parent().parent().children().index(this.parentNode);
			 		imgcoordinates.push("column-"+column+"row"+row);
					$('#down_pattern').val(imgcoordinates);
				}
				});*/
				
			}
			});
			
		}
		});
		
		
		
	 $('#dimage_pattern1').Jcrop({
		maxSize:[20,20],
      //onChange:   showCoords,
      onSelect:   showCoord,
      onRelease:  clearCoord
    },function(){
      jcrop_api = this;
    });

   



  // Simple event handler, called from onChange and onSelect
  // event handlers, as per the Jcrop invocation above
  function showCoord(c)
  {
	  
    /*$('#x1').val(c.x);
    $('#y1').val(c.y);
    $('#x2').val(c.x2);
    $('#y2').val(c.y2);
    $('#w').val(c.w);
    $('#h').val(c.h);*/
	
	imgcoordinates.splice(0,2,c.x,c.y);
	imgcoordinates.splice(2,4,c.x2,c.y2);
	imgcoordinates.splice(4,6,c.w,c.h);
	imgcoordinates.splice(6,8,'0','0');
	
	$('#down_pattern').val(imgcoordinates);

	
	
	
  };

  function clearCoord()
  {
    $('#coords input').val('');
  };
	
	/*$('#dimage_pattern1').click(function(e) {
		
		var offset = $(this).offset();
    var xcoor=e.pageX - offset.left;
    var ycoor=e.pageY - offset.top;
	ycoor=ycoor.toFixed();
	xcoor=xcoor.toFixed();
	alert(ycoor+','+xcoor);
	/*var next=$('#dnextvalue').val();
	var previous=$('#dpreviousvalue').val();
	var current=$('#dcurrentvalue').val();
	var offset = $(this).offset();
    var xcoor=e.pageX - offset.left;
    var ycoor=e.pageY - offset.top;
	ycoor=ycoor.toFixed();
	
	$('#dselleft'+current).val(xcoor);
	$('#dseltop'+current).val(ycoor);
	if(current == '1')
	{
		imgcoordinates.splice(0,2,xcoor,ycoor);
	}
	else if(current == '2')
	{
		imgcoordinates.splice(2,2,xcoor,ycoor);
	}
	else if(current == '3')
	{
		imgcoordinates.splice(4,2,xcoor,ycoor);	
	}
	else
	{
		imgcoordinates.splice(6,2,xcoor,ycoor);	
	}
	$('#down_pattern').val(imgcoordinates);
	});
	
	$('#dnextbutton').click(function(e){
		e.preventDefault();
		
		var next=$('#dnextvalue').val();
		var current=$('#dcurrentvalue').val();
		var left1=$('#dselleft'+current).val();
		var top1=$('#dseltop'+current).val();
		if(left1.length > 0, top1.length > 0)
		{ 
			$('#dpreviousbutton').show();
			var previous=$('#dpreviousvalue').val();
			$('#dcoordinate'+current).hide();
			$('#dcoordinate'+next).show();
			current=next;
			if(current == 4)
			{
				$('#dcurrentvalue').val(current);
				$('#dnextvalue').val('5');
				$('#dnextbutton').hide();
				$('#dpreviousvalue').val('3');
				$('#downloadsubmit').show();
				
			}
			else
			{
				previous++;
				next++;
				$('#dnextvalue').val(next);
				$('#dpreviousvalue').val(previous);
				$('#dcurrentvalue').val(current);
				$('#downloadsubmit').hide();
			}
		}
		else
		{
			alert('Select your '+ current+' set of coordinates then procced');
		}
		
		});
	$('#dpreviousbutton').click(function(e){
	e.preventDefault();
	var previous=$('#dpreviousvalue').val();
	var current=$('#dcurrentvalue').val();
	var next=$('#dnextvalue').val();
	$('#dcoordinate'+current).hide();
	$('#dcoordinate'+previous).show();
	current=previous;
	next--;
	$('#dnextvalue').val(next);
	if(current == 1)
	{
		$('#dcurrentvalue').val(current);
		$('#dpreviousvalue').val('0');
		$('#dpreviousbutton').hide();
		$('#dnextbutton').show();
	}
	else
	{
		previous--;
		$('#dpreviousvalue').val(previous);
		$('#dcurrentvalue').val(current);
		$('#dnextbutton').show();
	}
	});*/
	
	
	/**************Pattern 2**********/	
	$("#dpattern2 #pass img").on("click",function(){
    if($('#dpattern2 #password ul').children().length == 8)
	{
	
			alert('Numerical graphical password maximum length has been reached ');
	}
	else
	{
		var imga = $(this).attr('src');
		$("#dpattern2 #password ul").append('<li><img src="' + imga + '" /><span class=close>&times;</span></li>');
		imgcoordinates.push(imga);
		
	
	
$("#dpattern2 #password ul li span").click(function(){
	
	$(this).parents('li').remove();
	imgcoordinates=[];
	$('#dpattern2 #password ul li img').each(function(i){
   		var numi=$(this).attr('src');
		imgcoordinates.push(numi);
		});
	});
	imgcoordinates.toString();
$('#down_pattern').val(imgcoordinates);	
		
}
	
	
	
});
	
	
	$("#downloadseminar").on('submit',(function(e) {
	e.preventDefault();
	$("#message").empty();
	$('#loading').show();
	var pattern=$('#download_imagepass').val();
	
	
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
			alert('Invalid Pattern - Graphical Password Combination');
			$('#downloadseminar')[0].reset();
			imgcoordinates=[];
			
			$("#dpattern2 #password ul").empty();
			$('.password_patterns').hide();
		}
		else
		{
			
			$('#downloadhref').html(data);
			$('#downloadseminar')[0].reset();
			$('.password_patterns').hide();
		
			
			
		}
	}
	});
}));


});


function drawTable(imgcoordinates) {

		

}
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
	//alert(filename);
	$('#filename').text(filename);
	$('#fileid').val(uploadid);
	
}

function lresponse(data)
{
	if(data == 'VALID')
	{
		alert('Login Successful');
		window.location.reload();
	}
	else if(data == 'INVALID')
	{
		alert('Invalid Username-Password-Graphical Password Combination');
		$('#login_form')[0].reset();
	$('#login_div .divimage_select ul li img').removeClass('border-highlight');
	}
	else if(data == 'BLOCKED')
	{
		alert('The account has been blocked.Please contact admin by using info in contact us page');
		window.location.href='/tech/contact.php';
	}
	else 
	{
		alert('This username does not appear to be in our database');
		$('#login_form')[0].reset();
	$('#login_div .divimage_select ul li img').removeClass('border-highlight');

	}
	
	
	
}



function response(data)
{
	alert(data);
	$('#signup_form')[0].reset();
	$('#signup_div .divimage_select ul li img').removeClass('border-highlight');
	
	
	
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