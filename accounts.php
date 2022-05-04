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
          background-color: rgb(240, 178, 122); 
          margin: auto;
          padding: 0;
          border: 1px solid #888;
          border-radius: 5px 5px 5px 5px;
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
          font-family: helvetica;
          padding: 2px 16px;
          background-color: rgb(214, 118, 31);
          color: black;
        }

        .modal-body {
            font-family: helvetica;
            color: black;
            font-size: 14px;
            padding: 10px 16px;
        }

        .modal-footer {
          padding: 10px 16px;
          background-color: rgb(214, 118, 31);
          color: black;
        }   
        
        .modal_buttons{
            border-style: none;
            border-radius: 5px;
            padding: 5px;
        }     

        .error {color: #FF0000;}  
    </style>
    <link href="accounts_styles.css" rel="stylesheet">
  </head>
  <body>
  <?php
    // define variables and set to empty values
    $nameErr = $passErr = $c_passErr = $s_questionErr = $s_answerErr = $idErr = "";
    $name = $pass = $c_pass = $question = $answer = $id = "";
    $counter = 0;
    $access = 0;
    
    if(isset($_POST['del_acnt']))
    {
        terminate_account();
        exit();
    }
    
    if (isset($_POST["create_acnt"])) {
      if (empty($_POST["uname"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["uname"]);
        $counter += 1;
      }

      if (empty($_POST["pass"])) {
        $passErr = "Email is required";
      } else {
        $pass = test_input($_POST["pass"]);
        $counter += 1;
      }

      if (empty($_POST["c_pass"])) {
        $c_passErr = "Confirm password is required";
      } else if($_POST["c_pass"] !== $_POST["pass"]){
          $c_passErr = "Passwords do not match";
      }else{
        $c_pass = test_input($_POST["c_pass"]);
        $counter += 1;
      }

      if (empty($_POST["sec_ques"])) {
        $s_questionErr = "Enter a question, be careful!";
      } else {
        $question = test_input($_POST["sec_ques"]);
        $counter += 1;
      }

      if (empty($_POST["sec_ans"])) {
        $s_answerErr = "Enter your Answer";
      } else {
        $answer = test_input($_POST["sec_ans"]);
        $counter += 1;
      }
      
      if(isset($_POST["access"]))
      {
          $access = 1;
      }
      
      if (empty($_POST["id"])) {
        $idErr = "Enter an ID";
      } else {
        $id = test_input($_POST["id"]);
        $counter += 1;
      }
    }
    
    if($counter == 6)
    {
        $counter = 0;
        create_account($name, $pass, $question, $answer, $access, $id);
    }
    
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    } 
    
    function create_account($name, $pass, $question, $answer, $access, $id)
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
        //   3. Generate an SQL statement
        $sql = "INSERT INTO login (LoginID, Username, Password, SecurityQuestion, SecurityAnswer, Access, TermAcc) values ('$id', '$name', '$pass', '$question', '$answer', '$access', 0)";
        $result = $conn->query($sql);
    }
    
    function terminate_account()
    {
        $idErr;
        //fill me
        
        //add a new variable in the SQL database that indicates whether an account is active or not
        //this can be a simple 0 or 1
        //once an account has been terminated, change the active SQL column to a 1
        //prompt page for a refresh in order to update info.
        if (empty($_POST["id"])) {
            $idErr = "Id is required";
        } else {
            $id = test_input($_POST["id"]);
            
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
            //continue
            
        }  
    }
    
?>
	<div id="logo_space">
		<div class="navbar">
				<ul>
					<p id="logo_text">Quick-serve</p></a>
					<li><a href="manager_page.php">Home</a></li>
					<li><a href="accounts.php">Accounts</a></li>
					<li><a href="edit_menu.php">Edit Menu</a></li>
					<li><a href="#order_history">Orders</a></li>
					<li><a href="#payments">Payments</a></li>
				</ul>
		</div>
	</div>
  
	<div id="container">
		<div>
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
                            $sql = "SELECT Username, Password, TermAcc FROM login";
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
                                    if($result_arr[$i][2] == 0)
                                    {
                                        echo 
                                        '<p class="sublist_font">Name: ' . $result_arr[$i][0] . '    Pass: ' . $result_arr[$i][1] . '</p>';
                                    }
                                }
                            }
                            //shut down connection
                            $conn->close();
                        ?>	
		</div>
		<div>
			<p class="list_font">Terminated accounts:</p>
			<?php 
                             for($i = 0; $i < $length; $i++)
                                {
                                    if($result_arr[$i][2] == 1)
                                    {
                                        echo 
                                        '<p class="sublist_font">Name: ' . $result_arr[$i][0] . '    Pass: ' . $result_arr[$i][1] . '</p>';
                                    }
                                }
                        ?>
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
                <h2 class="modal_title_font">Create New User Account</h2>
              </div>
              <div class="modal-body">
                <!--Modal body content-->
                 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                   
                   New Login<br><input type="text" name="uname">
                   <span class="error">* <?php echo $nameErr;?></span>  
                   <br><br>
          
                   Set Password<br><input type="password"id="pass" name="pass">
                   <span class="error">* <?php echo $passErr;?></span>
                   <br><br>
                   
                   Confirm Password<br><input type="password" id="c_pass" name="c_pass">
                   <span class="error">* <?php echo $c_passErr;?></span>
                   <br><br>
                   
                   Set Security Question<br><input type="text" id="sec_ques" name="sec_ques">
                   <span class="error">* <?php echo $s_questionErr;?></span>
                   <br><br>
                   
                   Set Answer<br><input type="text" id="sec_ans" name="sec_ans">
                   <span class="error">* <?php echo $s_answerErr;?></span>
                   <br><br>
                   
                   Set User ID<br><input type="text" id="id" name="id">
                   <span class="error">* <?php echo $idErr;?></span>
                   <br><br>
                   
                   <label>Managerial Access?</label>
                   <input type="checkbox" id="access" name="access">
                   <br><br>
                   
                   <input type="submit" value="C R E A T E &nbsp A C C O U N T" class="modal_buttons" id="create_acnt" name="create_acnt">
                </form>
              </div>
              <div class="modal-footer">
               
              </div>
            </div>
        </div>
      
        <div id="del_mdl" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">
                <span class="close">&times;</span>
                <h2 class="modal_title_font">Create New User Account</h2>
              </div>
              <div class="modal-body">
                <!--Modal body content-->
                 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                   
                   Employee ID:<br><input type="text" name="id">
                   <span class="error">* <?php echo $idErr;?></span>  
                   <br><br>
                   <input type="submit" value="T E R M I N A T E" class="modal_buttons" id="del_acnt" name="del_acnt">
                </form>
              </div>
              <div class="modal-footer">
               
              </div>
            </div>
        </div>
                                
        <script>
            // Get the modal
            var create_modal = document.getElementById("create_mdl");
            var terminate_modal = document.getElementById("del_mdl");

            // Get the button that opens the modal
            var c_btn = document.getElementById("create_btn");
            var t_btn = document.getElementById("del_btn");
            var e_btn = document.getElementById("edit_btn");
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            c_btn.onclick = function() {
                create_modal.style.display = "block";
            };
            t_btn.onclick = function() {
                terminate_modal.style.display = "block";
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
                if (event.target === terminate_modal) {
                        terminate_modal.style.display = "none";
                }
            };
        </script>
  </body>
</html>
