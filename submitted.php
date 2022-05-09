<?php
    // Start the session
    session_start();
    $itemList = $_SESSION["sessionItems"];
    //echo implode($_SESSION["sessionItems"]);
    $customerName = $_GET["customer-name"];
    //echo $customerName;
    $customerAddress = $_GET["address"];
    $quantities = $_GET["quantity"];
    $date = date("Y-m-d H:i:s");
    
    $dbhost = 'localhost:3306';
    $dbuser = 'adminuser';
    $dbpass = 'CSC4400';
    $dbname = "phpmyadmin";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    $orderID = rand(5, 1000);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $sqlOrder = "INSERT INTO `order` (OrderID, CustomerName, CustomerAddress, OrderDate)
        VALUES ('$orderID', '$customerName', '$customerAddress', '$date')";
    if ($conn->query($sqlOrder) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    for ($x = 0; $x < count($itemList); $x++) {
        $orderDetailID = rand(5, 1000);
        $y = $quantities[$x];
        $z = $itemList[$x];
        $sqlDetail = "INSERT INTO `detail` (OrderDetailID, ItemQuantity, ItemID, OrderID)
            VALUES ('$orderDetailID', '$y', '$z', '$orderID')";
        if ($conn->query($sqlDetail) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="frontend-styles.css" rel="stylesheet">

  <style>
    body {background-image:url('Red Background.png');}
  </style>
  <div class="flex-menu">
	<!-- Using <a> makes only the text clickable and not the entire <div> box, so onclick is used instead -->
	  <div onclick="location.href='about.html';">❰ About ❱</div>
    <div onclick="location.href='contact.html';">❰ Contact ❱</div>
    <div onclick="location.href='index.html';">❰ Home ❱</div>
    <div onclick="location.href='store_front.php';">❰ Menu ❱</div>
    <div onclick="location.href='back_end_home.php';">❰ Login ❱</div>
  </div>
  </head>
  <body class="container my-5">
  <br><br><br><br>
  <h1 id="welcome">Order Submitted!</h1>
  <br><br><br>
  <!-- <div align="center">
    <button type="button" class="btn-lg" id="center-button" onclick="location.href='store_front.php';" style="width: 300px; height: 100px;">View Menu</button>
  </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>


