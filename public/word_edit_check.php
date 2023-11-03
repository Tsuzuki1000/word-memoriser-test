<?php

require_once('../app/config.php');

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false) {
  echo 'loginされていません。';
  echo '<a href="index.php">ログイン画面へ</a>';
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $id = $_POST['id'];
  $word = $_POST['word'];
  $means = $_POST['means'];
  $example_word = $_POST['example_word'];

  $id = h($id);
  $word = h($word);
  $means = h($means);
  $example_word = h($example_word);


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
  <link rel="stylesheet" href="css/word_edit_check.css">
  <meta name="description" content="<?php echo $description; ?>">
  <title><?php echo $title; ?></title>
</head>
<body>
  <div class="wrapper">
    <div class="word"><?php echo $word; ?></div>
    <div class="means"><?php echo $means; ?></div>
    <div class="example_word"><?php echo $example_word; ?></div>
    <div class="consent">Are you ok with being edited like these?</div>
  <form action="word_edit_done.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="word" value="<?php echo $word; ?>">
    <input type="hidden" name="means" value="<?php echo $means; ?>">
    <input type="hidden" name="example_word" value="<?php echo $example_word; ?>">
    <div class="btn">
    <button type="submit" class="yes-btn">OK.(Edit Completely.)</button>
    <a href="word_list.php" class="no-btn">NO.(Going back to Word list.)</a>
    </div>
  </form>
  </div>
  
</body>
</html>