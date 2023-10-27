<?php
//session//
session_start();

session_regenerate_id(true);

if(isset($_SESSION['login']) == false) {

  echo 'ログインされていません';

  echo '<a href="index.html">ログイン画面へ</a>';

  exit();
}

//session変数に入っているニックネームとIDを変数に入れる//
$nickname = $_SESSION['user_nickname'];

$id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <meta name="description" content="<?php echo $description; ?>">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
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
        <?php echo "WELCOME!! {$nickname}-san"?>
      <a href="user_logout.php">Logout</a>
      </div>
    </div>
  </header>
  <div id="hero">
  <img src="../img/00034-1912969846.png" alt="#">
  </div>
  <main>
    <div class="wrapper">
    <h2 class="section-title">Section select</h2>
      <div class="container">
      <div class="list-of-words section">
        <img src="../img/00016-4009279661.png" alt="#">
        <div class="section-desc">
        <p>The words you added is here.</p>
        </div>
      <a href="word_list.php" class="btn">List of words</a>
      </div>
      <div class="word-random section">
        <img src="../img/00017-359623082.png" alt="#">
        <div class="section-desc">
        <p>You can refer the words you added randomly.</p>
          </div>
      <a href="word_random.php" class="btn">Random words</a>
      </div>
      <div class="learn-on-youtube section">
        <img src="../img/00019-2196945916.png" alt="#">
        <div class="section-desc">
        <p>You can pick up new words from news article.</p>
        <p class="coming-soon">Coming soon</p>
          </div>
      <a href="word_random.php" class="btn">Random words</a>
      </div>
      </div>
    </div>
  </main>
  <footer id="footer">
    <div class="footer-inner">
    <ul class="footer-list">
    <li><a href="./contact.php">Contact</a></li>
    <li><a href="./about-us.php">About us</a></li>
    </ul>
    </div>
  </footer>
</body>
</html>