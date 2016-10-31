<?php

class Article extends Entity{
	public static $tableName = "news";
	public static $keyColumn = "id";
	public function render() {
		echo "<div class='post'><h2 class='title'>" . $this->title . " </h2>";
		echo "<h5 >" . $this->date . "</h5></br>";
		echo "<div class='entry'><p>" . $this->intro . "</p></br>";
		echo "<img src='images/" . $this->image . "' alt='' width='100%' height='100%' style='margin: 20px 0;'/>";
		echo "<p>" . $this->content . "</p></div>";
	}	
	
	public static function getAllArticles($category = null) {
		$tableName = static::$tableName;
		if($category == null) {
			$q = self::$db->query("SELECT * FROM {$tableName} ORDER BY date DESC  LIMIT 5");
		} else {
			$q = self::$db->query("SELECT * FROM {$tableName} WHERE category = '{$category}' ORDER BY date DESC  LIMIT 5");
		}
		$postArr = $q->fetchAll();
		return $postArr;
	}
	
	public static function previewAll($arr) {
		for($i = 0; $i < sizeof($arr); $i++){
			echo "<h2 class='title'><a href=readMore.php?id=" . $arr[$i]['id'] . ">" . $arr[$i]['title'] . "</a> </h2>";
			echo "<h5>" . $arr[$i]['date'] . "</h5>";
			if(isset($_SESSION['status']) && $_SESSION['status'] == "admin") {
				echo "<a href=deleteArticle.php?article_id=" . $arr[$i]['id'] . "  style='color:red;'> Delete Article </a>";
			}
			echo "<div class='entry'> <img src='images/" . $arr[$i]['image'] . "' alt='' width='20%' height='20%' class='left' />";
			echo "<p>" . $arr[$i]['intro'] . " <a href=readMore.php?id=" . $arr[$i]['id'] . " class='permalink'>Read more</a> </p> </div>";
			$comments = Comment::getAllComments($arr[$i]['id']);
			echo "<p><a href=readMore.php?id=" . $arr[$i]['id'] . "#comments>Comments (" . sizeOf($comments) . ")</a></p> ";
		}
	}
}

Article::init();
?>