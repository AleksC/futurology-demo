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
        
		<?php
			$notFound= "<h1 style='margin: 100px; color:red'>Article not found!</h1>";
			if(isset($_GET['id'])) {
				$id = intval(trim($_GET['id']));
				if(!empty($id)) {
					$article = Article::get($id);
					$_SESSION['article_id'] = $id;
					if($article) { 
						$article->render();
						echo "<h3 id='comments'><em>Comments</em></h3>";	
						if(isset($_SESSION['username'])){
				
				?>
				
				<form method="POST" action="postComment.php">
					<textarea name="comment" rows="8" cols="75"></textarea><br><br><br>
					<input type="submit" name="submit" value="Submit comment" style="float:right"/>
				</form>
			
			<?php
						} else {
							echo "<p style='color: red'><em>You must be logged in to comment</em></p>";
						}
						
					
						if(Comment::getAllComments($id)) {
							$comment = Comment::getAllComments($id);
							$comments = new Comment;
							$comments->renderAll($comment);
						}
					} else {
						echo $notFound;
					}
				} else {
					echo $notFound;
				}
			} else {
					echo $notFound;
			}
		
		
		?>
		</div>
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
</body>
</html>