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

	<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid">
		<a class="navbar-brand" href="#">Navbar</a>

		<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Employee Login</button>

		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		  <div class="offcanvas-header">
			<h5 id="offcanvasRightLabel">Offcanvas right</h5>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		  </div>
		  <div class="offcanvas-body">
			Add in login code here.
		  </div>
		</div>

		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">

		</div>
	  </div>
	</nav> -->
  <div class="flex-menu">
	<!-- Using <a> makes only the text clickable and not the entire <div> box, so onclick is used instead -->
	  <div onclick="location.href='about.html';">❰ About ❱</div>
    <div onclick="location.href='contact.html';">❰ Contact ❱</div>
    <div onclick="location.href='index.html';" style="background-color:red">❱ Home ❰</div>
    <div onclick="location.href='index.html';">❰ Language ❱</div>
    <div onclick="location.href='back_end_home.php';">❰ Login ❱</div>
  </div>
  </head>
  
  <?php 
  
  ?>
  
  <body class="container my-5">
  <br><br><br><br>
  <h1 id="welcome">Welcome to Quick-Serve</h1>
  <br><br><br>
  <div align="center">
    <button type="button" class="btn-lg" id="center-button" onclick="location.href='store_front.html';" style="width: 300px; height: 100px;">View Menu</button>
  </div>
	<!-- <div class="mx-auto" style="width: 600px;">
    <br><br><br>
		<div class="mx-auto" style="width: 100px;">
			<a href="store_front.html">
				<button type="button" class="btn btn-primary  btn-lg" onclick="window.location.href='store_front.html" style="width: 200px; height: 100px;">Start Order</button>
			</a>
		</div>
	</div> -->


	<!--<input type="button" value="Start Order!" id="start_btn"></input> -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
