<?php
include('includes/config.php');

$page_title = "Register page";
$meta_description = "Register page description";
$meta_keywords = "Digital Transformation,
Strategic advice,
Fiber Optic Expertise and Engineering,
Technical expertise";
include('includes/header.php');

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "This Account Already Exist";
    header("Location: index.php");
    exit(0);
}

include('includes/navbar.php');
?>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <?php include('message.php'); ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">

                        <form action="registercode.php" method="POST">
                            <div class="form-group mb-3">
                                <label>First Name</label>
                                <input type="text" name="fname" placeholder=
                                "Enter First Name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Last Name</label>
                                <input type="text" name="lname" placeholder=
                                "Enter Last Name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Email Id</label>
                                <input type="email" name="email" placeholder=
                                "Enter Email Address" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" placeholder=
                                "Enter Password" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="cpassword" placeholder=
                                "Enter Confirm Password" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>