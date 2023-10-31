
<?php require('../app/config.php'); ?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/user_add_login.css">
  <script src="../js/main.js"></script>
  <meta name="description" content="<?php echo $description; ?>">
  <title><?php echo $title; ?></title>
</head>
<body>
<div id="loading-screen">
  <div class="loader"></div>
</div>
<header id="header">
    <div class="inner">
      <h1 class="site-title">
      <?php
        if(isset($_SESSION['login']) == true) {
        echo '<a href="dashboard.php"><img src="../img/無題2532_20230831013738.png" alt="#">';
        } else {
          echo '<a href="index.php"><img src="../img/無題2532_20230831013738.png" alt="#"></a>';
        }
        ?>
      </h1>
    </div>
  </header>
  <main>
    <div id="hero">
      <img src="../img/00037-1122313239.png" alt="#">
    </div>
  <div class="wrapper">
  <h2 class="register-title">Register</h2>
  <form action="user_add_check.php" method="post" class="register-form">
    Username<br/>
    <input type="text" name="nickname" style="width: 200px"><br/>
    Email</br>
    <input type="email" name="email" style="width:200px"><br/>
    Password</br>
    <input type="text" name="pass" style="width: 200px"><br/>
    PasswordAgain</br>
    <input type="text" name="pass2" style="width: 200px"><br/>
    <input type="submit" value="Register" class="register-btn">
  </form>
  </div>
  </main>
  <footer id="footer">
    <div class="inner">
    <ul class="footer-list">
    <li><a href="./contact.php">Contact</a></li>
    <li><a href="./about-us.php">About us</a></li>
    </ul>
    </div>
  </footer>
  
</body>
</html>