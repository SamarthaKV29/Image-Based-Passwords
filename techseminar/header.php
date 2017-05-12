<div id="headerdiv">
<nav id="header" class="flipflop">
	<h3 class="logo">Image Based Passwords</h3>
    <ul style=" position:relative; cursor:pointer;float:right; margin-top:-60px;">
<?php 
session_start();
if(isset($_SESSION['username'],$_SESSION['login_string']))
{?>
    <li><?php echo $_SESSION['username']; ?></li>
    <li><a class="tsbut" href="logout.php">Logout </a></li>
 <?php }else{?>
	<li><a id="loginsignupa" class="tsbut">Login / Signup</a></li>
<?php }?>
</ul>
  
</nav>

</div>
<hr/>

  <div id="blanket"></div>
  
  <div id="loginsignup_div" class="subdivblanket">
  <div class="close_login"></div>
  
  <nav >
  <ul >
  <li><a class="subject_alink" id="signina">LOGIN</a></li>
  <li><a class="subject_alink" id="signupa">SIGN UP</a></li>
  </ul>
  </nav>
  
  <div id="login_div" class="loginsigninblanket">
   <div class="div_submit" id="div_submitlogin">
  <h2>Welcome to File Upload/Download</h2>
  <p>Sign in to access your account</p>
 
 
 </div>
  <form id="login_form" action="login.php"  method="post">
  
  <ul><li><label>Username</label><br/>
  <input  type="text" required class="tstb" id="tstb1" name="username" placeholder="Enter Username" maxlength="20" /></li>
  <li><label>Password</label><br/>
  <input type="password"  required class="tstb" id="tstb2" name="password" placeholder="Enter desired Password" /></li>
  
  </ul>
  <p><input id="tstb2" class="tsbut"  type="submit" name="signin" value="Sign in" /></p>
  <p><label>Select your choosen graphical password</label><br/></p>
 <div class="divimage_select">
  <ul>
  <li><img class="regImgs" src="images/fox.jpg" id="99" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/jackal.jpg" id="94" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
     <li><img class="regImgs" src="images/bear.jpg" id="88" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/panther.jpg" id="83" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/tiger.jpg" id="77" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/lion.jpg" id="65" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/whale.jpg" id="50" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/octopus.jpg" id="49" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/giraffe.jpg" id="48" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/cat.jpg" id="47" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
     <li><img class="regImgs" src="images/dog.jpg" id="46" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/penguin.jpg" id="45" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/zebra.jpg" id="36" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/leopard.jpg" id="32" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/deer.jpg" id="62" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/monkey.jpg" id="14" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/elephant.jpg" id="17" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/jaguar.jpg" id="22" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/shark.jpg" id="28" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
     <li><img class="regImgs" src="images/snake.jpeg" id="5" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   </ul>
   </div>
 

  </form>
  
  </div>
  
  <div id="signup_div" class="loginsigninblanket">
  <div class="div_submit">
  <h2>Welcome to File Upload/Download</h2>
  <p>Sign up to upload a file that is important to you  </p>
 
 </div>
  <form id="signup_form" action="signup.php"  method="post">
  <ul class="ulsignform">
  <li><label>Username</label><br/>
  <input  type="text" required class="tstb" autocomplete="off" id="signuptb1" name="username" placeholder="Enter Username" maxlength="20" /></li>
  <li><label>Password</label><br/>
  <input type="password"  required class="tstb"  autocomplete="off" id="signuptb2" name="password" placeholder="Enter Password" /></li>
  <li><label>Confirm Password</label><br/>
  <input type="password"  required class="tstb"  autocomplete="off" id="signuptb3" name="conpassword" placeholder="Confirm Password" /></li>
   <li><label>Email Address</label><br/>
  <input type="email"  required class="tstb"  autocomplete="off" id="signuptb4" name="email" placeholder="Eg:- user@email.com" /></li>
</ul>
<p><input id="tstb3" class="tsbut"  type="submit" name="register" value="Register" /></p>
<p><strong style="text-transform:none">Choose any three animals as your graphical password.<br />Please do remember the pattern in which you are selecting the images</strong><br/></p>
 <div class="divimage_select">
  <ul>
  <li><img class="regImgs" src="images/fox.jpg" id="99" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/jackal.jpg" id="94" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
     <li><img class="regImgs" src="images/bear.jpg" id="88" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/panther.jpg" id="83" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/tiger.jpg" id="77" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/lion.jpg" id="65" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/whale.jpg" id="50" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/octopus.jpg" id="49" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/giraffe.jpg" id="48" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/cat.jpg" id="47" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
     <li><img class="regImgs" src="images/dog.jpg" id="46" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/penguin.jpg" id="45" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/zebra.jpg" id="36" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/leopard.jpg" id="32" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/deer.jpg" id="62" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/monkey.jpg" id="14" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/elephant.jpg" id="17" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/jaguar.jpg" id="22" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   <li><img class="regImgs" src="images/shark.jpg" id="28" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
     <li><img class="regImgs" src="images/snake.jpeg" id="5" alt="hjuykloimnhagdffdfhdfgdgfdgfsgdfgsdfgsbfhgsfyerhdfhbdfhdvfsdvdagsgqge783643546687" /></li>
   </ul>
   </div>
   
  </form>
  
  
  </div>
</div>
