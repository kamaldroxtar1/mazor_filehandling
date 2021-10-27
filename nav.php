<?php 
$imgpath="users/$uid/ppic/image.jpg";
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="dashboard.php" style="margin-left: 20px;">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item  left">
            <a class="nav-link" href="?con=changepass" name="changepass">Change password</a>
          </li>
          <li class="nav-item left">
            <a class="nav-link" href="#">Welcome : <?php echo $uid ;?></a>
          </li>
          <li class="nav-item left">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
          <li class="nav-item left">
            <img src="<?php echo "$imgpath" ?>" alt="" height="50px" width="70px">
          </li>
        </ul>
      </div>
    </nav>