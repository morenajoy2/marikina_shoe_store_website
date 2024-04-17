<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="signup.css">
    </head>
    <body>
        <div class="container">
            <div class="box form-box">
                <?php
                    include("php/config.php");
                    if(isset($_POST['submit'])) {
                        $firstname = $_POST['firstname'];
                        $middlename = $_POST['middlename'];
                        $lastname = $_POST['lastname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $mobilenumber = $_POST['mobilenumber'];


                        //verifying the email
                        $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

                        if(mysqli_num_rows($verify_query) !=0 ) {
                            echo "<div class='message'>
                                        <p> This email is used, try another email please!</p>
                                </div> <br> ";
                            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                        } 
                        else{
                            mysqli_query($con,"INSERT INTO users(FirstName,MiddleName,LastName,Email,Password,MobileNumber) VALUES('$firstname','$middlename','$lastname','$email','$password', '$mobilenumber')") or die("Error Occured");
                            echo "<div class='message'>
                                        <p> Sign Up successfully!</p>
                                </div> <br> ";
                            echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
                        }

                    } 

                    elseif(isset($_POST['close'])){
                        header("Location: login.php");
                    }                  
                    
                    
                    else{

                    
                ?>



                <h1>REGISTER</h1>
                <form action="" method="post">
                    <div class="field input ">
                        <input type="text" name="firstname" id="firstname" placeholder="First Name" require>
                        <input type="text" name="middlename" id="middlename" placeholder="Middle Name" >
                        <input type="text" name="lastname" id="lastname" placeholder="Last Name" require>
                    </div>
                    
                    <div class="field input ">
                        <input type="email" name="email" id="email" placeholder="Email" require>
                        <input type="password" name="password" id="password" placeholder="Password" require>
                    </div>

                    <div class="field input">
                        <input type="number" name="mobilenumber" id="mobilenumber" placeholder="Mobile Number" require>
                    </div>

                    <div class="field submit">
                        <input type="submit" name="submit" class="btn" value="Sign Up">
                        <input type="submit" name="close" class="btn" value="Close">
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