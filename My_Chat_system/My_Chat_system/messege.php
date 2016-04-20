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
         	$(setInterval(function(){
         		$("#chats").load('insert/query.php').scrollTop($("#chats").prop("scrollHeight"));
         	}, 500));

         		$("#send").click(function(){
         			var message = $("#message").val();
         			var height = $("#chats").prop("scrollHeight");
         			$.post("insert/message.php", {message:message}, function(data){
         				$("chats").html(data)
         				$("#message").val("");
         				$("#chats").animate({ scrollTop: height}, 500);
         			});
         			return false;
         		});	
         	});	
         </script>
    
</head>
<?php if(!isset($username)){ header("location: index.php") ?> 
<?php  } else{ ?>
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
<?php } ?>
</html>