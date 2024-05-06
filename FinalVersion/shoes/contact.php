<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css">

    <style>
        .message{
        text-align: center;
    }
    </style>
</head>
<body>
<?=template_header('Contact')?>

<div class="container">
    <div class="form-box">
        <h1>CONTACT US</h1>

        <?php 
            include("php/config.php");

            if(isset($_POST['submit'])){
                $firstname = $_POST['firstName'];
                $middlename = $_POST['middleName'];
                $lastname = $_POST['lastName'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                //verifying the email
                $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'" );

                if(mysqli_num_rows($verify_query) == 0) {
                    // Email does not exist in the database
                    echo "<div class='message'>
                            <p>Please enter your current email.</p>
                          </div>";
                } else {
                    // Email exists in the database, proceed to send the message
                    mysqli_query($con,"INSERT INTO contact(FirstName, MiddleName, LastName, Email, Subject, Message) VALUES('$firstname','$middlename','$lastname','$email','$subject', '$message')") or die("Error Occurred");
                    echo "<div class='message'>
                        <p>Your form has been sent!</p>
                        </div>";
                }
            }
        ?>

        <form action="" method="post">
            <div class='field-name-group'>
                <input type="text" name="firstName" placeholder="First Name" class="form-control" required>
                <input type="text" name="middleName" placeholder="Middle Name" class="form-control">
                <input type="text" name="lastName" placeholder="Last Name" class="form-control" required>
            </div>
                            
            <div class='field-group'>
                <input type="email" name="email" placeholder="Email Address" class="form-control" required>
            </div>
                                                    
            <div class='field-group'>
                <input type="text" name="subject" placeholder="Subject" class="form-control" required>
            </div>
                            
            <div class='field-group'>
                <textarea name="message" placeholder="Write a message"  class="txtarea" required></textarea>
            </div>
            
            <div class='field-send '>
                <input type="submit" name="submit" class="btn-field" value="SEND">
            </div>
        </form>
    </div>
</div>

<?=template_footer()?>

</body>
</html>