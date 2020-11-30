<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <?php include 'links/links.php' ?>
    <link rel="stylesheet" href="login.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap"
      rel="stylesheet"
    />
</head>
<body>

<?php

include 'dbcon.php';
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $regno = mysqli_real_escape_string($con, $_POST['regno']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT); 
    
    $emailquery = " select * from voters where email='$email' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        ?>
    <script>
      alert("Email already exists");
    </script>
    <?php
    }
    else{
        if($password === $cpassword){
            if($regno == "^2018" ||$regno == "^2019" ||$regno == "^2020"){
                $ifvoted = 0;
            }
            else{
                $ifvoted = 1;
            }
            $insertquery = "insert into voters(username, email, password, regNo, ifvoted) values('$username','$email','$pass','$regno','$ifvoted')";
            $iquery = mysqli_query($con, $insertquery);

            if($iquery){
                ?>
                <script>alert("Sign-Up successful");</script>
                <?php
            }
        }
        else{
            ?>
            <script>alert("Password are not matching");</script>;
            <?php
        }
    }

}

?>

    <div class="container">
    <div class="card bg-light login-box" style="top:15%">
        <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        <p class="text-center">Get started with your free account</p>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i></span>
                </div>
                <input name="username" class="form-control" placeholder="Full Name" type="text" required>
                </div>
                <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i></span>
                </div>
                <input name="email" class="form-control" placeholder="Email Address" type="email" required>
                </div>
                <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-id-card"></i></span>
                </div>
                <input name="regno" class="form-control" placeholder="Registration Number" type="text" required>
                </div>
                <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                </div>
                <input name="password" class="form-control" placeholder="Create Password" type="password" value="" required>
                </div>
                <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                </div>
                <input name="cpassword" class="form-control" placeholder="Repeat Password" type="password" required>
                </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-dark btn-block theme atc">Create Account</button>
            </div>
            <p class="text-center">Have an account? <a href="login.php">Log In</a></p>
        </form>
        </article>
    </div>
    <div class="circle">
            <div class="logo-contain">
                <span class="logo">S</span>et<span class="logo">G</span>o...
            </div>
        </div>
    </div>
</body>
</html>