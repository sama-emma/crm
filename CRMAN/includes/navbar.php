<div>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="assets/images/technilogy.png" alt="SFM Technologies Sarl" class="w-100">
      </div>
      <div class="col-md-9">

      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow sticky-top"> 
  <div class="container">
    <a class="navbar-brand d-block d-sm-none d-md-none" href="#"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php
          $navbarCategory = "SELECT * FROM categories WHERE navbar_status='0' AND status='0'";
          $navbarCategory_run = mysqli_query($con, $navbarCategory);

          if(mysqli_num_rows($navbarCategory_run) > 0)
          {
            foreach($navbarCategory_run as $navItems)
            {
              ?>
                <li class="nav-item">
                  <a class="nav-link text-white" href="category.php?title=<?= $navItems['slug']; ?>"><?= $navItems['name']; ?></a>
                </li>
              <?php
            }
          }
        ?>
        
 
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