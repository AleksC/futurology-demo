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
      <div id="content">
        <div class='post'>

		<?php 
			if(($_POST['title']) !=null && ($_POST['intro']) !=null && ($_POST['content']) !=null) {
				if($_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/png') {
					$imageName = $_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $imageName);
					$title = $_POST['title'];
					$intro = $_POST['intro'];
					$content = $_POST['content'];
					$category = $_POST['category'];
					
					$stmt = new Article;		
					$stmt->title = $title;
					$stmt->intro = $intro;
					$stmt->content = $content;
					$stmt->category = $category;
					$stmt->image = $imageName;
					if($stmt->insert() == null) {
						echo "</br>New article successfully added!</br></br>";
						echo "<a href='addNews.php'>Insert new article?</a></br>";
					} else {
						$_SESSION['articleStatus'] = '';
						$_SESSION['title'] = $_POST['title'];
						$_SESSION['intro'] = $_POST['intro'];
						$_SESSION['content'] = $_POST['content'];
						$_SESSION['category'] = $_POST['category'];
						echo "<p>News upload failed!</p>";
						echo "<a href='adNews.php'>Try again?</a>";						
					}

					
				}
					
			} else {
				$_SESSION['articleStatus'] = undefined;
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['intro'] = $_POST['intro'];
				$_SESSION['content'] = $_POST['content'];
				$_SESSION['category'] = $_POST['category'];
				header("Location: " . $_SERVER['HTTP_REFERER']);
			}
		?>		
		
		</div>
	  </div>
      <div id="sidebar">
        <ul>
			<li><?php include "widgets/sidebar.php"; ?></li>
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