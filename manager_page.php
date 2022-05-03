<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="manager_styles.css" rel="stylesheet">
  </head>
  <body>
  
	<div id="logo_space">
		<div class="navbar">
				<ul id="parent_list">
					<p id="logo_text">Quick-serve</p>
					<li><a href="manager_page.php">Home</a></li>
					<li><a class="accounts" href="accounts.php">Accounts</a></li>
					<li><a href="edit_menu.php">Edit Menu</a></li>
					<li><a href="#order_history">Orders</a></li>
					<li><a href="#payments">Payments</a></li>
				</ul>
		</div>

		
	</div>
  
	<div id="container">
		<div id="stats_field">
			<div class="sub_field">
				<p class="font">Labor: </p>
			</div>
			<div class="sub_field">
				<p class="font">Recent Orders:</p>
			</div>
			
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
			
			<p class="font">Please make sure orders are completed before marking as complete!</p>
		</div>
	</div>

  </body>
</html>