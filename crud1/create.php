<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "config.php";

if (isset($_POST['submit'])) {

    $first_name = $_POST['firstname'];
    $middle_name = $_POST['middlename'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO `user`(`firstname`,`middlename`, `lastname`, `email`, `subject`, `comment`) VALUES ('$first_name','$middle_name','$last_name','$email','$subject','$comment')";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "New record created successfully.";
        header("Location: create.php"); // Redirect to the contact page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
</head>
<body style="background-color: #0D1B2A">
<header style="display: block;">
    <div class="nav-bar-main">
        <div class="nav-bar-inner">
            <div class="nav-bar-content">
                <div class="nav-bar-logo">
                    <h1>LOGO</h1>
                </div>
                <ul class="nav-bar-list">
                    <li class="nav-bar-dropdown"><a href="#">HOME</a></li>
                    <li class="nav-bar-dropdown"><a href="#">PRODUCT</a></li>
                    <li class="nav-bar-dropdown"><a href="#">ABOUT</a></li>
                    <li class="nav-bar-dropdown"><a href="#">CONTACT</a></li>
                    <li class="nav-bar-dropdown"><a href="#">ORDERS</a></li>
                </ul>
                <div class="nav-bar-register-button">
                    <button type="button"><a href="#">REGISTER</a></button>
                    </div>
            </div>
        </div>
    </div>
</header>
    <div class="div-1">Contact Us</div>
    <div></div>
    
<form action="create.php" method="post">

    <div class="div-2">
        <input type="text" class="box" placeholder="First Name">
        <input type="text" class="div-3" placeholder="Middle Name">
        <input type="text" class="div-4" placeholder="Last Name">
    </div>
    <div class="div-5">
  <input type="text" name="google_address" placeholder="Google Address" value="" class="box">
</div>
<div class="div-6">
  <input type="text" name="subject" placeholder="Subject" class="box">
</div>
<div class="div-7">
  <textarea name="comment" placeholder="Comment" class="box"></textarea>
</div>
    <div class="div-8">
      <input type="submit" class="div-9" value="Submit">
      <input type="button" class="div-10" value="Close">
    </div>
    </div>
</form>
  <div class="div-22"></div>

</body>
</html>


<style>
.div-1 {
    color: #fff;
    text-transform: uppercase;
    align-self: start;
    margin: 78px 0 0 400px;
    font: 50px Inter, sans-serif;
  }
  @media (max-width: 991px) {
.div-1 {
      font-size: 40px;
      margin: 40px 0 0 10px;
    }
  }
.div-2 {
    align-self: center;
    display: flex;
    margin-top: 52px;
    width: 750px;
    max-width: 100%;
    gap: 100px;
    color: rgba(255, 255, 255, 0.5);
    justify-content: space-between;
    margin-left: 825px;
    display: flex;
    margin-left: 605px;
  }
  @media (max-width: 991px) {
.div-2 {
      flex-wrap: wrap;
      margin-top: 40px;
    }
  }
.box {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    border-radius: 5px;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;
    border-color: rgba(255, 255, 255, 1);
    border-style: solid;
    border-width: 1px;
    background-color: rgba(119, 141, 169, 0.5);
    align-items: start;
    justify-content: center;
    padding: 15px;
    width: 170%;
    max-width: 100%;
    box-sizing: border-box;
    font-weight: bold;
    color: white;
  }
  @media (max-width: 991px) {
    .box {
      padding-right: 20px;
    }
  }
.div-3 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    border-radius: 5px;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;
    border-color: rgba(255, 255, 255, 1);
    border-style: solid;
    border-width: 1px;
    background-color: rgba(119, 141, 169, 0.5);
    align-items: start;
    justify-content: center;
    padding: 15px;
    margin-left: auto;
    width: 170%;
    max-width: 590px;
    font-weight: bold;
    color: white;
  }
  @media (max-width: 991px) {
.div-3 {
      padding-right: 20px;
    }
  }
.div-4 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    border-radius: 5px;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;
    border-color: rgba(255, 255, 255, 1);
    border-style: solid;
    border-width: 1px;
    background-color: rgba(119, 141, 169, 0.5);
    align-items: start;
    justify-content: space-between;
    padding: 15px;
    width: 170%;
    display: flex;
    font-weight: bold;
    color: white;
  }
  @media (max-width: 991px) {
.div-4 {
      padding-right: 20px;
    }
  }   
  .div-5 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    border-radius: 5px;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;
    align-self: center;
    margin-top: 10px;
    width: 750px;
    max-width: 100%;
    align-items: start;
    color: rgba(255, 255, 255, 0.5);
    justify-content: center;
    padding: 13px 15px;
    margin-left: 590px;
    font-weight: bold;

  }
  @media (max-width: 991px) {
    .div-5 {
      padding-right: 20px;
    }
  }
  .div-6 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    border-radius: 5px;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;
    align-self: center;
    margin-top: 10px;
    width: 750px;
    max-width: 100%;
    align-items: start;
    color: rgba(255, 255, 255, 0.5);
    white-space: nowrap;
    justify-content: center;
    padding: 13px 15px;
    margin-left: 590px;
    font-weight: bold;

  }
  @media (max-width: 991px) {
    .div-6 {
      padding-right: 20px;
      white-space: initial;
    }
  }
  .div-7 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    border-radius: 5px;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;
    align-self: center;
    margin-top: 10px;
    width: 750px;
    max-width: 100%;
    align-items: start;
    color: rgba(255, 255, 255, 0.5);
    white-space: nowrap;
    padding: 15px 15px 138px;
    margin-left: 590px;
  }
  @media (max-width: 991px) {
    .div-7 {
      white-space: initial;
      padding: 0 20px 40px 0;
    }
    
  }
  .div-8 {
    align-self: end;
    display: flex;
    gap: 10px;
    white-space: nowrap;
    margin: 25px 206px 0 0;
    margin-left: 1150px;
  }
  @media (max-width: 991px) {
    .div-8 {
      margin-right: 10px;
      white-space: initial;
    }
  }
  .div-9 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    border-radius: 5px;
    background-color: #778da9;
    color: #fff;
    justify-content: center;
    padding: 16px 28px;
   
  }
  @media (max-width: 991px) {
    .div-9 {
      white-space: initial;
      padding: 0 20px;
    }
  }
  .div-10 {
    leading-trim: both;
    text-edge: cap;
    font-family: Inter, sans-serif;
    border-radius: 5px;
    background-color: #fff;
    color: #0d1b2a;
    justify-content: center;
    padding: 16px 34px;
  
  }
  @media (max-width: 991px) {
    .div-10 {
      white-space: initial;
      padding: 0 20px;
    }
  }
  .div-11 {
    background-color: #fff;
    min-height: 168px;
    margin-top: 122px;
    width: 100%;
  }
  @media (max-width: 991px) {
    .div-11 {
      max-width: 100%;
      margin-top: 40px;
    }
  }
</style>