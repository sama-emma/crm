<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">CRM WEB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
 
        <?php if(isset($_SESSION['auth_user'])) : ?>

        <div class="dropdown">
          
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">  
            <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['auth_user']['user_name']; ?>
            </button>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li>
              <form action="allcode.php" method="POST">
                <button class="dropdown-item" name="logout_btn" type="submit">Logout</button>
              </form>
                </li>
              </ul>
          
        </div>

        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">register</a>
          </li>
        <?php endif; ?>               
      </ul>  
      
  </div>
</nav>