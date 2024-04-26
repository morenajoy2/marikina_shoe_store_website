<?php 

include "config.php";

    if (isset($_POST['update'])) {

        $user_id = $_POST['user_id'];

        $first_name = $_POST['firstname'];

        $midd_lename = $_POST['middlename'];

        $last_name = $_POST['lastname'];

        $email = $_POST['subject'];

        $password = $_POST['comment'];

        $sql = "UPDATE `user` SET `firstname`='$first_name',`middlename`='$middle_name',`lastname`='$last_name',`email`='$email',`subject`='$subject',`comment`='$comment' WHERE `id`='$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `user` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $first_name = $row['firstname'];

            $middlename = $row['middlename'];

            $lastname = $row['lastname'];

            $email = $row['email'];

            $subject  = $row['subject'];

            $comment = $row['comment'];

            $id = $row['id'];

        } 

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            First name:<br>

            <input type="text" name="firstname" value="<?php echo $first_name; ?>">

            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

            <br>

            Middle name:<br>

            <input type="text" name="middlename" value="<?php echo $middlename; ?>">

            <br>

            Last name:<br>

            <input type="text" name="lastname" value="<?php echo $lastname; ?>">

            <br>

            Email:<br>

            <input type="email" name="email" value="<?php echo $email; ?>">

            <br>

            Subject:<br>

            <input type="subject" name="subject" value="<?php echo $subject; ?>">

            <br>

            Comment:<br>

            <input type="comment" name="comment" value="<?php echo $comment; ?>">

            <br>

            <br><br>

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: View.php');

    } 

}

?> 