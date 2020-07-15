<?php
    if($_SESSION['logged_in'] == $singleUser){
        header('location:profile.php');
    }else{
        header('location:login.php');
    }
?>