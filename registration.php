<?php
include("captcha.php");
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $tmp = $_FILES['profile_photo']['tmp_name'];
    $cap = $_POST['captcha'];


    if (!empty($email) && !empty($password) && !empty($confirmpassword) && !empty($name) && !empty($gender) && !empty($age) && !empty($tmp) && !empty($cap)) {
        if ($_POST['captcha'] == $_POST['captchasum']) {
            $fn = $_FILES['profile_photo']['name'];
            $ext = pathinfo($fn, PATHINFO_EXTENSION);
            $fname = "image".".$ext";
            if ($ext == "jpeg" || $ext == "jpg") {

                if (is_dir("users/" . $email)) {
                    $error = "Email is already registered";
                } else {
                    mkdir("users/$email");
                    mkdir("users/$email/ppic");
                    if (move_uploaded_file($tmp, "users/$email/ppic/$fname")) {
                        $password = substr(sha1($password), 0, 10);
                        file_put_contents("users/$email/password.txt", "$password");
                        file_put_contents("users/$email/name.txt", "$name");
                        file_put_contents("users/$email/gender.txt", "$gender");
                        file_put_contents("users/$email/age.txt", "$age");
                        header("location:welcome.php?uid=$email");
                    } else {
                        rmdir("users/$email");
                        $error = "Uploading error";
                    }
                }
            } else {
                $error = "Only jpg format supported";
            }
        } else {
            $error = "Invalid captcha.";
        }
    } else {
        $error = "Fill all the fields.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="css/login.css">
    <script src="javascript/registration.js"></script>
</head>

<body>

    <div class="sidenav">
        <div class="login-main-text">
            <h2>Application<br> Registration Page</h2>
            <p>Login or register from here to access.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="container">
                <?php
                if (!empty($error)) {
                ?>
                    <div class="alert alert-danger"> <?php echo $error; ?></div>
                <?php
                }
                ?>
            </div>
            <div class="register-form">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Email ID</label>
                        <input type="email" class="form-control" placeholder="Email ID" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" onblur="checkpass()">
                    </div>
                    <div class="form-group">
                        <label>Confirm Passsword</label>
                        <input id="cpassword" type="password" class="form-control" placeholder="Confirm Passsword" name="confirmpassword" onblur="confirmpass()">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <br>
                        Male <input type="radio" name="gender" value="male"> <br>
                        Female <input type="radio" name="gender" value="female">

                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" class="form-control" placeholder="age" name="age">
                    </div>
                    <div class="form-group">
                        <label>Profile Photo</label>
                        <input type="file" class="form-control" name="profile_photo">
                    </div>
                    <div class="form-group">
                        <label>Captcha : <b><?php echo $pattern; ?></b></label>
                        <input type="text" class="form-control" placeholder="captcha" name="captcha">
                        <input type="hidden" class="form-control" name="captchasum" value="<?php echo $captchasum; ?>">
                    </div>
                    <button id="button" type="submit" class="btn btn-success" name="register">Register</button> OR
                    <a href="login.php" class="btn btn-black">Login</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>