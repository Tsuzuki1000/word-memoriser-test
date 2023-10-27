<?php

//無害化する関数

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//tokenの文字列を加工する関数

function createToken() {
  if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bites(32));
  }
}

//tokenがないなら無効化する関数

function validateToken() {
  if (
    empty($_SESSION['token']) || $_SESSION['token'] !== filter_input(INPUT_POST, 'token')
  ) {
    exit('Invalidate post request');
  }
}

//タイトル//

$title = "word-memoriser";

$title = h($title);

//ディスクリプション//

$description = "英単語暗記サイトです。英語で英語を学びましょう";

$description = h($description);



