<?php

//設定PHP//

require_once('../app/config.php');

try {

  if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pdo = new PDO($dsn, $user, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //値を変数に入れる//
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $email = h($email);
    $pass = h($pass);

    //$pass = password_hash($pass, PASSWORD_ARGON2I);

    //sqlの queryはpassではなくpasswordです。//

    $sql = '
    SELECT id, password, nickname FROM users WHERE email =:email 
    ';

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    $stmt->execute();

    //以下の変数には入力したパスワードを基準にした、usersテーブルのid password nicknameが入っている。//
    $userFromDatabase = $stmt->fetch();

    

    $pdo = NULL;

    if (password_verify($pass, $userFromDatabase['password'])) {
      session_start();
      $_SESSION['login'] = 1;
      $_SESSION['user_id'] = $userFromDatabase['id'];
      $_SESSION['user_nickname'] = $userFromDatabase['nickname'];
      header('Location: dashboard.php');
      exit();
    } else {
      echo 'emailかpasswordが間違っています。<br/>';
      echo '<a href="user_login.php">戻る</a>';
    }

    //fetch assciateがfalseなら戻る、trueならdashboardに移動//


    //ここから または、で戻るボタン（このページのurl）//

  } else {
    exit('Invaild Request');
  }
  

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
</head>
<body>
  
</body>
</html>
