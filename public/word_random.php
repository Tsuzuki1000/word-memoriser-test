<?php

require_once('../app/config.php');




try {

  session_start();

//refer user_login_check line.63//
$numberCombinededUserid = $_SESSION['user_id'] ;
$nickname = $_SESSION['user_nickname'];


  $pdo = new PDO($dsn, $user, $password);


  $wordAndMeans = 'SELECT word, means FROM words WHERE numberCombinededUserid = :numberCombinededUserid ORDER BY RAND() LIMIT 1';

  $wordAndMeans = $pdo->prepare($wordAndMeans);

  $wordAndMeans->bindValue(':numberCombinededUserid', $numberCombinededUserid,  PDO::PARAM_INT);

  $wordAndMeans->execute();

  $wordAndMeans = $wordAndMeans->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {

  exit($e->getMessage());
  
}



?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/random.css">
  <meta name="description" content="<?php echo $description; ?>">
  <title><?php echo $title; ?></title>
  <script src="../js/main.js"></script>
</head>
<body>
<div id="loading-screen">
  <div class="loader"></div>
</div>
    <header>
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
        <div class="nav">
          "WELCOME!! <?php echo $nickname; ?>-san"
        <a href="user_logout.php">Logout</a>
        </div>
      </div>
    </header>
    <main>
      <div id="hero">
        <img src="../img/00037-1122313239.png" alt="#">
      </div>
      <div class="wrapper">
        <h2 id="quiz-header">Quiz</h2>
        <div class="quiz">
          <div class="word">
            <p><?php echo $wordAndMeans[0]['word']; ?></p>
            <div class="overlay-word"><p>word</p></div>
          </div>
          <div class="means">
            <p><?php echo $wordAndMeans[0]['means']; ?></p>
            <div class="overlay-means"><p>means</p></div>
          </div>
        </div>
        <div class="btn">
        <form action="word_random.php" type="post" class="random-btn">
            <input type="hidden" value="<?php  echo '$numberCombinededUserid'; ?>">
            <button type="submit" class="click">Click here</button>
          </form>
          <div class="random-btn-for-word">
            word
          </div>
          <div class="random-btn-for-means">means</div>
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



