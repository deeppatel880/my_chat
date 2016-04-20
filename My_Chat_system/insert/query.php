<?php 
$host = 'localhost';
$user = 'root';
$password = '';
$databasename = 'my_chat';

$con = mysqli_connect($host,$user,$password,$databasename);
session_start();
$username = $_SESSION['username'];
 ?>
 <?php 
$query = mysqli_query($con, "SELECT * FROM msg ORDER BY id ASC");

while($row = mysqli_fetch_assoc($query)){
?>
		<div id="data">
		<?php if($row['username'] == $username){ ?>
			<div style="float: right;">
		     <br /><span style="color:#FFF;border: 1px solid #3498db; background-color: #3498db;"><?php echo $row['msg']; ?></span><br>
		    </div><br />
		<?php }else{ ?>
			<div style="color:#FFF;border: 1px solid #3498db; background-color: #3498db; height: auto;margin-top: 12px; border-radius: 20px; text-align: center; padding-right: 5px; padding-left: 5px; float: left">
		     <span><?php echo $row['username'];?>:</span>
		     <span><?php echo $row['msg']; ?></span><br /><br />
		    </div><br />
		<?php } ?>
		</div>

<?php }; ?>