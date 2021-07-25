<?php
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>
      </ul>
        <button class="btn btn-outline-success mx-3" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signUpModal">Signup</button>        
    </div>
  </div>
</nav>

<!--Signup Modal -->
<div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signUpModalLabel">Signup</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="signup.php" method="POST">
      <div class="modal-body">
      <input required type="hidden" class="form-control" name="current_page" value="'.$_SERVER['REQUEST_URI'].'">
      <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input required type="text" maxlength="40" class="form-control" id="name" aria-describedby="nameHelp" name="name"">
      </div>
      <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input required type="email" maxlength="40" class="form-control" id="email" aria-describedby="emailHelp" name="email"">
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input required type="password" maxlength="40" class="form-control" id="password" name="password"">
      </div>      
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" id="submit">Signup</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="login.php" method="POST">
      <div class="modal-body">
      <input required type="hidden" class="form-control" name="current_page" value="'.$_SERVER['REQUEST_URI'].'">
      <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input required type="email" maxlength="40" class="form-control" id="email" aria-describedby="emailHelp" name="email"">
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input required type="password" maxlength="40" class="form-control" id="password" name="password"">
      </div>      
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" id="submit">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>
';
if(isset($_GET['registered']) && !isset($_GET['login'])){
  if($_GET['registered']==='true'){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Wooho!</strong> Your are registered successfuly.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }else{
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Oops!</strong> Registration failed.'.$_GET['error'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
}

if(isset($_GET['login'])){
  if($_GET['login']==='true'){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Wooho!</strong> Your are login successfuly.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }else{
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Oops!</strong> Login failed.'.$_GET['error'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
}
?>