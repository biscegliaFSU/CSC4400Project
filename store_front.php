<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>
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
    <div onclick="location.href='store_front.php';" style="background-color:red">❱ Menu ❰</div>
    <div style="background-color:#4f0000"><input style="color:black;" type="button" name="btnsubmit" value="Checkout 🛒" class="cart" onclick="myFunction()"></div>
  </div>
  </head>
  <body class="container my-5">
    <br><br><br>
    <div class="flex-container">
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
      
      while($row = $result->fetch_assoc()) {
          $name = $row["ItemName"];
          $price = $row["ItemPrice"];
          $desc = $row["ItemDescription"];
          $link = $row["ItemPictureLink"];
          echo <<<_END
            <div>
                <img src="$link" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
                <p class="menu-item-name"><input id=$idNum type="checkbox" class="box"> $name | $$price</p>
                <p class="menu-item-desc">$desc</p>
            </div>
_END;
          $idNum++;
      } ?>
        
      <!-- <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #2 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #2, describe the menu item here.</p>
      </div>
      <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #2 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #2, describe the menu item here.</p>
      </div>
      <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #3 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #3, describe the menu item here.</p>
      </div>
      <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #4 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #4, describe the menu item here.</p>
      </div>
      <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #5 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #5, describe the menu item here.</p>
      </div>
      <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #6 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #6, describe the menu item here.</p>
      </div>
      <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #7 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #7, describe the menu item here.</p>
      </div>
      <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #8 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #8, describe the menu item here.</p>
      </div>
      <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #9 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #9, describe the menu item here.</p>
      </div>
      <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #10 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #10, describe the menu item here.</p>
      </div>
      <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #11 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #11, describe the menu item here.</p>
      </div>
      <div>
        <img src="Pizza image 612x612.jpg" alt="Placeholder" width="80%" height="50%" style="margin-top:5%">
        <p class="menu-item-name">Menu item #12 | $9.99</p>
        <p class="menu-item-desc">This is the description for menu item #12, describe the menu item here.</p>
      </div> -->
    </div>
</form>
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
        //alert(url);
        window.location.replace(url);
        //document.getElementById('menuform').setAttribute("action", url)
        //document.getElementById('menuform').submit();
        }
    </script>
  </body>
</html>
