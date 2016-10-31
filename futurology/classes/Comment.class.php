<?php 

class Comment extends Entity{
	public static $tableName = "comments";
	public static $keyColumn = "id";
	
	public static function getAllComments($id) {
		$q = self::$db->query("SELECT * FROM comments WHERE news_id = {$id} ORDER BY date DESC");
		$postArr = $q->fetchAll();
		return $postArr;
	}
	
	public static function removeAllComments($id){
		$q = self::$db->query("DELETE FROM comments WHERE news_id = {$id}");
	}
	
	
	public function renderAll($arr){
		for($i = 0; $i < sizeof($arr); $i++){
			echo "<div class=comments><em style='color:orange'>" . $arr[$i]['username'] . "</h4></em> @ ". $arr[$i]['date'] . "</p>";
			if(isset($_SESSION['username'])	&& isset($_SESSION['status'])) {
				if($_SESSION['username'] == $arr[$i]['username'] || $_SESSION['status'] == 'admin') {
					echo "<p><a href='deleteComment.php?id=" . $arr[$i]['id'] . "&username=" . $arr[$i]['username'] . "' style='float: right'>Delete comment</a></p>";
				}				
			}
			echo "<p>". $arr[$i]['content'] . "</p></div>";
		}
	}
}

Comment::init();
?>