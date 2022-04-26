<?php 
session_start();
?>
<?php
//   1. Get form data
$form_user = htmlspecialchars($_GET["username"]);
$form_pass = htmlspecialchars($_GET["pass"]);
$_SESSION["employee_name"] = $form_user;
//   2. connect to database
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
$sql = "SELECT Username, Password, Access FROM login WHERE Username='$form_user' AND Password='$form_pass'";
$result = $conn->query($sql);
$num_rows = mysqli_num_rows($result);

if($num_rows > 0){
    //exists
}else{
    //doesn't exist
    echo 'There was an error fetching data...';
    exit();
}

if ($result !== false) {
    //Snagging database info based on passed in parameters
    $access_result = mysqli_query($conn, $sql);
    $result_arr = mysqli_fetch_all($access_result, MYSQLI_NUM);

    //If admin flag is raised, allow for admin entry    
    if($result_arr[0][2] == 1)
        {
            header("Location: manager_page.php");
            exit();
        }
    //If admin flag is down, open employee
    if($result_arr[0][2] == 0)
        {
            header("Location: employee_page.php");
            exit();
        }
}

//shut down connection
$conn->close();
?>

