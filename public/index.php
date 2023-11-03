
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
  <meta name="description" content="<?php echo $description; ?>">
  <link rel="stylesheet" href="css/index.css">
  <script src="js/main.js"></script>
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
        echo '<a href="dashboard.php"><img src="img/無題2532_20230831013738.png" alt="#">';
        } else {
          echo '<a href="index.php"><img src="img/無題2532_20230831013738.png" alt="#"></a>';
        }
        ?>
      </h1>
    </div>
  </header>
  <div id="hero">
    <img src="img/00036-1122313238.png" alt="#">
  </div>
  <main>
    <div class="wrapper">
      <div class="flex">
        <div class="explain">
          <h2>Learn English in English</h2>
          <p>Hello there. This is Tom and I'm the owner of this site.</p>
        <p>This site is for Japanese people who want to study English.</p>
        <p>All pages are English so upper middle level is needed.</p>
        <p>Learning English in English is very efficient if you get used to English to some extend.</p>
        <p>Let me explain what this site is for and how to use this.</p>
        <p>Normally, people usually memorise words by a book and if you got the words you don't memorise, check mark and once memorise it, you would delete the mark. </p>
        <p>I'm going to offer the same function. </p>
        <p>You can add a word you don't memorise and if you memorised it, you can delete it.</p>
        <p>Also, I'm going to offer the function which give you a random word you want to memorise.</p>
        <p>It is simple, isn't it??</p>
        <p>So, let's go to the journey! you would find register form on the right side of this page and if you already have your own account, login form  is also there.</p>
        </div>
        <div class="register-and-login">
          <div class="register">
            <h2 class="register-title">Register</h2>
            <p>If you don't have an account, click below.</p>
            <a href="user_add.php" class="register">Click here</a>
          </div>
          <div class="login">
            <h2 class="login-title">Login</h2>
            <p>If you already have an account, click below.</p>
            <a href="user_login.php" class="login">Click here</a>
          </div>
        </div>
      </div>
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