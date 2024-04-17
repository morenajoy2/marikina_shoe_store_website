<?php 
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password</title>
        <link rel="stylesheet" href="changepassword.css">
    </head>
    <body>
        <div class="container">
            <div class="box form-box">
                <?php 
                    if(isset($_POST['submit'])){
                        $password = $_POST['password'];
                        $email = $_POST['email'];

                        $id = $_SESSION['id'];

                        $edit_query = mysqli_query($con, "UPDATE users SET Password='$password', Email='$email' WHERE Id=$id") or die("error Occured");

                        if($edit_query){
                            echo "<div class='message'>
                                        <p> Your Password Updated!</p>
                                </div> <br> ";
                            echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
                        }
                    }else{

                       
                ?>


                <h1>Change Password</h1>
                <form action="" method="post">
                    <div class="field input">
                        <input type="email" name="email" id="email"  id="email" placeholder="Email" required>
                    </div>

                    <div class="field input">
                        <input type="password" name="password"  id="password" placeholder="Password" required>
                    </div>

                    <div class="field">
                        <input type="submit" name="submit" class="btn" value="Forget">
                    </div>
                    <div class="links">
                        Don't have an account? <a href="signup.php"> Sign Up Now</a>
                    </div>
                    <div class="links">
                       Already an account? <a href="login.php"> Log In</a>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </body>
</html>