<?php 
	require_once 'core/init.php';
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
      <div id="content"><legend style="border: 1px solid orange; margin: 20px auto; padding:20px; width: 100%;">Please enter the required data:
			<form action='regSuccess.php' method="POST" style="margin: 0 auto; padding: 20px;">
				<?php
					if(isset($_SESSION['regStatus'])){
						echo "<p style='color: red';>Username already in use!</p>";
						$_SESSION['regStatus'] = null;
					} 	
				?>
				
				<label>Username:</br>
				<input type="text" name="username" required></label></br>
				<label>Password</br>
				<input type="password" name="password" required></label></br>
				<label>First name:</br>
				<input type="text" name="f_name" required></label></br>
				<label>Last Name</br>
				<input type="text" name="l_name" required></label></br>
				<label>E-mail</br>
				<input type="text" name="email" required></label></br></br>
				<input type="submit" value="Register">
			</form></legend>
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