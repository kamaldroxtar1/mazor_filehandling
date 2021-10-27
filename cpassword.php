<?php
if(isset($_POST['sub'])){
    $newpass=$_POST['newpass'];
    $newpassword1 = substr(sha1($newpass), 0, 10);
    unlink("users/$uid/password.txt");
    file_put_contents("users/$uid/password.txt",$newpassword1);
    header("location:psuccess.php");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="javascript/registration.js"></script>
    <style>
        .cpassword{
            display: flex;
            justify-content: center;
            align-items:center ;
        }
        button:hover{
            background-color: cyan;
        }
    </style>
</head>
<body>
    <div class="conatiner text-center">
        <h1>Change password</h1>
        <hr>
    </div>
<div class="cpassword">
                <form method="POST">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control" placeholder="Old Password" name="oldpass">
                    </div>
                    <div class="form-group">
                        <label>New password</label>
                        <input type="password" class="form-control" placeholder="new Password" name="newpass" id="password" onblur="checkpass()">
                    </div>
                    <div class="form-group">
                        <label>confirm password</label>
                        <input type="password" class="form-control" placeholder="confirm Password" id="cpassword1" name="confirmpass" onblur="confirmpass1()">
                    </div>
                    <button type="submit" class="btn btn-black " name="sub">Change Password</button>
                </form>
            </div>
</body>
</html>