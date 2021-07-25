<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Hello, world!</title>
</head>

<body>
  <?php
  require 'partials/head.php';
  require 'partials/_dbconnect.php'
  ?>

  <!-- carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://source.unsplash.com/1800x600/?gaming,battleground" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/1800x600/?pubg,gamer" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/1800x600/?csgo,game" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- category-container -->
  <div class="container">
    <h2 class="text-center mt-5">Gamisthan - iDiscuss Categories</h2>
    <div class="category-box">
      <?php
      $fechCategories = "SELECT * FROM `".$table_name."`";
      $categories = mysqli_query($connection, $fechCategories);
      if (mysqli_num_rows($categories) > 0) {
        while ($row = mysqli_fetch_assoc($categories)) {
          echo '<div class="card mx-3 mt-3" style="width: 18rem;">
            <img src="https://source.unsplash.com/400x350/?'.$row['cat_name'].',gaming" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="thread_list.php?id='.$row['cat_id'].'"><h5 class="card-title">'.$row['cat_name'].'</h5></a>
              <p class="card-text">'.$row['cat_desc'].'</p>
              <a href="thread_list.php?id='.$row['cat_id'].'" class="btn btn-primary">Explore more</a>
            </div>
          </div>';
        }
      }
      ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>