<?php
  require_once('config.php');
  ob_start();
  session_start();

  
  if(isset($_POST['forgot_password'])){
    $email  = $_POST['email'];
    $new_password      = $_POST['new_password'];
    $retype_password   = $_POST['retype_password'];


    $statement = $pdo->prepare("SELECT * FROM admin WHERE email=?");
    $statement->execute(array($email));
    $emailcount = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
      $db_password = $row['password'];
    }
    if(empty($email)){
      $error = "Email can't be empty!";

    }else if(empty($new_password)){
      $error = "New password can't be empty!";

    }else if(empty($retype_password)){
      $error = "Confirm password can't be empty!";

    }
    else if($emailcount == 0){
      $error = "Account Email is Wrong! Please try again";
    }else{

      $new_password = SHA1($retype_password);
      $statement=$pdo->prepare("UPDATE admin SET password=? WHERE email=?");
      $statement->execute(array($new_password,$email));
      $success = "Your password change Successfully! <br/> Please <a href='login.php'>Login</a>";


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
					<a class="header_langage" href="https://hilinkeducation.cn/changePassword.php">
					 <img src="i/cn.png">简体中文
					</a>
			</div>
	  

	</div>
    </div>
 </div>
</div>
</div>
    <div class="main-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
             <div class="form">
              <h3 class="from-title">Password Change Form</h3>
              <form action="" method="POST">
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
                <div class="form-group">
                  <label for="current_password">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" id="current_password">
                </div>

                <div class="form-group">
                  <label for="new_password">New Password:</label>
                  <input type="password" name="new_password" placeholder="New Password" class="form-control" id="new_password">
                </div>

                <div class="form-group">
                  <label for="repassword">Re-type New Password:</label>
                  <input type="password" name="retype_password" placeholder="Confirm New Password" class="form-control" id="repassword">
                </div>

                <div class="form-group">
                  <input type="submit" name="forgot_password" class="btn btn-success" value="Change Password">
                </div>


              </form>
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
