<?php 
	require_once 'core/init.php';
	$db = Connect::getInstance();
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$email = $_POST['email'];
	//Checks if user already exists
	$res = $db->prepare("SELECT * FROM users WHERE username = ?");
	$res->bindParam(1, $username);
	$res->execute();
	$regCheck = $res->fetch(PDO::FETCH_ASSOC);
?>
	

<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8" />
<title>Futurology</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
  <div id="wrapper2">
    <div id="header">
      <div id="logo">
        <h1><a href="index.php">futurology</a></h1>
      </div>
      <div id="menu">
        <ul>
          <li><a href="index.php">Latest News</a></li>
          <li><a href="science.php">Science</a></li>
          <li><a href="technology.php">Technology</a></li>
          <li><a href="medicine.php">Medicine</a></li>
        </ul>
      </div>
    </div>
    <div id="page">
      <div id="content">
		<?php 	
		
		if($regCheck['username'] == $username) {
			$_SESSION['regStatus'] = false;
			header("Location: " . $_SERVER['HTTP_REFERER']);
			
		} else {
			$stmt = new User;
			$stmt->username = $username;
			$stmt->password = $password;
			$stmt->f_name = $f_name;
			$stmt->l_name = $l_name;
			$stmt->email = $email;
			$stmt->insert();
			
			echo "<h2 style='padding: 100px 100px 50px 100px;'>Registation successful!</h2>";
			echo "<a href='index.php'>Click here to go back to the main page.</a></div>";
		}
		?>
		</div>
      <div id="sidebar">
        <ul>
          <li>
            <h3>Latest News</h3>
			<?php include "widgets/latestNewsW.php"; ?>
          </li>
        </ul>
      </div>

        <div style="clear: both;">&nbsp;</div>
      
    </div>
  </div>
  <div id="footer">
    <p>(c) 2016 Futurology by Aleksandar Cosic</p>
  </div>
</div>
</body>
</html>