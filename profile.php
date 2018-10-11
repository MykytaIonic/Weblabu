<?php
    include('session.php');
    include('change.php');
    if(!isset($_SESSION['login_user'])) {
        header("location: index.php"); 
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Сторінка профілю</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <header class="headerp">
        <center>
            <table>
                <tr>
                    <td>
                        <label class="titletextp">Сторінка профілю  </label>
                    </td>
                    <td>
                        <form id="actions"  action="" method="post">
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "Webphp2");
                            $username = $_SESSION['login_user'];
                            $query = "SELECT type FROM login WHERE username = '$username'";
                            $ses_sql = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($ses_sql);
                            $type = $row['type'];
                            if($type == '"admin"') {
                              echo "<button type='submit' class='elementd' name='adminpage' id='adminpage'>Cторінка адміна</button>";
                            }
                        ?>
                        <button type="submit" class="elementd" name="deleteprofile" id="deleteprofile">Видалити профіль</button>
                        <button type="submit" class="elementd" name="logout" id="logout">Вийти</button>
                    </form>
                    </td>
                    <td>
                        <label class="titletextpu"> <?php echo $_SESSION['login_user']; ?></label>
                    </td>
                </tr>
            </table>
        </center>
    </header>
    <body>
       <div class="containerzp">
            <center>
                <div class="bga">
                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "Webphp2");
                        $user = $_SESSION['login_user'];
                        $query = "SELECT avatar FROM login WHERE username='$user'";
                        $ses_sql = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($ses_sql);
                        if(is_null($row['avatar']) || ($row['avatar'] === "")) {
                            echo '<img src="avatars/none.png" class="element">';
                        } else {
                            echo '<img class="element" src="data:image/jpeg;base64,'.base64_encode( $row['avatar'] ).'"/>';
                        }
                    ?>
                </div>
            </center>
        </div>
            <div class="containerp">
                <div class="bga">
                    <form action="" method="post">
                        <div><label class="maintext">Логін:</label></div>
                        <input class="element" id="username" type="text" name="username">
                    <!--</form>-->
                   <!-- <form id="password" action="" method="post">-->
                        <div><label class="maintext">Пароль:</label></div>
                        <input class="element" id="password" type="password" name="password">
                        <!--<button class="element" id="changepassword" name="changepassword">Змінити</button>-->
                    <!--</form>-->
                     <!--<form id="country" action="" method="post">-->
                        <div><label class="maintext">Країна:</label></div>
                        <input class="element" id="country" type="text" name="country">
                        <!--<button class="element" id="changecountry" name="changecountry">Змінити</button>-->
                        <button class="element" id="changeall" name="changeall">Змінити</button>
                    </form>
            </div>
            <div class="containermz">
                    <form method="POST" action="profile.php" enctype="multipart/form-data" id='avatar'>
                        <button type="submit" class="element" id="deleteavatar" name="deleteavatar">Видалити</button>
                        <label class="element">Обрати файл
                            <input type="file" id="avatar" name="avatar">
                        </label>
                        <button type="submit" class="element" id="changeavatar" name="changeavatar">Змінити</button>
                    </form>
                </div>
            </div>
    </body>
</html>