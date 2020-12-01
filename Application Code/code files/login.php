<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />

    <!-- font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;400;500;600;700;800&display=swap"
      rel="stylesheet">
      <link rel="stylesheet" href="css files/login.css" />
      <style>
        body{
          overflow-y:hidden;
        }
      </style>
</head>
<body>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password =$_POST['password'];

    $emailsearch = " select * from voters where email='$email' ";
    $query = mysqli_query($con, $emailsearch);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['password'];

        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
            if(isset($_POST['admin']) && $_POST['admin'] == '1' ){
                if($email=="admin_202000000@smit.smu.edu.in"){
                    $displayquery = "select * from voters where email='$email'";
                $query = mysqli_query($con, $displayquery);
                $row = mysqli_fetch_assoc($query);
                $_SESSION["username"]=$row['username'];
                $_SESSION["id"]=$row['id'];
                    ?>
                        <script>
                            alert("Login Successful");
                            location.replace("admin.php");
                        </script>
                    <?php
                }
                else{
                    ?>
                        <script>
                            alert("Can't login as admin with this email!");
                        </script>
                    <?php
                }
            }
             else{
                $displayquery = "select * from voters where email='$email'";
                $query = mysqli_query($con, $displayquery);
                $row = mysqli_fetch_assoc($query);
                $_SESSION["username"]=$row['username'];
                $_SESSION["id"]=$row['id'];
                $_SESSION["flag"]= 1;
                ?>
                    <script>
                        alert("Login Successful");
                        location.replace("home2.php");
                </script>
                <?php
            }
            
        }
        else{
            ?>
            <script>
            alert("Password Incorrect");
            </script>
            <?php
        }
    }
    else{
            ?>
            <script>
            alert("Invalid Email");
            </script>
            <?php
    }
}

?>

    <div class="container">
    <nav
      class="navbar navbar-expand-md navbar-dark fixed-top px-5 py-0 theme bg-primary" id="custom-nav"
    >
      <a class="navbar-brand pl-5 ml-5" href="#"
        ><span class="logo"
          ><img
            src="https://smu.edu.in/content/dam/manipal/smu/images/logos/smit-logo-2020.png" /></span
      ></a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#collapsibleNavbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse w-100" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a  href="home1.html">HOME</a>
          </li>

          <li class="nav-item">
            <a href="#footer">CONTACT</a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="active">LOGIN/SIGN UP</a>
          </li>
        </ul>
      </div>
    </nav>
        <div class="card bg-light login-box" style="margin-top:160px;box-shadow:2px 4px 2px skyblue;">
            <article class="card-body mx-auto" >
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i></span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email Address" type="email" required>
                    </div>
                    <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                    </div>
                    <input name="password" class="form-control" placeholder="Enter Password" type="password" value="" required>
                    </div>
                    
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-dark btn-block theme atc">Login Now</button>
                </div>
                <input type="checkbox" name="admin" value="1">
                Login as Administrator ?
                
                <p class="text-center">Don't have an account? <a href="signup.php">Sign-Up here</a></p>
            </form>
            </article>
        </div>
</div>
        
       
                
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
    </div>
</div>
</div>
</body>
</html>
