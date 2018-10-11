<?php
  include('login.php'); 
  if(isset($_SESSION['login_user'])) {
    header("location: profile.php"); 
  }
?> 

<!DOCTYPE html>
<html>
  <head>
    <title>Сторінка реєстрації</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <header class="headeri">
    <center>
      <label class="titletexti">Сторінка реєстраціїї</label>
    </center>
  </header>
  <body>
    <form id="login" class="containeri" action="" method="post">
      <center class="bg">
        <div>
          <label class="maintextl">Логін:</label>
        </div>
        <div>
          <input class="elementl" id="name" "type="text" name="username">
        </div>
        <div>
          <label class="maintextp">Пароль:</label>
        </div>
        <div>
          <input class="elementp" id="password" type="password" name="password">
        </div>
        <div>
          <button class="elementy" type="submit" name="submit">Увійти</button>
          <button class="elementz" type="submit" name="signup">Зареєструватися</button>
        </div>
      </center>
    </form>
  </body>
</html>