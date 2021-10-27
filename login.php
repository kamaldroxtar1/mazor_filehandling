<?php 
  if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $pass1=$password;
    if(!empty($email) && !empty($password)){
      if(is_dir("users/$email")){
          $fo=fopen("users/$email/password.txt","r");
          $pass=trim(fgets($fo));
          $password=substr(sha1($password),0,10);
          if($pass==$password){
            session_start();
            $_SESSION['uid']=$email;
            if(!empty($_POST['remember'])){
              setcookie('email',$email,time()+3600*24);
              setcookie('password',$pass1,time()+3600*24);
            }
            header("location:dashboard.php");
          }
          else {
            $errMsg="Enter correct email or password";
          }
      }
      else{
        $errMsg="Enter correct email or password";
      }
    }
    else {
      $errMsg="Plz fill the blank fields";
    }
  }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="css/login.css">
    <script>
      function cook(){
          if("<?php echo $_COOKIE['email'];?>"!=undefined){
            if(document.getElementById("email").value=="<?php echo $_COOKIE['email'];?>"){
              document.getElementById("password").value="<?php echo $_COOKIE['password'];?>" ;
            }
            else {
              document.getElementById("password").value="" ;
            }
          }
      }
    </script>
</head>

<body>

    <div class="sidenav">
        <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
        <?php 
          if(!empty($errMsg)){
            ?>
      <div class="alert alert-danger"> <?php echo $errMsg;?></div>
            <?php
          }
          ?>
            <div class="login-form">
                <form method="POST">
                    <div class="form-group">
                        <label>Email ID</label>
                        <input type="email" class="form-control" onchange="cook()" placeholder="email ID" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remembercheck">
                        <label for="remembercheck" class="form-check-label">Remember Me</label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-black" name="login">Login</button>
                    <a href="registration.php" class="btn btn-secondary"> Register</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>