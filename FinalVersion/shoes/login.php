<?php
session_start();

// Check if the logout button is clicked
if(isset($_POST['logout'])) {
    // Unset all session variables
    session_unset();
    // Destroy the session
    session_destroy();
}

// Include the database configuration file
include("php/config.php");

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password'") or die("Select Error");
    $row = mysqli_fetch_assoc($result);
    
    if (is_array($row) && !empty($row)){
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['valid'] = $row['Email'];
        $_SESSION['password'] = $row['Password'];
        $_SESSION['id'] = $row['Id']; // Ensure this line is setting 'id' correctly
        // After setting other session variables like 'loggedin', 'valid', etc.
        $_SESSION['email'] = $row['Email'];
        $_SESSION['mobile_number'] = $row['MobileNumber'];
        
        // Check if the user is an admin
        if ($row['admin'] == 1) {
            $_SESSION['admin'] = true;
        } else {
            $_SESSION['admin'] = false;
        }

        // Redirect to the appropriate page (index.php)
        header("Location: index.php");
    } else {
        // Display error message
        $error = "Wrong Email or Password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="login.css">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .box {
            text-align: center;
        }

        .logout-btn {
            margin-top: 10px;
        }

        .forgot-password {
            margin-top: 10px;
        }

        /* New CSS for vertical alignment */
        .links-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px; /* Adjust the margin-top to increase space */
        }
    </style>
    <script>
        function redirectToIndex() {
            window.location.href = "index.php";
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
                if(isset($_SESSION['valid'])) {
                    echo "<div class='message'>
                            <p>Logged in as: ".$_SESSION['valid']."</p>
                          </div>";
                    echo "<form action='' method='post'><input type='submit' name='logout' class='btn logout-btn' value='Log Out'></form>";

                    // Wrap the "Log Out" button and "Reset Password?" link in a container
                    echo "<div class='links-container'>";
                    echo "<div class='links'>
                            <a href='changepassword.php' class='forgot-password'>Reset Password?</a>
                          </div>";
                    echo "</div>";

                    exit;
                }
                
                if(isset($error)) {
                    echo "<div class='message'>
                            <p>$error</p>
                          </div> <br> ";
                }
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
                    <input type="button" name="close" class="btn" value="Close" onclick="redirectToIndex()">
                </div>

                <div class="links">
                    Don't have an account? <a href="signup.php"> Sign Up Now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>