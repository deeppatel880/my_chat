<?php $host = 'localhost';
$user = 'root';
$password = '';
$databasename = 'my_chat';

$con = mysqli_connect($host,$user,$password,$databasename);
session_start();
$username = $_SESSION['username']; 
?>
<?php 
if(!empty($_POST['oldpassword1'])){
	$oldpassword1 = $_POST['oldpassword1'];
	$query = mysqli_query($con,"SELECT password FROM users WHERE username='$username'");
	$row = mysqli_fetch_assoc($query);

		$oldpassworddb = $row['password'];
		$olddbpass = md5($oldpassworddb);
		if($olddbpass == $oldpassword1){
			$q = mysqli_query($con, "DELETE FROM users WHERE username='$username'");
			if($q){
				echo "<div style='text-align: center; background: #2ecc71; padding:10px;color:white;'>Your account has been deactivated</div>";
				header("location:../logout.php");
			}
		}else{
			echo "<div style='text-align: center; background: #e74c3c; padding:10px;color:white;'>Old password doesn't match</div>";
		}	
}else{
	echo "<div style='text-align: center; background: #e74c3c; padding:10px;color:white;'>Please enter old password in order to deactivate</div>";
}




 ?>