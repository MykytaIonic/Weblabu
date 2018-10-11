<?php
	include('session.php');
	include('change.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Сторінка адміна</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<header class="headerp">
	    <center>
	    	<table>
	    		<tr>
	    			<td>
	    				<label class="titletextp">Сторінка адміна  </label>
	    			</td>
	    			<td>
	    				<div>
							<form id="actions"  action="" method="post">
			                    <button type="submit" class="elementd" name="backtoprofile" id="backtoprofile">Сторінка профілю</button>
			                    <button type="submit" class="elementd" name="deleteprofile" id="deleteprofile">Видалити профіль</button>
			                    <button type="submit" class="elementd" name="logout" id="logout">Вийти</button>
			                </form>
				        </div>
	    			</td>
	    			<td>
	    				<label class="titletextpu">  <?php echo $_SESSION['login_user']; ?></label>
	    			</td>
	    		</tr>
	    	</table>
	    </center>
  	</header>
	<body>
		<div class="container">
			<center class="bga">
				<div><label class="maintext">Користувачі</div>
				<table class='maintext' border=1>
			        <?php
			        	$conn = mysqli_connect("localhost", "root", "", "Webphp2");
			        	$query = "SELECT * FROM login";
			            $rows = mysqli_query($conn, $query);
			            while($row = mysqli_fetch_assoc($rows)) {
			              	echo "<tr>";
			              		if(is_null($row['avatar']) || ($row['avatar'] === "")) {
	                            		echo '<td><img class="element" src="avatars/none.png" class="element"></td>';
			                        } else {
			                            echo '<td><img class="element" src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'"/></td>';
			                        }
				                echo "<td>";
			                		echo "<form id='delete' action='' method='post'>";
				                		if ($row['username'] === $_SESSION['login_user']) {
				                			echo "<div><label>Моя сторінка!</label></div>";
				                		} else {
				                			echo "<button class='element' type='submit' name='admindeleteuser' id='admindeleteuser' value='".$row['username']."'>Видалити</button>";
				                		}
				                	if ($row['type'] === '"admin"') {
		                				echo "Адмін";
		                			} else {
		                				/*echo "Користувач";*/
		                				echo "<label> ID: ".$row['id']."</label>";
		                			}
				                	/*echo "<label> ID: ".$row['id']."</label>";*/
			                		echo "</form>";
				                	if ($row['username'] != $_SESSION['login_user']) { 
				                		echo "<form id='username' action='' method='post'>";
		                					echo "<input class='element' id='username' type='text' name='username' value='".$row['username']."'>";
		                					echo "<button class='element' type='submit' name='adminchangeusername' id='adminchangeusername' value='".$row['username']."'>Змінити</button>";
			                			echo "</form>";
		                				echo "<form id='password' action='' method='post'>";
		                					echo "<input class='element' id='password' type='password' name='password' value='".$row['password']."'>";
		                					echo "<button class='element' type='submit' name='adminchangepassword' id='adminchangepassword' value='".$row['username']."'>Змінити</button>";
			                			echo "</form>";
			                			/*echo "<form method='POST' action='admin.php' enctype='multipart/form-data' id='avatar'>";
					                        echo "<label class='element'>Обрати файл<input type='file' id='avatar' name='avatar'></label>";
					                        echo "<button type='submit' class='element' id='adminchangeavatar' name='adminchangeavatar' value='".$row['username']."'>Змінити</button>";
					                    echo "</form>";*/
				                	}
	                			echo "</td>";
			                echo "</tr>";
			            }
			        ?>
		    	</table>
			</center>
        </div>
	</body>
</html>