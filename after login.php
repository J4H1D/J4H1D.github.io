<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");

session_start();

if(!isset($_SESSION['Username'])){
  header("Location: index.html");
  exit();
}
$Username = $_SESSION['Username'];
$url = "after login.php?Username=" .$Username;

?> 
 

<html>
<head>
<title>Art Gallery</title>
<link rel="stylesheet" href="index.css">
<link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script 
src="https://code.jquery.com/jquery-3.3.1.slim.min.js"> </script>
<script
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
<script 
src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"> </script>
</head>
<body>
<!----NavigationBar---->
<section id="nav-bar">
 <nav class="navbar navbar-expand-lg navbar-light">
 <a class="navbar-brand" href="#"><img src="images/logo.png"></a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <?php
    echo "Welcome $Username";
    ?>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">HOME</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="after login about.php">ABOUT US</a>
      </li> 
       <li class="nav-item">
        <a class="nav-link" href="userprofile.php">PROFILE</a>
      </li> 
       <li class="nav-item">
        <a class="nav-link" href="connect logout.php">LOG OUT</a>
      </li>   
    <li class="nav-item">
  <a class="box"><form action="search.php?id<?php echo "0"; ?>" method="post">
 <input type="text" name="search" placeholder="search category">
 <input type="submit" value="search">
 </form>
  </li>
    </ul>
  </div>
</nav>
</section>

<!-----------Slider---------->
<div id="slider">
<div id="headerSlider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
    <li data-target="#headerSlider" data-slide-to="1"></li>
    <li data-target="#headerSlider" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/pic14.jpg" class="d-block w-100">
  <div class="carousel-caption">
  <h5>WELCOME TO ART GALLARY</h5>
  <h4>Experience Fine Arts</h4>
  </div>
  </div>
    <div class="carousel-item">
      <img src="images/pic9.png" class="d-block w-100 h-100">
    </div>
    <div class="carousel-item">
      <img src="images/sculpture.jpg" class="d-block w-100 h-60">
    <div class="carousel-caption">
  <h5>Explore Yourself</h5>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


<!----CAteGoriES----->
<section id="category">
 
 <div class="container">
 <h1>Categories</h1>
 <div class="row">
 <div class="col-md-4 profile-pic text-center">
 <div class = "rounded">
 <a href="cat oil.php" >
 <img src="images/girl.jpg" class="img-responsive">
 </a>
 </div>
 <h6>Oil Painting</h6>
 <a href="cat oil.php" class="round-button">View</a>
 </div>
 <div class="col-md-4 profile-pic text-center">
 <div class = "rounded">
 <a href="cat watercolor.php" >
 <img src="images/matches.jpg" class="img-responsive">
 </a>
 </div>
 <h6>WaterColor Painting</h6>
 <a href="cat watercolor.php" class="round-button">View</a>
 </div>
 <div class="col-md-4 profile-pic text-center">
 <div class = "rounded">
  <a href="cat canvas.php" >
 <img src="images/canvas.jpg" class="img-responsive">
 </a>
 </div>
 <h6>Canvas</h6>
 <a href="cat canvas.php" class="round-button">View</a>
 </div>
 <div class="col-md-4 profile-pic text-center">
 <div class = "rounded">
  <a href="index.html" >
 <img src="images/portrait1.jpeg" class="img-responsive">
 </a>
 </div>
 <h6>Portrait</h6>
 <a href="cat portrait.php" class="round-button">View</a>
 </div>
 <div class="col-md-4 profile-pic text-center">
 <div class = "rounded">
  <a href="cat sculpture.php" >
 <img src="images/sc1.jpg" class="img-responsive">
 </a>
 </div>
 <h6>Sculpture</h6>
 <a href="cat sculpture.php" class="round-button">View</a>
 </div>
 <div class="col-md-4 profile-pic text-center">
 <div class = "rounded">
  <a href="cat landscape.php" >
 <img src="images/land.jpg" class="img-responsive">
 </a>
 </div>
 <h6>Landscape</h6>
 <a href="cat landscape.php" class="round-button">View</a>
 </div>
 </div>
 </div>
</section>

<!----CURRENT EXHIBITION----->
<section id="Exhibitions">
    <h1>Current Exhibitions</h1>
<div class="container1">
  <?php
  $res = mysqli_query($link,"SELECT * FROM exhibition");
  while($row=mysqli_fetch_array($res))
  {
    $id = $row["id"];
  ?>
    <div class="box">
      <a href="exhibition.php?id=<?php echo $id; ?>">
          <img src="<?php echo $image= $row["ex_image"];?>"></a>
          <h2><?php echo $title= $row["ex_name"];?></h2>
      <p style="color: #A2A1A1;">Start Time: <?php echo $stime= $row["start_time"];?><br>End Time: <?php echo $etime= $row["end_time"];?></p>
    </div>
    <?php
  }
  ?>
  </div>
  </section>
<!----Footer---->
<section id="footer">
<div class="container text-center">
<h4>"The true work of art is but a shadow of the divine perfection"</h4></div>

</section>
</body>  
</html>
