<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="edit_menu_styles.css" rel="stylesheet">
</head>
<body>
    <?php
        
    
    
    ?>  
	<div id="logo_space">
		<div class="navbar">
				<ul id="parent_list">
					<p id="logo_text">Quick-serve</p>
					<li><a href="manager_page.php">Home</a></li>
					<li><a class="accounts" href="accounts.php">Accounts</a></li>
					<li><a href="#edit_menu">Edit Menu</a></li>
					<li><a href="#order_history">Orders</a></li>
					<li><a href="#payments">Payments</a></li>
				</ul>
		</div>
		

<div class="body-text">
<!-- body content -->
</div>

</body>
	</div>
	
	<div id="container">           
                <div id="actions_field">
			<p id="subtext">Select an action</p>
			<div class="tab">
                            <button class="tab_links" onclick="openEvent(event, 'add')">A D D</button>
                            <br><br>
                            <button class="tab_links" onclick="openEvent(event, 'edit')">E D I T</button>
                            <br><br>
                            <button class="tab_links" onclick="openEvent(event, 'del')">D E L E T E</button>
                            <br><br>
			</div>
			
		</div>
            
		<div id="stats_field">
		    <div id="add_item" class="tabcontent">
                        <h3>Add Item</h3>
                        
                    </div>

                    <div id="edit_item" class="tabcontent">
                        <h3>Edit</h3>

                    </div>

                    <div id="del_item" class="tabcontent">
                        <h3>Delete</h3>

                    </div>		
		</div>
	</div>
    <script>
        function openEvent(evt, eventName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tab_links");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(eventName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>
</html>