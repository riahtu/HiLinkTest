<?php 
require_once('config.php');
  ob_start();
  session_start();
  if(!isset($_SESSION['logged_in']) ){
    header('location:login.php');
  }
   
  if(isset($_POST['update'])){
	$firstname        = $_POST['first_name'];
	$lastname         = $_POST['last_name'];
    $email            = $_POST['email'];
	$account_id       = $_POST['account_id'];
	$birthday         = $_POST['birthday'];
	$school           = $_POST['school'];
	$grade            = $_POST['grade'];
	
   $statement = $pdo->prepare("SELECT * FROM admin WHERE email=?");
    $statement->execute(array($email));
    $emailcount = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(empty($email)){
      $error = "Email can't be empty!";

    }
    else if($emailcount == 0){
      $error = "Account Email is Wrong! Please try again";
    }else{

      $statement=$pdo->prepare("UPDATE admin SET firstname=?,lastname=?,account_id=?,school=?,grade=?,birthday=? WHERE email=?");
      $statement->execute(array($firstname,$lastname,$account_id,$school,$grade,$birthday,$email));
      $success = "Your informations change Successfully!";


    }
  }
 ?>
  <?php 

              $stm = $pdo->prepare("SELECT * FROM admin WHERE email=?");
              $stm->execute(array($_SESSION['logged_in']['email']));
              foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $row){
                $photo  = $row['photo'];
                $f_name  = $row['firstname'];
                $l_name  = $row['lastname'];
                $account_id  = $row['account_id'];
                $school  = $row['school'];
                $grade = $row['grade'];
                $email  = $row['email'];
                $birthday  = $row['birthday'];
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
		      <div class="profile-img"><img src="profile-picture/<?php echo $photo;?>"></div><a href="logout.php">Logout</a>
		  </div>
		</div>
	  <!-- -->
    </div>
 </div>
</div>
</div>
    
<!---->
<div class="user_center_content_bg">
    <div class="user_center_content_box">
        <div class="nav_box">
            <a href="profile.php" class="hover">My Profile</a>
            <a href="profile-setting.php" class="hover">Account settings</a>
			<a href="hiClass.php" class="hover">HiClass Status</a>
        </div>
        <div class="content_box">
            <div class="tis_tle"><span>Update Your Information</span></div>
					
			<div class="update-informations-area">
			  <div class="container">
				<div class="row">
				  <div class="col-md-12">
					 <div class="form-area">
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
						<div class="form-group" style="display:none;">
						  <label for="email">Email:</label>
						  <input type="email" name="email" class="form-control" id="email" value="<?php echo $email;?>">
						</div>

						<div class="form-group">
						  <label for="first_name">First Name:</label>
						  <input type="text" name="first_name" value="<?php echo $f_name;?>" class="form-control" id="first_name">
						</div>
						<div class="form-group">
						  <label for="last_name">Last Name:</label>
						  <input type="text" name="last_name" value="<?php echo $l_name?>" class="form-control" id="last_name">
						</div>
						<div class="form-group">
						  <label for="account_id">Account ID:</label>
						  <input type="text" name="account_id" value="<?php echo $account_id?>" class="form-control" id="account_id">
						</div>
						<div class="form-group">
						  <label for="school">School:</label>
						  <input type="text" name="school" value="<?php echo $school;?>" class="form-control" id="school">
						</div>
						<div class="form-group">
						  <label for="grade">Grade:</label>
						  <input type="text" name="grade" value="<?php echo $grade;?>" class="form-control" id="grade">
						</div>
						<div class="form-group">
						  <label for="birthday">Birthday:</label>
						  <input type="text" name="birthday" value="<?php echo $birthday;?>" class="form-control" id="birthday">
						</div>

						<div class="form-group">
						  <input type="submit" name="update" class="btn btn-success" value="Update Information">
						</div>


					  </form>
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