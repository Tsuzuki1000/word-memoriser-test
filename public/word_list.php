<?php


require_once('../app/config.php');

try {

  $pdo = new PDO($dsn, $user, $password);

  session_start();
  session_regenerate_id(true);
if(isset($_SESSION['login']) == false) {
  echo 'ログインされていません';
  echo '<a href="index.php">ログイン画面へ</a>';
  exit();
}
  $numberCombinededUserid = $_SESSION['user_id'];
  $nickname = $_SESSION['user_nickname'];


  //wordsテーブルからすべてのカラムを取得
  $words = 'SELECT id, word, means, example_word FROM words WHERE numberCombinededUserid =:numberCombinededUserid';

  $words = $pdo->prepare($words);

  $words->bindValue(':numberCombinededUserid', $numberCombinededUserid,  PDO::PARAM_INT);

  $words->execute();


  //sqlを実行する

  //配列を取得
  $words = $words->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
  exit($e->getMessage());
}

?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/word_list.css">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <meta name="description" content="<?php echo $description; ?>">
  <title><?php echo $title; ?></title>
  <script src="js/main.js"></script>
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
        echo '<a href="dashboard.php"><img src="img/無題2532_20230831013738.png" alt="#">';
        } else {
          echo '<a href="index.php"><img src="img/無題2532_20230831013738.png" alt="#"></a>';
        }
        ?>
      </h1>
      <div class="nav">
        <?php echo "WELCOME!! {$nickname}-san"?>
      <a href="user_logout.php">Logout</a>
      </div>
    </div>
  </header>
  <main>
    <div class="wrapper">
    <h2>List of words</h2>
    <div class="word-add">
    <a href="word_create.php" class="word-add-btn">Add</a>
    </div>
    <table>
      <tr>
        <th class="word">Word</th>
        <th class="means">Means</th>
        <th class="ex-word">Example</th>
        <th class="edit">Edit</th>
        <th class="delete">Delete</th>
      </tr>
      <!-- phpのforeachを使う -->

      <?php
      //削除と編集をpostで送信したいのですが、どうすればいいですか？？//
      foreach ($words as $word) {
        echo "<tr>";
        echo "<td>{$word['word']}</td>";
        echo "<td>{$word['means']}</td>";
        echo "<td>{$word['example_word']}</td>";
        echo "<td>";
        // 編集フォームを追加
        echo "<form action='word_edit.php' method='post'>";
        echo "<input type='hidden' name='id' value='{$word['id']}'>";
        echo "<button type='submit'>Edit</button>";
        echo "</form>";
        echo "</td>";
        echo "<td>";
        // 削除フォームを追加
        echo "<form action='word_delete_check.php' method='post'>";
        echo "<input type='hidden' name='id' value='{$word['id']}'>";
        echo "<button type='submit' name='submit'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
      }
          ?>
    </table>
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