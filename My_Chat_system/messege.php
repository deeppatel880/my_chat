<?php include 'nav_bar/nav.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Messages - <?php echo $username ?></title>
	<link rel="stylesheet" type="text/css" href="messages.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type = "text/javascript"
         src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
    <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
         <script type="text/javascript">
         $(document).ready(function(){
         	$.post("insert/query.php",function(results){
         		$("#chats").html(results);

         		$("#send").click(function(){
         			var message = $("#message").val();
         			$.post("insert/message.php", {message:message}, function(){
         				$("#message").val("");
         			});
         			return false;
         		});	
         	});
         });
         	
         </script>
    
</head>
<body>
<div id="chats">
</div>
<div id="userinput">
	<form action="" method="post">
		<input type="text" name="message" id="message" placeholder="Enter your message here"></input>
		<input type="submit" name="send" id="send" value="Send"></input>
	</form>
</div>
</body>
</html>