<?php

require('../app/config.php');

try {

  //サーバーがポストの場合に実行//
  if($_SERVER['REQUEST_METHOD'] === 'POST') {

    


    //変数に送られてきた値を代入//
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    // 無害化した後再び変数に代入 //
    $nickname = h($nickname);
    $email = h($email);
    $pass = h($pass);
    $pass2 = h($pass2);


    //入力の有無やパスワードの一致を確認//
    if($nickname == '') {
      echo 'ニックネームが入力されていません。';
    } else {
      echo 'ニックネーム';
      echo $nickname;
      echo '<br/>';
    }

    if($email == '') {
      echo 'emailが入力されていません。';
    } else {
      echo 'メールアドレス<br/>';
      echo $email;
      
      echo '<br/>';
    }

    if ($pass == '') {
      echo 'パスワードが入力されていません。<br/>';
    }

    if ($pass != $pass2) {
      echo 'パスワードが一致しません。<br/>';
    }

    if ($nickname ==''||$email == '' ||$pass != $pass2 ) {
      echo '<form>';
      echo '<input type="button" onclick="history.back()" value="戻る">';
      echo '</form>';
    } else {
      //ここで次に進む//
      //passwordをhash化//
      $pass = password_hash($pass, PASSWORD_ARGON2I);
      echo '<form action="user_add_done.php" method="post">';
      echo '<input type="hidden" name="nickname" value="'.$nickname.'">';
      echo '<input type="hidden" name="email" value="'.$email.'">';
      echo '<input type="hidden" name="pass" value="'.$pass.'">';
      echo '<input type="button" onclick="history.back()" value="戻る">';
      echo '<input type="submit" value="OK">';
      echo '</form>';
    }

  } else {
    exit('Invaild Request');
  }
  

} catch (PDOException $e) {
  exit($e->getMessage());
}

?>


  
  
  
  
  


