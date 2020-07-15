<?php 
  require_once('config.php');
  if(isset($_POST['submit'])){
      
    	$programe         = $_POST['programe'];
	$firstname        = $_POST['firstname'];
	$lastname         = $_POST['lastname'];
	$password         = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$address_line     = $_POST['addrline'];
	$city             = $_POST['city_name'];
	$country          = $_POST['addrcountry'];
	$zip_code         = $_POST['addrzip'];
	$age              = $_POST['age'];
	$birthday         = $_POST['birthday'];
	$school_name      = $_POST['school'];
	$phone            = $_POST['phone'];
	$email            = $_POST['email'];
    	$parent_first_name= $_POST['pfn'];
    	$parent_last_name = $_POST['pln'];
    	$parent_phone     = $_POST['pphone'];
    	$parent_email     = $_POST['pemail'];
    	$about_you        = $_POST['about_you'];

   $valid = 1;
   
    // checking email address from database
    $stm1 = $pdo->prepare("SELECT email FROM student_signup WHERE email=?");
    $stm1->execute(array($email));
    $emailCount = $stm1->rowCount(); 


    if(empty($programe)){
      $error = "Programe can't be Empty!";
      $valid = 0;
    }
    else if(empty($firstname)){
      $error = "Frist Name can't be Empty!";
      $valid = 0;
    }
    else if(empty($lastname)){
      $error = "Last Name can't be Empty!";
      $valid = 0;
    }
    else if(empty($address_line)){
      $error = "Address can't be Empty!";
      $valid = 0;
    }
    else if(empty($city)){
         $error = "City can't be Empty!";
         $valid = 0;
    }
    else if(empty($password)){
      $error = "Password can't be Empty!";
      $valid = 0;
    }
    else if($password != $confirm_password){
			echo "Password and Confirm Password Doesnot Match";
			$valid = 0;
		}
	else if(empty($country)){
      $error = "Country can't be Empty!";
      $valid = 0;
    }
     else if(empty($zip_code)){
      $error = "Zipcode can't be Empty!";
      $valid = 0;
    }
     else if(empty($age)){
      $error = "Age can't be Empty!";
      $valid = 0;
    }
     else if(empty($phone)){
      $error = "Phone can't be Empty!";
      $valid = 0;
    } else if(empty($password)){
      $error = "Password can't be Empty!";
      $valid = 0;
    }
     else if(empty($birthday)){
      $error = "Birthday can't be Empty!";
      $valid = 0;
    }
     else if(empty($school_name)){
      $error = "School can't be Empty!";
      $valid = 0;
    }
    else if(empty($email)){
      $error = "Email can't be Empty!";
      $valid = 0;
    }else if($emailCount == 1){
         $error = "Your Email Already Used! Please try another email";
         $valid = 0;
    }
    else if(empty($parent_first_name)){
      $error = "Parent FirstName can't be Empty!";
      $valid = 0;
    }
    else if(empty($parent_last_name)){
      $error = "Parent LastName  can't be Empty!";
      $valid = 0;
    }
    else if(empty($parent_phone)){
      $error = "Parent's Phone can't be Empty!";
      $valid = 0;
    }
    else if(empty($parent_email)){
      $error = "Parent's Email can't be Empty!";
      $valid = 0;
    }
    else if(empty($about_you)){
      $error = "Bio can't be Empty!";
      $valid = 0;
    }

    if($valid == 1){
      $password = SHA1($password);
      
      $stm = $pdo->prepare("INSERT INTO student_signup(programe,first_name,last_name,password,address_line,city,country,zip_code,age,birthday,school_name,phone,email,parent_first_name,parent_last_name,parent_phone_number,parent_email,about_you) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $stm->execute(array($programe,$firstname,$lastname,$password,$address_line,$city,$country,$zip_code,$age,$birthday,$school_name,$phone,$email,$parent_first_name,$parent_last_name,$parent_phone,$parent_email,$about_you ));

      $success = "Register Successfully!";


      /*$email_txt = "Hello, your Registration Successfully!"."\r\n";
      $email_txt .= "Your verification Code is: ";
      $email_txt .= $tmp_email_code;

      mail($email,"Verify your email",$email_txt);

      header("location:verifyEmail.php?account_id=$account_id");*/
    }

  }
 ?>
<!DOCTYPE html>
<html lang="zh">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="keywords" content="your keywords">
<meta name="description" content="your description">
<meta name="author" content="author,email address">
<meta name="robots" content="index,follow">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="renderer" content="webkit"/>
<meta name="force-rendering" content="webkit"/>
<link type="text/css" rel="stylesheet" href="css/swiper.min.css" />
<link type="text/css" rel="stylesheet" href="css/animate.min.css" />
<link type="text/css" rel="stylesheet" href="css/wSelect.css" />
<link type="text/css" rel="stylesheet" href="css/app.css" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css" />
<link type="text/css" rel="stylesheet" href="css/owl.theme.default.min.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<link type="text/css" rel="stylesheet" href="css/responsive.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/swiper.min.js"></script>
<script type="text/javascript" src="js/wow.js"></script>
<title>Register - HiLink</title>
<link rel="icon" href="i/Hi3.jpg" type="image/x-icon" />
</head>
<body>
<!--<div class="header_tip_box">
   <div class="warpin">
     <div class="header_sele_box">
      <select class="header_lang" tabindex="1">
        <option value="">Select a Country</option>
        <option value="EN" data-icon="i/gq.png">English</option>
      </select>
     </div>
   </div>
</div>-->
<!-- -->
<div class="index_search_box">
 <div class="warpin clear">
 <div class="container">
	<div class="row">
	<div class="col-lg-2">
		<div class="logo">
		   <a href="index.html"><img src="i/logo.png" alt=""> </a>
		   <a href="javascript:void(0)" class="nav-icon openbtn" onclick="openNav()">&#9776;</a>
		</div>
	</div>
	
	<div class="col-lg-7">
		  <div class="menu_box">
		   <img src="i/menu.png" alt=""> Table of Contents
		  </div>
		  <div class="search_box">
		   <input type="text" name="" placeholder="Enter keyword">
		  </div>
		  <!-- -->
		  <div class="menu_nav_box canvas-menu">
			<div class="index_navi_cont">
			 <div class="warpin clear">
			   <div class="content_box clear">
        <a href="javascript:void(0)" class="nav-icon closebtn" onclick="closeNav()">&times;</a>
        <div class="nav_last">
						<a href="tutor.html">HiClass</a>
					</div>
					<div class="nav_last">
						<a href="WhyHiClass.html">Why HiClass</a>
					</div>
				 <div class="nav_last">
				  <a href="programIntroduction.html">HiCamp</a>
				  <!--<div class="nav_bit_last">
					<div class="list">
					  <a href="summerProgram.html">program</a>
					</div>
					<div class="list">
					  <a href="summerProgram.html">program</a>
					</div>
					<div class="list">
					  <a href="summerProgram.html">program</a>
					</div>
				  </div>-->
				</div>
<!--				 <div class="nav_last">-->
<!--				   <a href="dowloadArea.html">Resources</a>-->
<!--                 </div>-->
<div class="nav_last">
                        <a href="pricing.html">Pricing</a>
                      </div>
			   </div>
			 </div>
			</div>
		  </div>
		</div>
	  <!-- -->
	  
	<div class="col-lg-3">
		  <div class="search_sele">
			<a class="sele_btn_box" href="/redirect.php"><img src="i/usericon.png">User Center</a>
      </div>
      <div class="language-area">
					<a class="header_langage" href="https://hilinkeducation.cn/signup.php">
					 <img src="i/cn.png">简体中文
					</a>
			</div>
	  

	</div>
    </div>
 </div>
</div>
</div>
 <!-- -->

<!-- -->
<div class="regis_content_box">
 <div class="warpin">
   <div class="tis_tle">
     Sign Up Form
   </div>
   <div class="content_box">
    <form class="cont" actions="" method="POST" id="form1">
                <?php if(isset($error)): ?>
                <div class="alert alert-danger">
                  <?php echo $error; ?>
                </div>
                <?php endif; ?>

                <?php if(isset($success)): ?>
                <div class="alert alert-success">
                  <?php echo $success; ?>
                </div>
                <?php endif; ?>
     <div class="regis_last clear">
      <div class="list">
      <div><p>Program</p></div>
        <select class="sele" name="programe" id="selectProgram">
          <option>Please select a program...</option>
          <option value="National University of Singapore Summer Camp">National University of Singapore Summer Camp</option>
          <option value="Singapore Future Growth Program">Singapore Future Growth Program</option>
          <option value="UK Private School Summer Camp">UK Private School Summer Camp</option>
          <option value="University of Oxford - Art and Leadership Summer Camp">University of Oxford - Art and Leadership Summer Camp</option>
          <option value="German Equestrian Summer Camp">German Equestrian Summer Camp</option>
          <option value="Stanford Technology Summer camp">Stanford Technology Summer camp</option>
        </select>
      </div>
      <br>
      <div class="list">
         <div><p>First name</p></div>
         <div><input type="text" name="firstname" placeholder="First Name"> </div>


         <div><p>Last name</p></div>
         <div><input type="text" name="lastname" placeholder="Last Name"> </div>
      </div>
     <div class="list">
         <div><p>Password</p></div>
        <div><input type="password" name="password" value="" placeholder="Password"> </div>
     </div>
     <div class="list">
         <div><p>Confirm Password</p></div>
        <div><input type="password" name="confirm_password" value="" placeholder="Confirm Password"> </div>
     </div>
     
     <div class="list">
      <div><p>Billing address</p></div>
      <div><input type="text" name="addrline" placeholder="Address Line"> </div>
      <div><input type="text" name="city_name" placeholder="City/County"> </div>
      <div><input type="text" name="addrcountry" placeholder="Country"> </div>
      <div><input type="text" name="addrzip" placeholder="ZIP"> </div>
    </div>
    <div class="list">
      <div><p>Age</p></div>
      <div><input type="text" name="age" placeholder="18"> </div>
    </div>
     <div class="list">
       <div><p>Birthday</p></div>
       <div>
         <input type="date" name="birthday" placeholder="">
       </div>
     </div>
     <div class="list">
       <div><p>School Name</p></div>
       <div><input type="text" name="school" value="" placeholder="School Name"> </div>
     </div>
     <div class="list">
       <div><p>Phone Number</p></div>
       <div><input type="text" name="phone" placeholder="Phone Number"> </div>
     </div>
     <div class="list">
       <div><p>E-mail</p></div>
       <div><input type="text" name="email" value="" placeholder="Email"> </div>
     </div>
     <div class="list">
      <div><h1>Parent's Information</h1></div>
     </div>
     <div class="list">
      <div><p>Parent's First Name</p></div>
      <div><input type="text" name="pfn" placeholder="Parent's First Name"> </div>
      <div><p>Parent's Last Name</p></div>
      <div><input type="text" name="pln" placeholder="Parent's Last Name"> </div>
    </div>
    <div class="list">
      <div><p>Parent's Phone Number</p></div>
      <div><input type="text" name="pphone" placeholder="Parent's Phone Number"> </div>
    </div>

    <div class="list">
      <div><p>Parent's E-mail</p></div>
      <div><input type="text" name="pemail" value="" placeholder="Parent's Email"> </div>
    </div>

    <div class="list">
      <div><h1>About You</h1></div>
     </div>

     <div class="list">
      <div><p>Tell us about yourself!</p></div>
      <textarea name="about_you" rows="10" cols="100">
      </textarea>
     </div>
     <div class="bit_btn">
       <input type="submit" name="submit" value="Register" class="regis_btn" />
     </div>
     </div>
    </form>
   </div>
 </div>
</div>
<!-- -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5efb7a294a7c6258179ba250/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<div class="footer_copy">
	TEl：(317)426-6189 Mail: hiclass@hilink.llc
</div>
<div class="footer_copy">
Follow Us <a href="https://www.instagram.com/hilinkeducation/"><img class="mx-1" style="height: 15px; width: 15px; " src="i/insta_logo.png"></a><a href="https://www.facebook.com/HiLinkEducation"><img class="mx-1" style="height: 15px; width: 15px; " src="i/fb_logo.png"></a><a href="https://www.linkedin.com/company/hilink-education/"><img class="mx-1" style="height: 15px; width: 15px; " src="i/linkedin_logo.png"></a><a href="https://twitter.com/HiLinkEducation"><img class="mx-1" style="height: 15px; width: 15px; " src="i/twitter_logo.png"></a>
</div>
<div class="footer_copy">
		HiLink LLC © 2020 All Rights Reserved  
</div>
</body>
<script type="text/javascript" src="js/wSelect.min.js"></script>
<script type="text/javascript" src="js/dynamics.js"></script>
<script type="text/javascript" src="js/minigrid.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">

</script>
</html>
