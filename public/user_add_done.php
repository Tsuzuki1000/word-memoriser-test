<body>
  <?php

  require_once('../app/config.php');

  try {

     //pdoインスタンス//
    $pdo = new PDO($dsn, $user, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $nickname = h($nickname);
    $email = h($email);
    $pass = h($pass);


    //データベースのクエリはpasswordです。
    $sql = '
    INSERT INTO users(nickname, email, password)
    VALUE (:nickname, :email, :pass)
    ';

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);

    $stmt->execute();

    $pdo = NULL;

    echo "{$nickname}.さん、ようこそ";

  } catch (PDOException $e) {
    exit($e->getMessage());
  }

  

  ?>

<a href="index.php">ホームに戻る</a>

</body>