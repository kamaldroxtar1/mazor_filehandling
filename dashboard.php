<?php 
 session_start();
 $uid=$_SESSION['uid'];
 if(empty($uid)){
   header("location:index.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
  <header>
    <?php include("nav.php"); ?>        
  </header>

  <section class="row container">
    <aside class="col-sm-4">
    <?php include("sidebar.php"); ?>
    </aside>
    <aside class="col-sm-8">
    <?php
    switch(@$_GET['con']){
      case "changepass" : include("cpassword.php");
      break;
      case "changeprofile" : include("cimage.php");
    }
    ?>
    </aside>
  </section>
</body>
</html>
