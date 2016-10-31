<?php 
	require_once 'core/init.php';
	
	$articles = Article::getAllArticles();
	for($i = 0; $i < sizeof($articles); $i++){
		echo "<li style='margin: 5px 0 15px'><a href=readMore.php?id=" . $articles[$i]['id'] . ">" . $articles[$i]['title'] . "</a></br>
				  <em>@ " . $articles[$i]['date'] . "</em></li>";
	}

?>
