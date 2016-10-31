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
		<?php 
				
				if(isset($_SESSION['status']) && $_SESSION['status'] == 'admin') {
				
		?>
		  <div id="content">
			<div class="post">
				<br><br><br>
				<?php if(isset($_SESSION['articleStatus'])) {echo "<p style='color: red'> Please enter the proper data!</p><br><br><br>"; $_SESSION['articleStatus'] = null;}?>
				<form method="POST" action="articleAdded.php" enctype="multipart/form-data">
				<input type="text" name="title" placeholder="Title" value="<?php if(isset($_SESSION['title'])) {echo $_SESSION['title'];$_SESSION['title']=null;}; ?>"/><br><br><br>
				<label>Category: </label>
				<select name="category">
					<option value="science"/>Science</option>
					<option value="medicine"/>Medicine</option>
					<option value="technology"/>Technology</option>
				</select><br><br><br>
				<label>Image: </label>
				<input type="file" name="image"><br><br>
				<textarea name="intro" rows="5" cols="75" placeholder="Intro" 
				<?php if(isset($_SESSION['intro'])) {echo ">" . $_SESSION['intro'];$_SESSION['intro']=null;} else echo ">"?></textarea><br><br><br>
				<textarea name="content" rows="50" cols="75" placeholder="Content" <?php if(isset($_SESSION['content'])) {echo ">" . $_SESSION['content'];$_SESSION['content']=null;} else echo ">"?></textarea><br><br><br>
				<input type="submit" name="submit" value="Submit New Article" style="float:right"/>
			</div>
		</div>
		  
		<?php
		} else {
			echo "<div id='content'><div class='post'>";
			echo "<h1 style='color: red;'> You do not have sufficient admin privileges!</h1>";
			echo "</div></div>";
		}
		?>
		  
      <div id="sidebar">
                <ul>
          <li>
			<?php include "widgets/sidebar.php"; ?>
          </li>
          <li>
            <h3>Latest News</h3>
			<?php include "widgets/latestNewsW.php"; ?>
          </li>
        </ul>
      </div>

        <div style="clear: both;">&nbsp;</div>
      
    
  </div>
  <div id="footer">
    <p>(c) 2016 Futurology by Aleksandar Cosic</p>
  </div>
</div>
</div>
</body>
</html>