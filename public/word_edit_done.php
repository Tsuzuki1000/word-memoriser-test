<?php


require_once('../app/config.php');

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false) {
  echo 'loginされていません。';
  echo '<a href="index.php">ログイン画面へ</a>';
  exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {

    $id = $_POST['id'];
    $word = $_POST['word'];
    $means = $_POST['means'];
    $example_word = $_POST['example_word'];

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = '
      UPDATE words SET word=:word, means=:means, example_word=:example_word WHERE id=:id
    ';

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':word', $word, PDO::PARAM_STR);
    $stmt->bindValue(':means', $means, PDO::PARAM_STR);
    $stmt->bindValue(':example_word', $example_word, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    $pdo= NULL;




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
  <link rel="stylesheet" href="../css/word_edit_done.css">
  <meta name="description" content="<?php echo $description; ?>">
  <title><?php echo $title; ?></title>
</head>
<body>
  <div class="wrapper">
    <div class="comment">Edit completed</div>
    <div class="go-back">
    <a href="word_list.php">Go to WordList.</a>
    </div>
  </div>
  
</body>
</html>