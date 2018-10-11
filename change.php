<?php
  $conn = mysqli_connect("localhost", "root", "", "Webphp2");
  if (isset($_POST['changeavatar'])) {
    $avatar = $_FILES['avatar']['name'];
    $target = "avatars/".basename($avatar);
    $img_data = addslashes(file_get_contents($target));
    $sql = "UPDATE login SET avatar='$img_data' WHERE username='$login_session'";
    if (mysqli_query($conn, $sql) && move_uploaded_file($_FILES['avatar']['tmp_name'], $target)) {
      echo '<script language="javascript">';
      echo 'alert("Фото завантажено успішно!")';
      echo '</script>';
    } else {
      echo '<script language="javascript">';
      echo 'alert("Помилка завантаження фото!")';
      echo '</script>';
    }
  }
  /*if (isset($_POST['changeusername'])) { 
    if (empty($_POST['username'])) {
      echo '<script language="javascript">';
      echo 'alert("Порожне поле!")';
      echo '</script>';
    } else {
      $username = $_POST['username'];
      $sql = "UPDATE login SET username='$username' WHERE username='$login_session'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Логін змінено!")';
        echo '</script>';
        $_SESSION['login_user'] = $username;
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні логіну!")';
        echo '</script>';
      }
    }
  }*/

  /*if (isset($_POST['changeall'])) { 
      $username = $_POST['username'];
      $sql = "UPDATE login SET username='$username' WHERE username='$login_session'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Логін змінено!")';
        echo '</script>';
        $_SESSION['login_user'] = $username;
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні логіну!")';
        echo '</script>';
      }
      $password = $_POST['password'];
      $sql = "UPDATE login SET password='$password' WHERE username='$login_session'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Пароль змінено!")';
        echo '</script>';
        $_SESSION['login_user'] = $username;
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні паролю!")';
        echo '</script>';
      }
      $country = $_POST['country'];
      $sql = "UPDATE login SET country='$country' WHERE username='$login_session'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Країну змінено!")';
        echo '</script>';
        $_SESSION['login_user'] = $username;
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні країни!")';
        echo '</script>';
      }
    }*/

    if (isset($_POST['changeall'])) {
      $username = $_POST['username'];
      $sql = "UPDATE login SET username='$username' WHERE username='$login_session'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Дані змінено!")';
        echo '</script>';
        $_SESSION['login_user'] = $username;
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні логіну!")';
        echo '</script>';
      }
      $password = $_POST['password'];
      $sql = "UPDATE login SET password='$password' WHERE username='$login_session'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        /*echo 'alert("Пароль змінено!")';*/
        echo '</script>';
        $_SESSION['login_user'] = $username;
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні паролю!")';
        echo '</script>';
      }
      $country = $_POST['country'];
      $sql = "UPDATE login SET country='$country' WHERE username='$login_session'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
       /* echo 'alert("Країну змінено!")';*/
        echo '</script>';
        $_SESSION['login_user'] = $username;
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні країни!")';
        echo '</script>';
      }
  }


  /*if (isset($_POST['changepassword'])) { 
    if (empty($_POST['password'])) {
      echo '<script language="javascript">';
      echo 'alert("Порожне поле!")';
      echo '</script>';
    } else {
      $password = $_POST['password'];
      $sql = "UPDATE login SET password='$password' WHERE username='$login_session'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Пароль змінено успішно!")';
        echo '</script>';
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні пароля!")';
        echo '</script>';
      }
    }
  }


  if (isset($_POST['changecountry'])) { 
    if (empty($_POST['country'])) {
      echo '<script language="javascript">';
      echo 'alert("Порожне поле!")';
      echo '</script>';
    } else {
      $country = $_POST['country'];
      $sql = "UPDATE login SET country='$country' WHERE username='$login_session'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Країну змінено!")';
        echo '</script>';
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні країни!")';
        echo '</script>';
      }
    }
  }*/





  if (isset($_POST['deleteprofile'])) { 
    $sql = "DELETE FROM login WHERE username='$login_session'";
    if (mysqli_query($conn, $sql)) {
      echo '<script language="javascript">';
      echo 'alert("Профіль видалено!")';
      echo '</script>';
      header("location: logout.php"); 
    } else {
      echo '<script language="javascript">';
      echo 'alert("Помилка при видаленні профілю!")';
      echo '</script>';
    }
  }
  if (isset($_POST['adminpage'])) { 
    header("location: admin.php"); 
  }
  if (isset($_POST['logout'])) { 
    header("location: logout.php"); 
  }
  if (isset($_POST['admindeleteuser'])) {
    $button_id = $_POST['admindeleteuser'];
    $sql = "DELETE FROM login WHERE username='$button_id'";
      if (mysqli_query($conn, $sql)) {
        if($button_id === $_SESSION['login_user']) {
          echo '<script language="javascript">';
            echo 'alert("Твій профіль видалено!")';
            echo '</script>';
            header("location: logout.php");
        } else {
          echo '<script language="javascript">';
            echo 'alert("Користувача видалено!")';
            echo '</script>';
        }
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при видаленні користувача!")';
        echo '</script>';
      }
  }
  if (isset($_POST['backtoprofile'])) {
    header("location: profile.php");
  }


