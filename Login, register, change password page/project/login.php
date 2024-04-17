
<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="container">
            <div class="box form-box">
                <?php 
                    include("php/config.php");
                    if(isset($_POST['submit'])) {
                        $email = mysqli_real_escape_string($con, $_POST['email']);
                        $password = mysqli_real_escape_string($con, $_POST['password']);


                        $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password'") or die("Select Error");
                        $row = mysqli_fetch_assoc($result);
                        
                       if (is_array($row) && !empty($row)){
                        // $_SESSION['firstname'] = $row['FirstName'];
                        // $_SESSION['middlename'] = $row['MiddleName'];
                        // $_SESSION['lastname'] = $row['LastName'];
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['password'] = $row['Password'];
                        // $_SESSION['mobilenumber'] = $row['MobileNumber'];
                        $_SESSION['id'] = $row['Id'];
                       } else {
                        echo "<div class='message'>
                            <p> Wrong Email or Password</p>
                            </div> <br> ";
                         echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
                       }
                       if(isset($_SESSION['valid'])) {
                            header("Location: home.php");       // redirect to home page"
                       }
                    } else {
                ?>


                <h1>LOG IN </h1>
                <form action="" method="post">
                    <div class="field input">
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>

                    <div class="field input">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>

                    <div class="field submit">
                        <input type="submit" name="submit" class="btn" value="Log In">
                        <input type="submit" name="close" class="btn" value="Close">
                    </div>

                    <div class="links">
                        Don't have an account? <a href="signup.php"> Sign Up Now</a>
                    </div>
                    <div class="links">
                        
                       <a href="changepassword.php"> Forget Password</a>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </body>
</html>