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
    require 'partials/_dbconnect.php';
    $thread_id = $_GET['thread_id'];
    if($_SERVER['REQUEST_METHOD'] === "POST"){
      $comment = $_POST['comment'];
      $query = "INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`) VALUES ( '".$comment."', '".$thread_id."', '0')";
      $commentCreated = mysqli_query($connection,$query);
      if($commentCreated){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Wooho!</strong> Your comment has been added successfuly.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';        
      }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh!</strong> Your comment has not been added.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }      
    }
    ?>

    <div class="container col-md-8">
        <!-- jumbotron -->
        <div class="bg-light rounded-lg p-5 mt-3">
            <?php
            $query = 'SELECT * FROM thread WHERE thread_id = '.$thread_id;
            $threadData = mysqli_query($connection, $query);
            $data = mysqli_fetch_assoc($threadData);
            echo '<p><b>Title : </b></p><p class="lead font-weight-bold"><b>'.$data['thread_title'].'</b></p>
            <hr class="my-4">
            <p>'.$data['thread_desc'].'</p>
            <h3 class="mt-5 mb-3">Write your comment</h3>';
            ?>
            <form action=<?php echo $_SERVER['REQUEST_URI']?> method="post">               
              <div class="mb-3">
                <label for="comment" class="form-label">Please keep  rules in mind  while commenting. </label>
                <textarea maxlength="500" class="form-control" id="comment" name="comment" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
        <?php 
            echo '<p class=""></p>';
            $query = 'SELECT * FROM comment WHERE thread_id = '.$thread_id;
            $commentData = mysqli_query($connection, $query);
            if(mysqli_num_rows($commentData) > 0){            
            echo '<h4 class="">Discussion..</h4>';
            while($row = mysqli_fetch_assoc($commentData)){
                echo '<div class="d-flex mb-3">
                    <img src="resources/user.jpeg" class="mr-3 user-img" alt="...">
                    <div class="media-body">
                        <span class="d-flex">
                        <p class="mb-0"><b>Aman |&nbsp</b></p>
                        <p class="mb-0 text-muted"><small><em><b> '.$row['created_on'].'</b></em></small></p>
                        </span>
                        <p class="break-all">'.$row['comment_content'].'</p>
                    </div>
                </div>';        
            } 
        }else{
            echo '<div class="bg-light rounded-lg p-3 mt-3">
            <div class="container">
              <h1 class="display-4">No Comments..</h1>
              <p class="lead">Be the first person to start discussion. Write now !!</p>
            </div>
          </div>';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>