


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/user_add_login.css">
  <script src="../js/main.js"></script>
  <title>Document</title>
</head>
<body>
<div id="loading-screen">
  <div class="loader"></div>
</div>
<header id="header">
    <div class="inner">
      <h1 class="site-title">
        <a href="index.php">
          <img src="../img/無題2532_20230831013738.png" alt="#">
        </a>
      </h1>
    </div>
  </header>
  <main>
    <div id="hero">
      <img src="../img/00045-2341921376.png" alt="#">
    </div>
  <div class="wrapper">
  <h2 class="register-title">login</h2>
  <form action="user_login_check.php" method="post" class="register-form">
    nickname<br/>
    <input type="text" name="nickname" style="width: 200px"><br/>
    email</br>
    <input type="text" name="email" style="width:200px"><br/>
    password</br>
    <input type="text" name="pass" style="width: 200px"><br/>
    <input type="submit" value="Login" class="register-btn">
  </form>
  </div>
  </main>
  <footer id="footer">
    <div class="inner">
    <ul class="footer-list">
      <li><a href="#">Contact</a></li>
      <li><a href="#">About us</a></li>
      <li><a href="#">Our website</a></li>
    </ul>
    </div>
  </footer>
  
</body>
</html>