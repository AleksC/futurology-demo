<?php 
	require_once 'core/init.php';
	$db = Connect::getInstance();
	
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
				
				if(isset($_SESSION['status']) && $_SESSION['status'] == 'admin') {
					if(isset($_GET['article_id'])) {
						$id = ($_GET['article_id']);
						Comment::removeAllComments($id);
						Article::remove($id);
						header("Location: " . $_SERVER['HTTP_REFERER']);
					} else {
						echo "<h1 style='color: red;'> Article not found! </h1>";
					}
					
				} else {
					echo "<h1 style='color: red;'> You do not have sufficient admin privileges!</h1>";
				}
			?>
	  </div>
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