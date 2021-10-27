
<?php
if(isset($_POST['sub'])){
    
    unlink("users/$uid/ppic/image.jpg");
    $tmp=$_FILES['cimage']['tmp_name'];
    $fn=$_FILES['cimage']['name'];
    $ext=pathinfo($fn,PATHINFO_EXTENSION);
    $fname="image".".$ext";
    if($ext=="jpeg" || $ext="jpg"){
        
        move_uploaded_file($tmp, "users/$uid/ppic/$fname");

    }
    header("location:dashboard.php");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change profile photo</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="javascript/registration.js"></script>
    <style>
        .cimage{
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
        <h1>Change profile photo</h1>
        <hr>
    </div>
<div class="cimage">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Choose new profile picture</label>
                        <input type="file" class="form-control" name="cimage">
                    </div>
                    <button type="submit" class="btn btn-black " name="sub">Change Picture</button>
                </form>
            </div>
</body>
</html>