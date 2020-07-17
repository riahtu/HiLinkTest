<?php 
require_once('config.php');
  ob_start();
  session_start();
  if(!isset($_SESSION['logged_in']) ){
    header('location:login.php');
  }
 ?>
           <?php

              $stm = $pdo->prepare("SELECT * FROM admin WHERE email=?");
              $stm->execute(array($_SESSION['logged_in']['email']));
              foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $row){
                $photo  = $row['photo'];
                $name  = $row['firstname'] ." " . $row['lastname'];
                $account_id  = $row['account_id'];
                $school  = $row['school'];
                $grade = $row['grade'];
                $email  = $row['email'];
                $birthday  = $row['birthday'];
                $type = $row['type'];
                $count = $row['count'];
              }
              
             ?>

             <?php
             if ($type == 0) {
                $plan = "No Subscription";
             } elseif ($type == 1) {
                 $plan = "Basic";
             } elseif ($type == 2) {
                 $plan = "Standard";
             } elseif ($type == 3) {
                 $plan = "Premium";
             }


             if ($type != 0) {
                 $message = "Your hadn't subscribe to our product, please click here to view our plans.";
                 $html = <<<HTML
                 <a href="pricing.html">Pricing</a>
                 HTML;
             } elseif ($type == 0 && count == 0) {
                $html = <<<HTML
                <a href="pricing.html">here</a>
                HTML;
                $message = "You ran out of class this week! Please come back later or click $html to buy single sessions.";
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
<div class="profile-usersetting-area index_search_box">
 <div class="warpin clear">
 <div class="container">
	<div class="row">
	<div class="col-lg-12">
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
		  <div class="profile-img-area">
    		  <div class="profile-page-icon">
    		     <a href="javascript:void(0)" class="nav-icon openbtn" onclick="openNav()">☰</a>
    		  </div>
		      <div class="profile-right-area"><div class="profile-img"><a href="profile.php"><img src="profile-picture/<?php echo $photo;?>"></div><a href="logout.php">Logout</a>
		  </div>
		</div>
	  <!-- -->
    </div>
 </div>
</div>
</div>

 <div class="welcome-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Welcome  <?php echo $name;?></h4>
          </div>
        </div>
      </div>
    </div>
    
<!---->
<div class="user_center_content_bg">
    <div class="user_center_content_box">
        <div class="nav_box">
            <a href="profile.php" class="hover">My  Profile</a>
            <a href="profile-setting.php" class="hover">Account settings</a>
            <a href="hiClass.php" class="hover">HiClass Status</a>
        </div>
        <div class="content_box">
            <div class="tis_tle"><span>Class Info.</span></div>
            <div class="main-profile-area">
			<div class="profile-area">
				<div class="profile-image-area">
					<img src="profile-picture/<?php echo $photo;?>" alt="profile">
				</div>
				<div class="desicnatins-area">
					<div class="profile-desicnatins-area">
						<h2><?php echo $name;?></h2>
						<p>Account ID : <?php echo $account_id;?></p>
						
						<div class="contact-information-area">
							<div class="information-item">
								<!-- <div class="contact-information-item">
									<h3>ABAABA INFORMATION</h3>
									<ul>
										<li><label>E-mail:</label><span class="color-span"><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></span></li>
									</ul>
								</div> -->
								<div class="bacik-information contact-information-item">
									<h3>Subscription Status</h3>
									<ul>
										<li><label>Subscription Plan:</label><span><?php echo $plan;?></span></li>
										<li><label>Classes Remaining:</label><span><?php echo $count;?> classes remaining.</span></li>
										<li><label>Info:</label><span><?php echo $message;?></span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        </div>
    </div>
</div>
<!---->
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
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/wSelect.min.js"></script>
<script type="text/javascript" src="js/dynamics.js"></script>
<script type="text/javascript" src="js/minigrid.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>