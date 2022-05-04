<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="edit_menu_styles.css" rel="stylesheet">
    <style>
        
        #add_item{
            margin-top: 20px;
        }
        
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
        }
        
        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: white; 
            margin: auto;
            padding: 0;
            border: 2px solid #888;
            border-radius: 5px 5px 5px 5px;
            width: 80%;

        }

        
        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body> 
        <?php 
            $it_idErr = $it_nameErr = $it_priceErr = $it_descrErr = "";
            $item_id = $item_name = $item_price = $item_description = "";
            $counter = 0;
            
            if(isset($_POST["query_item_btn"]))
            {
                if (empty($_POST["item_id"])) {
                    $it_idErr = "ID is required";
                } else {
                    $item_id = test_input($_POST["item_id"]);
                    $counter += 1;
                }
                if (empty($_POST["item_name"])) {
                    $it_nameErr = "Item name is required";
                } else {
                    $item_name = test_input($_POST["item_name"]);
                    $counter += 1;
                }
                if (empty($_POST["item_price"])) {
                    $it_priceErr = "Price is required";
                } else {
                    $item_price = test_input($_POST["item_price"]);
                    $counter += 1;
                }
                if (empty($_POST["item_descr"])) {
                    $it_descrErr = "Item description is required";
                } else {
                    $item_description = test_input($_POST["item_descr"]);
                    $counter += 1;
                }
                
                if($counter == 4)
                {
                    $counter = 0;
                    create_new_item($item_id, $item_name, $item_price, $item_description);
                }
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            } 
            
            function create_new_item($item_id, $item_name, $item_price, $item_description)
            {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "test";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "INSERT INTO menu (ItemID, ItemName, Price, Description) values ('$item_id', '$item_name', '$item_price', '$item_description')";
                $result = $conn->query($sql);
            }
        ?>
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
                <div id="actions_field">
			<p id="subtext">Select an action</p>
			<div class="tab">
                            <button id="add_btn" class="tab_links" onclick="openEvent(event, 'add')">A D D</button>
                            <br><br>
                            <button id="edit_btn" class="tab_links" onclick="openEvent(event, 'edit')">E D I T</button>
                            <br><br>
                            <button id="del_btn" class="tab_links" onclick="openEvent(event, 'del')">D E L E T E</button>
                            <br><br>
			</div>
			
		</div>
            
		<div id="stats_field">
                    <div id="add_item" class="modal">
                        
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close">&times;</span>
                                <h2 class="modal_title_font">Add New Item to Menu</h2>
                            </div>
                            <div class="modal-body">
                            <!--Modal body content-->
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                Item ID:<br><input type="text" name="item_id">
                                <span class="error">* <?php echo $it_idErr;?></span>  
                                <br><br>
                                
                                Item Name<br><input type="text" name="item_name">
                                <span class="error">* <?php echo $it_nameErr;?></span>  
                                <br><br>
                                
                                Item Price:<br><input type="text" name="item_price">
                                <span class="error">* <?php echo $it_priceErr;?></span>  
                                <br><br>
                                
                                Description:<br><input type="text" name="item_descr">
                                <span class="error">* <?php echo $it_descrErr;?></span>  
                                <br><br>
                                
                                <input type="submit" value="S U B M I T &nbsp I T E M" class="modal_buttons" id="query_item_btn" name="query_item_btn">
                            </form>
                            </div>
                        </div>
                    </div>

                    <div id="edit_item" class="modal">
                        
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close">&times;</span>
                                <h2 class="modal_title_font">Create New User Account</h2>
                            </div>
                            <div class="modal-body">
                            <!--Modal body content-->
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                               <p>Hello test, test</p>
                            </form>
                            </div>
                        </div>
                    </div>

                    <div id="del_item" class="tabcontent">
                        <h3>Delete</h3>

                    </div>		
		</div>
	</div>
    <script>
            //here we can probably go a little simpler
            //than is required
            //realistically, do we need to have all this fancy stuff? 
            //Try doing something similar to the web prog final project
            //each button opens its own DIV tag and disables the other two before
            //its own opens
            //
            //
            // Get the modal
            var add_item = document.getElementById("add_item");
            var edit_item = document.getElementById("edit_item");
            // Get the button that opens the modal
            var add_btn = document.getElementById("add_btn");
            var edit_btn = document.getElementById("edit_btn");
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            add_btn.onclick = function() {
                add_item.style.display = "block";
            };
            
            edit_btn.onclick = function() {
                edit_item.style.display = "block";
            };
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                if(add_item.style.display === "block")
                {
                    add_item.style.display = "none";
                }
                
                if(edit_item.style.display === "block")
                {
                    edit_item.style.display = "none";
                }
            };

            // When the user clicks anywhere outside of the modal, close it
            /*window.onclick = function(event) {
                if (event.target === create_modal) {
                        create_modal.style.display = "none";
                }
                if (event.target === terminate_modal) {
                        terminate_modal.style.display = "none";
                }
            };*/
        </script>
</body>
</html>