<?php
session_start();


?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo $description; ?>">
  <link rel="stylesheet" href="/css/index.css">
  <script src="/js/main.js"></script>
  <title><?php echo $title; ?></title>
</head>
<body>

<header id="header">
    <div class="inner">
      <h1 class="site-title">
      <?php
        if(isset($_SESSION['login']) == true) {
        echo '<a href="dashboard.php"><img src="../img/無題2532_20230831013738.png" alt="#"></a>';
        } else {
          echo '<a href="index.php"><img src="../img/無題2532_20230831013738.png" alt="#"></a>';
        }
        ?>
      </h1>
    </div>
  </header>
  <div id="hero">
    <img src="../img/00036-1122313238.png" alt="#">
  </div>
  <main>
    <div class="wrapper">
      <div class="japanese">
      このウェブサイトは、英単語を効果的に覚えるために設計されたプラットフォームです。
英語学習者や語彙を拡充したい方々を対象に、豊富な学習リソースを提供しています。
サイトはすべて英語でできており、海外に留学に行くと、英語で英語を学ぶという機会に出くわします。現在からなれておくと吉です。
現在は単語帳とフラッシュカードシステムだけですが、YouTubeの英語のニュースを使ったクイズシステム、コミュニティづくりなども計画しております。さあ一緒に英語学習の旅にでかけましょう。
      </div>

      <div class="english">
This website is designed as a platform for effectively learning English vocabulary words. It caters to English learners and individuals looking to expand their vocabulary.

The site is entirely in English, providing an opportunity for users to immerse themselves in the language, which can be beneficial if they plan to study abroad or communicate in English-speaking environments. Starting now will be advantageous.

Currently, the website offers vocabulary lists and a flashcard system. However, we have plans to introduce additional features, including a quiz system using English news from YouTube and community-building initiatives.

Join us in this journey to enhance your English vocabulary and language skills.
      </div>


    </div>
  </main>
  <footer id="footer">
    <div class="inner">
    <ul class="footer-list">
    <li><a href="./contact.php">Contact</a></li>
    <li><a href="./about-us.php">About us</a></li>
    </ul>
    </div>
  </footer>


  
</body>
</html>