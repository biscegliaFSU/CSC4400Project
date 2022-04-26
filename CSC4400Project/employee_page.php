<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="employee_styles.css" rel="stylesheet">
  </head>
  <body>
  
	<div id="logo_space">
		<div class="navbar">
			<p id="logo_text">Quick-serve</p>
			<a id="abtme" href="aboutme.php"><img src="person.png"></a>
		</div>
	</div>
  
	<div id="container">
		<div id="tickets_field">
			<p id="passive_text">
				There are no current orders.
			</p>
			
			<!-- This is where tickets will be sent after being processed in data base-->
			
			
			
			
		</div>
		<div id="actions_field">
			<p id=subtext>Select an action</p>
			<div>
				<div class="btn_container">
					<input type="button" value="D E L A Y">
				</div>
				<div class="btn_container">
					<input type="button" value="C O M P L E T E">
				</div>
				<div class="btn_container">
					<input type="button" value="I S S U E">
				</div>
			</div>
			
			<p class="font">Please make sure orders are completed to order before marking as complete!</p>
		</div>
	</div>

  </body>
</html>