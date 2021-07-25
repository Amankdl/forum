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
    require 'partials/_dbconnect.php';
    $category_id = $_GET['id'];
    $thread_added = false;
    if($_SERVER['REQUEST_METHOD'] === "POST"){
      $title = $_POST['title'];
      $desc = $_POST['desc'];
      $query = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`, `user_id`)
      VALUES ('".$title."', '".$desc."', '".$category_id."', '0')";
      $threadCreated = mysqli_query($connection,$query);
      if($threadCreated){
        $thread_added = true;
      }
    }
    require 'partials/head.php';
    if($thread_added){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Wooho!</strong> Your thread has been added successfuly.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>

    <div class="container col-md-8">
        <!-- jumbotron -->
        <div class="bg-light rounded-lg p-5 mt-3">
            <?php
            $query = 'SELECT * FROM ' . $table_name . ' WHERE cat_id=' . $category_id;
            $categoryData = mysqli_query($connection, $query);
            $category = mysqli_fetch_assoc($categoryData);    
            echo '<h1 class="display-4">Welcome to '.$category['cat_name'].' forum!</h1>
            <p class="lead">'.$category['cat_desc'].'</p>
            <hr class="my-4">
            <p>Have respect for each other. - Respect each other\'s ideas.
            All group members should do an equal amount of work.
            Your group should have a common understanding of goals that need to be achieved.
            Be open to compromise.
            Effective communication.
            Time management.
            Be happy in the group you are in.</p>
            <h3 class="mt-5 mb-3">Ask your question related to '.$category['cat_name'].' </h3>';
            ?>
            <form action=<?php echo $_SERVER['REQUEST_URI']?> method="post"> 
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input maxlength="300" type="text" name="title" class="form-control" id="title">                
              </div>
              <div class="mb-3">
                <label for="desc" class="form-label">Elaborate your question</label>
                <textarea maxlength="500" class="form-control" id="desc" name="desc" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
        <?php 
        $query = "SELECT * FROM `thread` WHERE thread_cat_id=". $category_id;
        $threads = mysqli_query($connection, $query);
        if(mysqli_num_rows($threads) > 0){            
            echo '<h2 class="my-5">Browse Questions</h2>';
            while($row = mysqli_fetch_assoc($threads)){
                echo '<div class="d-flex mb-3">
                    <img src="resources/user.jpeg" class="mr-3 user-img" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0"><a href="thread.php?thread_id='.$row['thread_id'].'">'.$row['thread_title'].'</a></h5>
                        <p>'.$row['thread_desc'].'</p>
                    </div>
                </div>';        
            } 
        }else{
            echo '<div class="bg-light rounded-lg p-3 mt-3">
            <div class="container">
              <h1 class="display-4">No Question..</h1>
              <p class="lead">Be the first person to show curiosity. Ask Question !!</p>
            </div>
          </div>';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>