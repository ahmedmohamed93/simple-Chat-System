<?php 
	include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat System in PHP</title>
	<link rel="stylesheet" href="style.css" media="all" />
	<script>
		 function ajax() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				document.getElementById("chat").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "chat.php", true);
			xhttp.send();
        }
	    
		setInterval(function(){ajax()} , 1000);
	
	
	</script>
</head>
<body onload="ajax()">

   <div id="container">
   	    <div id="chat_box">
			   <div id="chat"></div>
	
   	    </div>

		<form method="POST" action="index.php">
		     <input type="text" name="name" placeholder="Enter Name" />	
			 <textarea name="message" placeholder="Enter Message"></textarea>
			 <input type="submit" name="submit" value="send it" />	
		</form>


	<?php
	      // check if submit form by use name of the input
	      if(isset($_POST['submit'])){
			  if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['message']) && !empty($_POST['message'])){
				$name = ucfirst($_POST['name']);
				$msg  = $_POST['message'];

				$stmt = $con->prepare("INSERT INTO chat(name, msg) VALUES(:zname, :zmsg)");
				$run = $stmt->execute(array(
					'zname' 	=> $name,
					'zmsg' 	=> $msg,
					));
				if($run){
					echo "					
					<audio controls autoplay hidden>
					<source src='chat.wav' type='audio/wav'>
					Your browser does not support the audio element.
					</audio>";
				}
			  }
				
	      }
	?>
   </div>

</body>
</html>