<?php

session_start(); 

session_regenerate_id(true);


?>

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
  <link rel="stylesheet" href="../css/index.css">
  <script src="../js/main.js"></script>
  <title><?php echo $title; ?></title>
</head>
<body>
<header id="header">
    <div class="inner">
      <h1 class="site-title">
      <?php
        if(isset($_SESSION['login']) == true) {
        echo '<a href="dashboard.php"><img src="../img/無題2532_20230831013738.png" alt="#"></a>';
        } else {
          echo '<a href="index.php"><img src="../img/無題2532_20230831013738.png" alt="#"></a>';
        }
        ?>
      </h1>
    </div>
  </header>
  <div id="hero">
    <img src="../img/00036-1122313238.png" alt="#">
  </div>
  <main>
    <div class="wrapper">
      <div class="contact">
      <h2>現在コンタクトフォーム改修中です。</h2>
      ご連絡は以下から
      renido467@mirai.re
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