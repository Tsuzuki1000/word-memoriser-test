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

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = '
      DELETE FROM words WHERE id = :id
    ';

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    header("Location: word_list.php");
    exit();



  } catch (PDOException $e) {
    exit($e->getMessage());
  }
}


?>


