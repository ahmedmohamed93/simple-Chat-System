<?php

 include "db.php";


			$stm =$con->prepare('SELECT * FROM chat ORDER BY id DESC');
			$stm->execute();
			$rows =$stm->fetchAll();
			if(!empty($rows)){
				foreach($rows as $row) {

    ?>
   	    	<div id="chat_data">
   	    		<span style="color:green"><?= $row['name']; ?></span> :
   	    		<span style="color:brown"><?= $row['msg']; ?></span>
   	    		<span style="float:right"><?= formatDate($row['date']) ?></span>
			   </div> 
			
	<?php       }
			}
	 ?>