<?php
  session_start(); 
  if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
      echo '<script language="javascript">';
      echo 'alert("Порожне поле!")';
      echo '</script>';
    } else {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $conn = mysqli_connect("localhost", "root", "", "Webphp2");
      $query = "SELECT username, password FROM login WHERE username=? AND password=? LIMIT 1";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      $stmt->bind_result($username, $password);
      $stmt->store_result();
      if($stmt->fetch()) {
        $_SESSION['login_user'] = $username; 
        header("location: profile.php"); 
      } else {
        echo '<script language="javascript">';
        echo 'alert("Логін користувача або пароль невірні!")';
        echo '</script>';
      }
      mysqli_close($conn); 
    }
  }
  if (isset($_POST['signup'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
      echo '<script language="javascript">';
      echo 'alert("Порожне поле!")';
      echo '</script>';
    } else {
      $exist = FALSE;
      $username = $_POST['username'];
      $password = $_POST['password'];
      $type = 'user';
      $conn = mysqli_connect("localhost", "root", "", "Webphp2");
      $user_check_query = "SELECT * FROM login WHERE username='$username' LIMIT 1";
      $result = mysqli_query($conn, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      if ($user) { 
        if ($user['username'] === $username) {
          $exist = TRUE;
          echo '<script language="javascript">';
          echo 'alert("Цей логін вже використовується!")';
          echo '</script>';
        }
      } 
      if($exist === FALSE) {
        $query = "INSERT INTO login (username,password) VALUES ('$username',
          '$password')"; 
        if (mysqli_query($conn, $query)) {
          echo '<script language="javascript">';
          echo 'alert("Ваша реєстрація завершена!")';
          echo '</script>';
        } 
      }
      mysqli_close($conn); 
    }
  }
?>