<?php

require_once('../app/config.php');


if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  try {


    $pdo = new PDO($dsn, $user, $password);

    $sql = '

    INSERT INTO words (word, means, example_word, numberCombinededUserid)
    VALUE(:word, :means, :example_word, :numberCombinededUserid)
    ';

    $stmt = $pdo->prepare($sql);

    $stmt->bindvalue(':word', $_POST['word'], PDO::PARAM_STR);
    $stmt->bindvalue(':means', $_POST['means'], PDO::PARAM_STR);
    $stmt->bindvalue(':example_word', $_POST['example_word'], PDO::PARAM_STR);
    $stmt->bindvalue(':numberCombinededUserid', $_POST['numberCombinededUserid'], PDO::PARAM_INT);

    $stmt->execute();

    header('location: word_list.php');
  
  } catch (PDOException $e) {
    exit($e->getMessage());
  }
}



?>

<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false) {
  echo 'ログインされていません';
  echo '<a href="index.html">ログイン画面へ</a>';
  exit();
}
//refer user_login_check line.63//
$numberCombinededUserid = $_SESSION['user_id'] ;
$nickname = $_SESSION['user_nickname'];
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
  <link rel="stylesheet" href="../css/word_create.css">
  <script src="../js/main.js"></script>
  <title>word</title>
</head>
<body>
<div id="loading-screen">
  <div class="loader"></div>
</div>
<header>
  <div class="inner">
      <h1 class="site-title">
        <a href="dashboard.php">
          <img src="../img/無題2532_20230831013738.png" alt="#">
        </a>
      </h1>
      <div class="nav">
        <?php echo "WELCOME!! {$nickname}-san"?>
      <a href="user_logout.php">Logout</a>
      </div>
    </div>
  </header>
  <main>
    <div id="hero">
      <img src="../img/00038-1122313240.png" alt="#">
    </div>
    <div class="wrapper">
    <form action="" method="post">
  <div class="insert-form">
  <label for="word">Word</label>
  <input type="text" name="word" maxlength="60" required>
  <label for="means">Means</label>
  <input type="text" name="means" maxlength="60" required>
  <label for="example_word">Sentence</label>
  <input type="text" name="example_word" maxlength="60" required>
  <input type="hidden" name="numberCombinededUserid" value="<?php echo  $numberCombinededUserid; ?>">
  </div>
  <div class="btn-cover">
  <button type="submit" name="submit" value="insert" class="btn">Click Here</button>
  </div>
</form>
    </div>
  </main>
  <footer id="footer">
    <div class="inner">
    <ul class="footer-list">
      <li><a href="#">Contact</a></li>
      <li><a href="#">About us</a></li>
      <li><a href="#">Our website</a></li>
    </ul>
    </div>
  </footer>
</body>
</html>