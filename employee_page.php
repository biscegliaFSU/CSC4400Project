<?php
session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="employee_styles.css" rel="stylesheet">
    </head>
    <body>

        <div id="logo_space">
            <div class="navbar">
                <p id="logo_text">Quick-serve</p>
                <a id="abtme" href="aboutme.php"><img src="person.png"></a>
            </div>
        </div>

        
        <div id="">
        <form method="post">
            <div id="tickets_field">
                <!-- <p id="passive_text">
                    There are no current orders.
                </p> -->

                <!-- This is where tickets will be sent after being processed in data base-->
                <?php
                $dbhost = 'localhost:3306';
                $dbuser = 'adminuser';
                $dbpass = 'CSC4400';
                $dbname = "phpmyadmin";
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                if (!$conn) {
                    die('Could not connect: ' . mysql_error());
                }
                $sql = "SELECT OrderID, CustomerName, CustomerAddress, OrderDate FROM `order` WHERE OrderStatus=0;";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $orderID = $row["OrderID"];
                    $cusName = $row["CustomerName"];
                    $address = $row["CustomerAddress"];
                    $date = $row["OrderDate"];
                    echo "<div class='ticket';";
                    echo "<p>$cusName | $address | $date</p>";
                    echo "<input id=$orderID type='checkbox' class='checkbox' onclick='record(this.value)' value='$orderID'>";
                    echo "<label class='overlay' for=$orderID></label>";
                    $detailsql = "SELECT ItemQuantity, ItemID FROM `detail` WHERE OrderID=$orderID;";
                    $result1 = $conn->query($detailsql);
                    echo "<p> - ";
                    while ($row1 = $result1->fetch_assoc()) {
                        $quantity = $row1["ItemQuantity"];
                        $itemID = $row1["ItemID"];
                        $result2 = $conn->query("SELECT ItemName FROM `menu` WHERE ItemID=$itemID;");
                        $temp = $result2->fetch_assoc();
                        $itemName = $temp["ItemName"];
                        echo "$itemName ($quantity) - ";
                    }
                    echo "</p>";
                    echo "</div>";
                }
                ?>
                
            </div>
            <div id="actions_field">
                <p id=subtext>Select an action</p>
                <div>
                    <div class="btn_container">
                        <input type="submit" name="refresh" value="REFRESH">
                    </div>
                    <div class="btn_container">
                        <input type="submit" name="complete" value="MARK COMPLETE" style="color:black;background-color:#lightgreen;">
                    </div>
                    <div class="btn_container">
                        <input type="submit" name="issue" value="MARK WITH ISSUE">
                    </div>
                    <input type="hidden" id="selected_item" value="0" name="selected_item">
                </div>

                <p class="font">Mark orders as complete when they have been fully assembled and are ready for delivery.</p>
            </div>
        </form>
        </div>
        <?php
          if (isset($_POST['refresh'])) {
              header("Refresh:0");
          }
          if (isset($_POST['complete'])) {
              $itemIDToMark = $_POST['selected_item'];
              $conn->query("UPDATE `order` SET OrderStatus=1 WHERE OrderID=$itemIDToMark;");
              header("Refresh:0");
              
          }
          if (isset($_POST['issue'])) {
              $itemIDToMarkWithIssue = $_POST['selected_item'];
              $conn->query("UPDATE `order` SET OrderStatus=2 WHERE OrderID=$itemIDToMarkWithIssue;");
              header("Refresh:0");
              //$temp2 = $result3->fetch_assoc();
              //$itemName = $temp["ItemName"];
          }
        ?>

    </body>
    <script>
        function record(itemID) {
            document.getElementById("selected_item").value = itemID;
        }
    </script>
</html>