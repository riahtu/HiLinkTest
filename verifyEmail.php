<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Verify Email Address</title>
  </head>
  <body>
   

  <?php 

  if(!isset($_REQUEST['account_id'])){
    header('location:profile.php');
  }


  require_once('config.php');
  $account_id = $_REQUEST['account_id'];


  $stm = $pdo->prepare("SELECT * FROM admin WHERE account_id=?");
  $stm->execute(array($account_id));
  foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $row){
    $email_verify_status = $row['email_verify'];
    $db_email_code = $row['tmp_email_code'];
  }

  if($email_verify_status == 1){
    header('location:profile.php');
  }

  if(isset($_POST['submit_email_verify'])){
    $user_email_code = $_POST['user_email_code'];


    if($db_email_code == $user_email_code){
      $stm = $pdo->prepare("UPDATE admin SET email_verify=? WHERE account_id=?");
      $stm->execute(array(1,$account_id));


      $success = "Your Email Verification Successfully! Please <a href='login.php'>login</a>";
    } else{
      $error = "Your Code is Not Valid ! Please try again!";
    }

  }




   ?>

   <div class="main-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Your Registration SUccessfully!</h4>
            </div>
            
            <?php if(isset($error)): ?>
              <div class="alert alert-danger">
                <?php echo $error; ?>
              </div>
            <?php endif; ?>
            
            <?php if(!isset($success)) : ?>
            <div class="alert alert-danger">
              <p>Verify your email address</p>
              <p>Please check your Email Address then Submit the Verify Code:</p>
              <br>
              <form action="" method="POST">
                <div class="form-group">
                  <input style="width:200px" class="form-control" name="user_email_code" type="text"   id="" placeholder="Put your Code">
                </div>
                <input class="btn btn-success" type="submit" name="submit_email_verify" value="Verify Email">
              </form>
            </div>
            <?php else: ?>
            <div class="alert alert-success">
              <?php echo $success; ?>
            </div>
            <?php endif; ?>



          </div>
        </div>
      </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>