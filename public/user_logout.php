<?php
session_start();

// セッション変数を削除
$_SESSION = array();

// セッションを破棄
session_destroy();

// ログアウト後にリダイレクト
header('Location: index.php');
exit();
?>