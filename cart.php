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
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="frontend-styles.css" rel="stylesheet">
  <form method="get" action="cart.php" name="form" id="menuform" enctype="multipart/mixed">
  <div class="flex-menu" id="floating-menu">
	<!-- Using <a> makes only the text clickable and not the entire <div> box, so onclick is used instead -->
	  <div onclick="location.href='about.html';">❰ About ❱</div>
    <div onclick="location.href='contact.html';">❰ Contact ❱</div>
    <div onclick="location.href='index.html';">❰ Home ❱</div>
    <div onclick="location.href='index.html';">❰ Language ❱</div>
    <div onclick="location.href='store_front.php';">❰ Menu ❱</div>
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
      $totalPrice = 0;
      
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
                echo <<<_END
                    <div class="layout-inline row">

                        <div class="col col-pro layout-inline">
                            <img src="$link" alt="Placeholder" />
                        </div>
                            
                        <div class="col col-pro layout-inline">
                            <p>$name</p>
                        </div>
                        
                        <div class="col col-qty layout-inline">
                           <input type="numeric" class="quantity" style="background-color:white" value="1" />
                        </div>

                        <div class="col col-price col-numeric align-center ">
                           <p>$$price</p>
                        </div>
                    </div>
_END;
            }
            $idNum++;
      } ?>
      <!-- <div class="layout-inline row">
        
        <div class="col col-pro layout-inline">
          <img src="1.png" alt="Placeholder" />
          <p>Item #1</p>
        </div>
        
        <div class="col col-price col-numeric align-center ">
          <p>£59.99</p>
        </div>

        <div class="col col-qty layout-inline">
          <a href="#" class="qty qty-minus">-</a>
            <input type="numeric" class="quantity" style="background-color:white" value="1" />
          <a href="#" class="qty qty-plus">+</a>
        </div>
        <div class="col col-total col-numeric">               <p> £182.95</p>
        </div>
      </div> -->

       <!-- <div class="tf">
          <div class="row layout-inline">
           <div class="col">
             <p>Total</p>
           </div>
           <div class="col"></div>
         </div>
       </div> -->        
  </div>
    <?php
    echo "<h1 align='right'><span class='shopper'>Total = $$totalPrice</span></h1>";
    ?>
    
    <!-- <a href="#" class="btn btn-update">Update cart</a> -->
  
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
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