/*ADMINCHANGE
   if (isset($_POST['adminchangeall'])) {
      $button_id = $_POST['adminchangeall'];
      $new_login = $_POST['username'];
      $sql = "UPDATE login SET username='$new_login' WHERE username='$button_id'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Логін користувача змінено!")';
        echo '</script>';
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні логіну користувача!")';
        echo '</script>';
      }
     }
      $button_id = $_POST['adminchangeall'];
      $new_password = $_POST['password'];
      $sql = "UPDATE login SET password='$new_password' WHERE username='$button-id'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Пароль змінено!")';
        echo '</script>';
        $_SESSION['login_user'] = $username;
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні паролю!")';
        echo '</script>';
      }*/
  



  if (isset($_POST['adminchangeusername'])) {
    $button_id = $_POST['adminchangeusername'];
    $new_login = $_POST['username'];
    if (empty($_POST['username'])) {
      echo '<script language="javascript">';
      echo 'alert("Порожне поле!")';
      echo '</script>';
    } else {
      $sql = "UPDATE login SET username='$new_login' WHERE username='$button_id'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Логін користувача змінено!")';
        echo '</script>';
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні логіну користувача!")';
        echo '</script>';
      }
    }
  }
  if (isset($_POST['adminchangepassword'])) {
    $button_id = $_POST['adminchangepassword'];
    $new_password = $_POST['password'];
    if (empty($_POST['password'])) {
      echo '<script language="javascript">';
      echo 'alert("Порожне поле!")';
      echo '</script>';
    } else {
      $sql = "UPDATE login SET password='$new_password' WHERE username='$button_id'";
      if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Пароль користувача змінено!")';
        echo '</script>';
      } else {
        echo '<script language="javascript">';
        echo 'alert("Помилка при зміні паролю користувача!")';
        echo '</script>';
      }
    }
  }
  
  if (isset($_POST['deleteavatar'])) { 
    $variable = NULL;
    $sql = "UPDATE login SET avatar='$variable' WHERE username='$login_session'";
    if (mysqli_query($conn, $sql)) {
      echo '<script language="javascript">';
      echo 'alert("Фото профілю видалено!")';
      echo '</script>';
    } else {
      echo '<script language="javascript">';
      echo 'alert("Помилка при видаленні профілю!")';
      echo '</script>';
    }
  }
  if (isset($_POST['admindeleteavatar'])) {
    $button_id = $_POST['admindeleteavatar'];
    $variable = NULL;
    $sql = "UPDATE login SET avatar='$variable' WHERE username='$button_id'";
    if (mysqli_query($conn, $sql)) {
      echo '<script language="javascript">';
      echo 'alert("Фото профілю користувача видалено!")';
      echo '</script>';
    } else {
      echo '<script language="javascript">';
      echo 'alert("Помилка при видаленні!")';
      echo '</script>';
    }
  }
  if (isset($_POST['adminchangeavatar'])) {
    $button_id = $_POST['adminchangeavatar'];
    $avatar = $_FILES['avatar']['name'];
    $target = "avatars/".basename($avatar);
    $img_data = addslashes(file_get_contents($target));
    $sql = "UPDATE login SET avatar='$img_data' WHERE username='$button_id'";
    if (mysqli_query($conn, $sql) && move_uploaded_file($_FILES['avatar']['tmp_name'], $target)) {
      echo '<script language="javascript">';
      echo 'alert("Фото профілю користувача завантажено!")';
      echo '</script>';
    } else {
      echo '<script language="javascript">';
      echo 'alert("Помилка при завантаженні фото профілю користувача!")';
      echo '</script>';
    }
  }
?>