<?php
    // Start the session
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <style>
      body {
        background-image:radial-gradient(circle, red, darkred);
      }
      #floating-menu {
        width: 85%;
        z-index: 100;
        position: fixed;
      }
      #floating-menu a, #floating-menu h3 {
        font-size: 0.9em;
        display: block;
        margin: 0 0.5em;
        color: white;
      }
      h1 {
          color: white;
      }
      div {
          color: white;
      }
      img {
          width: 50%;
          height: 100%;
      }
      p {
          font-size: 25px;
      }
      .quantity {
          font-size: 25px;
          width: 30%;
          color: black;
          border: white;
          text-align: center;
      }
      .customer-label {
          font-size: 25px;
      }
      .customer-input {
          font-size: 20px;
      }
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="frontend-styles.css" rel="stylesheet">
  <!-- <form method="get" action="cart.php" name="form" id="menuform" enctype="multipart/mixed"> -->
  <div class="flex-menu" id="floating-menu">
	<!-- Using <a> makes only the text clickable and not the entire <div> box, so onclick is used instead -->
	  <div onclick="location.href='about.html';">❰ About ❱</div>
    <div onclick="location.href='contact.html';">❰ Contact ❱</div>
    <div onclick="location.href='index.html';">❰ Home ❱</div>
    <div onclick="location.href='store_front.php';">❰ Menu ❱</div>
    <div onclick="openForm()">❰ Checkout ❱</div>
  </div>
  </head>
  <body class="container my-5">
    <div class="container">
  <div class="heading">
    <br><br><br>
    <h1>
        <span class="shopper">Item Cart</span>
    </h1>
    <br>
    <!-- <a href="#" class="visibility-cart transition is-open">X</a> -->   
  </div>
  
  <div class="cart transition is-open">
    
    <!-- <a href="#" class="btn btn-update">Update cart</a> -->
    
    
    <div class="table">
      
      <div class="layout-inline row th">
        <div class="col col-pro" style="font-size:25px;">Image</div>
        <div class="col col-price align-center " style="font-size:25px;"> 
          Menu Item
        </div>
        <div class="col col-qty align-center" style="font-size:25px;">Quantity</div>
        <div class="col" style="font-size:25px;">Price</div>
      </div>
      <?php
      $dbhost = 'localhost:3306';
      $dbuser = 'adminuser';
      $dbpass = 'CSC4400';
      $dbname = "phpmyadmin";
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      if(! $conn ) {
       die('Could not connect: ' . mysql_error());
      }
      $sql = "SELECT ItemName, ItemPrice, ItemDescription, ItemPictureLink FROM menu";
      $result = $conn->query($sql);
      $idNum = 0;
      $inputIdNum = 1;
      $totalPrice = 0;
      $numOfItems = 0;
      $itemRecord = array();
      
      while($row = $result->fetch_assoc()) {
          $name = $row["ItemName"];
          $price = $row["ItemPrice"];
          $desc = $row["ItemDescription"];
          $link = $row["ItemPictureLink"];
          $uri = $_SERVER['REQUEST_URI'];
            //echo $uri; // Outputs: URI
            $items = substr($uri, 27);
            $nums = str_split($items);
            if ($nums[$idNum] === "1") {
                $totalPrice += $price;
                $numOfItems++;
                array_push($itemRecord, $inputIdNum); 
                echo <<<_END
                    <div class="layout-inline row">
                        <p>$
                    </div>
_END;
            }
            $idNum++;
            $inputIdNum++;
      } ?>  
  </div>
    <?php
    echo "<h1 align='right'><span class='shopper'>Total (<span id='numOfItems'>$numOfItems</span>) = $<span id='totalPrice'>$totalPrice</span></h1>";
    ?>
     <div class="about-text-container" id="myForm">
        <form method="get" class="form-container" action="/QuickServe/submitted.php">
            <h1><span class="shopper">Delivery Details</span></h1>
            <label class="customer-label" for="customer-name"><b>Customer Name</b></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <label class="customer-label" for="address"><b>Delivery address</b></label><br>
            <input class="customer-input" type="text" placeholder="Enter customer name" name="customer-name" required>&emsp;&emsp;&emsp;&emsp;
            <input class="customer-input" type="text" placeholder="Enter delivery address" name="address" required><br><br>
            <input type="hidden" id="quantityRecord" value="0" name="quantity">
            <button type="submit" class="btn-lg" id="center-button" style="width: 300px; height: 100px;">Place Order</button><br><br>
        </form>
    </div>
    <?php
        $_SESSION["sessionItems"] = $itemRecord;
        //echo implode("", $itemRecord);
    ?>
    <!-- <a href="#" class="btn btn-update">Update cart</a> -->
  
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        function total() {
            let totalItems = document.getElementById("numOfItems").innerHTML;
            //alert(totalItems);
            let count = 1;
            let totalPrice = 0.00;
            let quantityRecord = [];
            let quantityRecordCount = 0;
            while (totalItems > 0) {
                try {
                    if (isNaN(document.getElementById("I"+count).value)) {
                        document.getElementById("I"+count).value = 1;
                    }
                    if (document.getElementById("I"+count).value < 0 || document.getElementById("I"+count).value >= 10) {
                        document.getElementById("I"+count).value = 1;
                    }
                    totalPrice += (document.getElementById("I"+count).value * parseFloat(document.getElementById("P"+count).innerHTML));
                    //alert(document.getElementById("I"+count).value);
                    //alert(parseFloat(document.getElementById("P"+count).innerHTML));
                    quantityRecord[quantityRecordCount] = document.getElementById("I"+count).value;
                    quantityRecordCount++;
                    //alert(quantityRecord);
                    totalItems--;
                    //alert(totalPrice);
                }
                catch (err) {
                    continue;
                }
                finally {
                    count++;
                }
            }
            totalPrice = totalPrice.toFixed(2);
            document.getElementById("totalPrice").innerHTML = totalPrice;
            document.getElementById("quantityRecord").value = quantityRecord.join("");
            
        }
        function myFunction() {
        let s = "";    
        for (let i = 0; i < <?php echo $idNum ?>; i++) {   
            if (document.getElementById(i).checked) {
                s += "1";
            } else {
                s += "0";
            }
        }
        let url = "http://localhost/QuickServe/cart.php?items=" + s;
        alert(url);
        window.location.replace(url);
        //document.getElementById('menuform').setAttribute("action", url)
        //document.getElementById('menuform').submit();
        }
    </script>
  </body>
</html>
