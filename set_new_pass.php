<?php session_start()?>
<!doctype html>
<html lang="en">
		<meta charset="utf-8">
		<link href="emp_login.css" rel="stylesheet">
	<head>
		<title>Quick-serve</title>
	</head>
	<body>
                <p id="title">Quick-serve</p>
		<div id="form_body">
                    <br>
                    <form method="post" id="login">
                        <p id="login-title">Insert New Password</p>
                        <label class="login-subtext" for="answer">L E T T E R S &nbsp A N D &nbsp N U M B E R S &nbsp O N L Y</label>
                        <input type="password" name="new_pass" id="new_pass">
                        <br><br>
                        <input name="press_query_btn" id="press_query_btn" class="login-subtext" type="submit" value="S E N D" onclick="">
                        <?php
                            if(isset($_POST["press_query_btn"]))
                            {
                                press_query();
                            }
                            function press_query()
                            {
                                $name = $_SESSION['u_name'];
                                $new_pass = '';
                                if(isset($_POST["new_pass"]))
                                {
                                    $new_pass = htmlspecialchars($_POST["new_pass"]);
                                }
                                                               
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
                                
                                $sql = "UPDATE login SET Password='$new_pass' WHERE Username='$name'";
                                $result = $conn->query($sql);
                                
                                if ($conn->query($sql) === TRUE) {
                                    echo "<p style='font-family: helvetica; font-size: 18px; fontweight: bold;'>Password changed succesfully, redirecting in 3s...</p>";
                                    header("refresh: 3; url=back_end_home.php");
                                } else {
                                    echo "<p style='font-family: helvetica; font-size: 18px; fontweight: bold;'>Error updating record: " . $conn->error . "</p>";
                                }
                            }
                        ?>
                    </form>
		</div>
	</body>
</html>


