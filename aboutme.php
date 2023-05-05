<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="aboutme_styles.css" rel="stylesheet">
  </head>
  <body>
  
	<div id="logo_space">
		<div class="navbar">
			<p id="logo_text">Quick-serve</p>
			<a id="home" href="employee_page.php"><img src="home.png"></a>
		</div>

		
	</div>
  
	<div id="container">
		<div id="tickets_field">
			<p id="subtext">
				About me:
			</p>
                        <div id="emp_info_field">
                            <?php 
                                //sucess, we have employee name
                                //now establish connection to display employee info
                                $user = $_SESSION["employee_name"];
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
                                $sql = "SELECT EmployeeID, FirstName, LastName, Email FROM employee WHERE FirstName='$user'";
                                $result = $conn->query($sql);
                                $num_rows = mysqli_num_rows($result);
                                
                                if($num_rows > 0){
                                    //exists
                                }else{
                                    //doesn't exist
                                    exit();
                                }
                                if ($result !== false) {
                                //Snagging database info based on passed in parameters
                                $access_result = mysqli_query($conn, $sql);
                                $result_arr = mysqli_fetch_all($access_result, MYSQLI_NUM);

                                //echo $result_arr[0][3];
                                echo '<p class="font">Employee ID</p><input class="txt_field" disabled value="' . $result_arr[0][0] . '">';
                                echo '<p class="font">First Name</p><input class="txt_field" disabled value="' . $result_arr[0][1] . '">';
                                echo '<p class="font">Last Name</p><input class="txt_field" disabled value="' . $result_arr[0][2] . '">';
                                echo '<p class="font">Email</p><input class="txt_field" disabled value="' . $result_arr[0][3] . '">';
                                
                                
                            }
                            ?>
			</div>
	</div>

  </body>
</html>