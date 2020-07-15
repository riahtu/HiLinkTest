<?php
require_once('config.php');
  ob_start();
  session_start();
  if(!isset($_SESSION['logged_in']) ){
    header('location:login.php');
  }else{
    header('location:https://www.paypal.com/cgi-bin/webscr');
  }

?>