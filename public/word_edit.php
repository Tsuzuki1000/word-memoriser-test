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
  try {

  $id = $_POST['id'];

  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = '
  SELECT word, means, example_word FROM words WHERE id=:id
  ';

  $stmt = $pdo->prepare($sql);

  $stmt->bindvalue(':id', $id, PDO::PARAM_INT);

  $stmt->execute();

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);

  $word = $rec['word'];
  $means = $rec['means'];
  $example_word = $rec['example_word'];

  $pdo = NULL;

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
  <link rel="stylesheet" href="../css/word_edit.css">
  <meta name="description" content="<?php echo $description; ?>">
  <title><?php echo $title; ?></title>
</head>
<body>
  <div class="wrapper">
    <h2>Edit</h2>
    <form action="word_edit_check.php" method="post">
      <label for="word">Word</label>
      <input type="text" class="word" name="word" value="<?php echo $word; ?>">
      <label for="means">Means</label>
      <input type="text" class="means" name="means" value="<?php echo $means; ?>">
      <label for="Example_word">Example_word</label>
      <input type="text" class="example_word" name="example_word" value="<?php echo $example_word; ?>">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <button type="submit" class="submit">Edit</button>
    </form>
  </div>
  
</body>
</html>