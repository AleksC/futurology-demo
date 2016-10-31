 <?php 
 	require_once 'core/init.php';
	
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		echo "<h3>Welcome " . $username . "!</h3>";
		echo "</br><a href='logout.php'>Logout</a>";
	} else {
		echo "User not found";
		include "loginW.php";
	}
	
?>