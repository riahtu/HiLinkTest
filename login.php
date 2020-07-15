<?php 
  session_start();

  require_once('config.php');
  if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];


    $statement = $pdo->prepare("SELECT * FROM admin WHERE email=?");
    $statement->execute(array($email));
    $accountcount = $statement->rowCount();
    $accountData = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($accountData as $singleUser){
      $db_password = $singleUser['password'];
      $email_verify = $singleUser['email_verify'];
    }

    if(empty($email)){
      $error = "Email can't be Empty!";
    }else if(empty($password)){
      $error = "Password can't be Empty!";
    }else if($accountcount == 0){
      $error = "Email is Wrong! Please try again";
    }else{
      
      $confirmpassword = SHA1($password);

      if($db_password == $confirmpassword){
        
        
           $_SESSION['logged_in'] = $singleUser;
        
           header('location:profile.php');
       /* if($email_verify == 1){
           $_SESSION['logged_in'] = $singleUser;
        
           header('location:index.php');
        }else{
          $error =  "Please Verify your email address!";
        }*/
       
      }else{
        $error = "Your Password Doesn't Match!";
      }

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
<title>Log In - HiLink</title>
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
					<a class="header_langage" href="https://hilinkeducation.cn/login.php">
					 <img src="i/cn.png">简体中文
					</a>
			</div>

	</div>
    </div>
 </div>
</div>
</div>
 <!-- -->
    <div class="main-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form">
              <h3 class="from-title">Login Form</h3>
              <form action="" method="POST">
                <?php if(isset($error)): ?>
                <div class="alert alert-danger">
                  <?php echo $error; ?>
                </div>
                <?php endif; ?>
                <div class="form-group">
                  <label for="username">Email:</label>
                  <input type="text" name="email" class="form-control" placeholder="Email" id="username">
                </div>

                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" name="password" placeholder="Password" class="form-control" id="password">
                </div>
    
                <div class="form-group">
                  <input type="submit" name="login" class="btn btn-success" value="Login" style="width:100%;">
                </div>
                 <div class="forgot-password form-group">
                     <p><a href="changePassword.php">Forgot Your Password</a></p>
                </div>
                <div class="new_register-button form-group">
                   <p>Don't have an account yet? <a href="registration.php" class="">Register Now</a></p>
                </div>
                

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
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
