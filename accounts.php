<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
          position: relative;
          background-color: #fefefe;
          margin: auto;
          padding: 0;
          border: 1px solid #888;
          width: 80%;
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
          -webkit-animation-name: animatetop;
          -webkit-animation-duration: 0.4s;
          animation-name: animatetop;
          animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
          from {top:-300px; opacity:0} 
          to {top:0; opacity:1}
        }

        @keyframes animatetop {
          from {top:-300px; opacity:0}
          to {top:0; opacity:1}
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

        .modal-header {
          padding: 2px 16px;
          background-color: #5cb85c;
          color: white;
        }

        .modal-body {padding: 2px 16px;}

        .modal-footer {
          padding: 2px 16px;
          background-color: #5cb85c;
          color: white;
        }   
    </style>
    <link href="accounts_styles.css" rel="stylesheet">
  </head>
  <body>
  
	<div id="logo_space">
		<div class="navbar">
				<ul>
					<p id="logo_text">Quick-serve</p></a>
					<li><a href="manager_page.php">Home</a></li>
					<li><a href="accounts.php">Accounts</a></li>
					<li><a href="#edit_menu">Edit Menu</a></li>
					<li><a href="#order_history">Orders</a></li>
					<li><a href="#payments">Payments</a></li>
				</ul>
		</div>
	</div>
  
	<div id="container">
		<div id="accounts_space">
			<p class="list_font">Active accounts: </p>
			<?php 
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
                            //   3. Generate an SQL statement
                            $sql = "SELECT Username, Password FROM login";
                            $result = $conn->query($sql);
                            $num_rows = mysqli_num_rows($result);
                            
                            if ($result !== false) {
                                //Snagging database info based on passed in parameters
                                $access_result = mysqli_query($conn, $sql);
                                $result_arr = mysqli_fetch_all($access_result, MYSQLI_NUM);
                                $length = count($result_arr);
                                //echo $length;
                                for($i = 0; $i < $length; $i++)
                                {
                                    //echo '<p class="sublist-font">' . $key . '</p>';
                                    echo 
                                    '<p class="sublist_font">Name: ' . $result_arr[$i][0] . '    Pass: ' . $result_arr[$i][1] . '</p>';
                                }
                            }
                            //shut down connection
                            $conn->close();
                        ?>	
		</div>
		<div>
			<p class="list_font">Terminated accounts:</p>
			<p class="sublist_font">None</p>
		</div>
	</div>
        <div id="actions_field">
                            
                            
            <button id="create_btn">C R E A T E</button>
                                
            <button id="del_btn">T E R M I N A T E</button>
                                
            <button id="edit_btn">E D I T</button>
                                
	</div>
        
        <div id="create_mdl" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Modal Header</h2>
              </div>
              <div class="modal-body">
                <p>Some text in the Modal Body</p>
                <p>Some other text...</p>
              </div>
              <div class="modal-footer">
                <h3>Modal Footer</h3>
              </div>
            </div>
        </div>
                                
        <script>
            // Get the modal
            var create_modal = document.getElementById("create_mdl");

            // Get the button that opens the modal
            var btn = document.getElementById("create_btn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                create_modal.style.display = "block";
            };

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                create_modal.style.display = "none";
            };

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target === create_modal) {
                        create_modal.style.display = "none";
                }
            };
        </script>
  </body>
</html>
