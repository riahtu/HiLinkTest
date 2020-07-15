<?php 
  session_start();

  require_once('config.php');
  if(isset($_POST['submit'])){

	$firstname        = $_POST['firstname'];
	$lastname         = $_POST['lastname'];
	$account_id       = $_POST['account_id'];
	$password         = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$birthday         = $_POST['birthday'];
	$school_name      = $_POST['school'];
	$grade            = $_POST['grade'];
	$email            = $_POST['email'];
    $photo            = $_FILES['photo'];

   $valid = 1;

    // Checking Profile Picture
    $tmp_name = $_FILES['photo']['tmp_name'];
    $photo_name = $_FILES['photo']['name'];
    $photo_size = $_FILES['photo']['size'];
    $tmp_ex = explode('.',$photo_name);
    $extention = end($tmp_ex);
    if(empty($_FILES['photo'])){
      $error = "Profile Picture can't be empty!";
      $valid = 0;
    }
   else if($extention != 'png' AND $extention != 'PNG' AND $extention != 'jpg' AND $extention != 'JPG' AND $extention != 'JPEG' AND $extention != 'jpeg'){
      $error = "Profile Picture Must be jpg or png !";
      $valid = 0;
    }else if($photo_size>500000){
       $error = "Profile Picture is very large!";
       $valid = 0;
    }
    // checking account_id from Database
    $statement = $pdo->prepare("SELECT account_id FROM admin WHERE account_id=?");
    $statement->execute(array($account_id));
    $accountcount = $statement->rowCount(); 

    // checking email address from database
    $stm1 = $pdo->prepare("SELECT email FROM admin WHERE email=?");
    $stm1->execute(array($email));
    $emailCount = $stm1->rowCount(); 


    if(empty($firstname)){
      $error = "Frist Name can't be Empty!";
      $valid = 0;
    }
    else if(empty($lastname)){
      $error = "Last Name can't be Empty!";
      $valid = 0;
    }
    else if(empty($account_id)){
      $error = "Account ID can't be Empty!";
      $valid = 0;
    }
    else if($accountcount == 1){
         $error = "Your Account Already Token !";
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
     else if(empty($birthday)){
      $error = "Birthday can't be Empty!";
      $valid = 0;
    }
     else if(empty($school_name)){
      $error = "School can't be Empty!";
      $valid = 0;
    }
     else if(empty($grade)){
      $error = "Grade can't be Empty!";
      $valid = 0;
    }
    else if(empty($email)){
      $error = "Email can't be Empty!";
      $valid = 0;
    }else if($emailCount == 1){
         $error = "Your Email Already Used! Please try another email";
         $valid = 0;
    }

    if($valid == 1){
      $password = SHA1($password);
      $tmp_email_code = rand(1,1000).rand(1,1000);

      $new_photo_name = "account_id".rand(1,1000).'.'.$extention;
      move_uploaded_file($tmp_name,'profile-picture/'.$new_photo_name);


      $stm = $pdo->prepare("INSERT INTO admin(firstname,lastname,account_id,password,birthday,school,grade,email,photo,email_verify,tmp_email_code) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
      $stm->execute(array($firstname,$lastname,$account_id,$password,$birthday,$school_name,$grade,$email,$new_photo_name,0,$tmp_email_code));

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
			<a class="sele_btn_box" href="login.php"><img src="i/usericon.png">User Center</a>
      </div>
      <div class="language-area">
					<a class="header_langage" href="https://hilinkeducation.cn/registration.php">
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
     Create an account
   </div>
   <div class="content_box">
    <form class="cont" action=""  method="POST" id="form1" enctype="multipart/form-data">
     <div class="regis_last clear">

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
         <div><p>First name</p><div>
         <div><input type="text" name="firstname" value="" Placeholder="First Name"> </div>


         <p>Last name</p>
         <div><input type="text" name="lastname" value="" placeholder="Last Name"> </div>

     </div>
     <div class="list">
      <div><p>Account ID</p></div>
      <div><input type="text" name="account_id" value="" placeholder="Account ID"> </div>
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
       <div><p>Grade</p></div>
       <div><input type="text" name="grade" value="" placeholder="Grade"> </div>
     </div>
     <div class="list">
       <div><p>E-mail</p></div>
       <div><input type="text" name="email" value="" placeholder="Email"> </div>
     </div>
     <div class="list">
        <p>Profile Picture:</p>
        <input type="file" name="photo" class="form-control" id="photo">
        </div>

       <div class="bit_txt">
         Your personal data will be used to support your experience across the site, to manage access to your account, and for other purposes as described in our privacy policy.
       </div>

     <div class="bit_btn">
       <input type="submit" name="submit" value="Register" class="regis_btn" />
       <p>Already had an account? <a href="login.php">log in</a> </p>
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
