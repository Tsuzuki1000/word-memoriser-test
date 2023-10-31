<?php

//configを呼び出す//
require_once('../app/config.php');

//session保持確認//
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false) {
  echo 'loginされていません。';
  echo '<a href="index.html">ログイン画面へ</a>';
  exit();
}

//submitかつhtttpリクエストがpostの場合try//
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    //前のページから飛んできたidを$idに代入//
    $id = $_POST['id'];

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = '
    SELECT word, means, example_word FROM words WHERE id=:id;
    ';

    //プリペアーメソッド//
    $stmt = $pdo->prepare($sql);

    $stmt->bindvalue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $word = $rec['word'];
    $means = $rec['means'];
    $word_example = $rec['example_word'];

    //接続終了
    $pdo = null;



  } catch (PDOException $e) {
    exit($e->getMessage());
  }
}

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
  <link rel="stylesheet" href="../css/word_delete.css">
  <meta name="description" content="<?php echo $description; ?>">
  <title><?php echo $title; ?></title>
</head>
<body>
  <div class="wrapper">
    <div class="word"><span>Word</span>:<?php echo $word; ?></div>
    <div class="means"><span>Means</span>:<?php echo $means; ?></div>
    <div class="example_word"><span>Example_word</span>:<?php echo $word_example; ?></div>
    <div class="consent">Are you sure these are deleted??</div>
    <div class="btn">
      <div class="yes-btn">
          <form action="word_delete_done.php" method="post">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <button type="submit" class="yes-btn-form">Yes.(Delete completely.)</button>
          </form>
      </div>
      <div class="no-btn"><a href="word_list.php">NO.(Going back to Word list.)</a></div>
    </div>
  </div>
  
</body>
</html>


