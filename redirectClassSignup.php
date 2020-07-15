<?php
require_once('config.php');
  ob_start();
  session_start();
  if(!isset($_SESSION['logged_in']) ){
    header('location:login.php');
  }else{
    header('location:https://forms.office.com/Pages/ResponsePage.aspx?id=1Y-XVC-pckqsDnH4x6s4wfd2pi2b5LpHpxKpJpda_6ZUQUhYWDBQNzc4N1BaQjExV1pISlE5UE1SRi4u');
  }

?>
            <?php
                  $stm = $pdo->prepare("SELECT * FROM admin WHERE email=?");
                  $stm->execute(array($_SESSION['logged_in']['email']));
             ?>