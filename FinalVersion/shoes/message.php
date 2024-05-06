
<!DOCTYPE html>
<html>
    <head>
        <title>Messages</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            * {
                margin:auto;
                padding:auto;
                background-color: #0d1b2a;
                font-family: 'Poppins', sans-serif;
            }

            .dash-container{
                padding-top:20px;
                margin:auto;
                flex-direction: row;
            }

            .dash-container-row {
                display: flex;
            }

            h1{
                color: white;
                padding: 10px;
                font-size: 45px;
            }

            .date {
                color: white;
                margin: auto;
                padding:20px;
            }

            .date b{
                color: rgba(119, 141, 169, 1);
            }

            .logout .logout-btn {
                padding: 10px 20px;
                margin:auto;
                background-color: #778da9;
                color: white;
                font-size: 15px;
            }

            .body-center{
                display:flex;
            }

            .side-menu{
                padding:auto;
                flex-direction: column;
            }

            .side-menu-leftcolumn{
                padding:auto;
                padding:5px;
                padding-left:40px;
            }

            
            .btn-menu {
                padding: 10px;
                font-size: 18px;
                font-family: Inter, sans-serif;
                margin: auto;
                border-top: none;
                border-right: none;
                border-left: none;
                border-top:10px;
                padding-bottom: 2px;
                padding-top: 30px;
                padding-bottom:10px;
                color: white;
                border-color: white;
            }

            .menu-icon {
                aspect-ratio: 1;
                object-fit: auto;
                object-position: center;
                width: 18px;
                margin-right: 20px;
            }

            .body-container{
                display: flex;
                 flex-direction: column;
                flex-grow: 1;
                flex-basis: 0;
                width: fit-content;
                margin: 40px;
            }

            .body-container-header{
                border-radius: 5px;
                display: flex;
                padding:20px;
                margin:20px;
                display: center;
                background-color: #778da9;
            }

            .body-container-header-title{
                padding:20px;
                background-color: #778da9;
                margin:auto;

                font-size: 40px;
                color:white;
            }

            .icon-header{
                width: 38px;
                margin-right: 20px;
                background-color: #778da9;
            }

            .body-container-header-search{
                padding:20px;
                background-color: #778da9;
                margin:auto;
                font-size: 42px;
            }

            .input-search{
                padding:10px;
                font-size: 15px;
                width: 250px;
                color: white;
                border: none;
                background-color: #778da9;
            }

           ::placeholder{
                color: white;
            }

            .btn-search{
                padding:10px; 
                margin:10px;
                background-color: #778da9;
                color:white;
                border-radius: 5px;
                border-color: lightgray;
            }

            .table-display{
                margin:20px;
                margin-top: -10px;
            }

            table {
                width: 100%;
                border-collapse: collapse;            
            }

            th, td {
                border: 1px solid #fff;
                padding: 15px;
                color: #fff;
                text-align: left;

            }



        </style>
    </head>
    <body>
        <div class="dash-container">
            <div class="dash-container-row">
                <h1 class="logo">Marikina Shoes</h1>

                <div class="date">
                <?php
                        echo $date = date("<b >D</b>, d M Y ");
                        ?> 
                </div>

                <div class="logout">
                    <a href="home.php"><button class="logout-btn">Return</button></a>
                </div> 
            </div>     
        </div>

        <div class="body-center">
            <div class="side-menu">
                <div class="side-menu-leftcolumn">
                    <div >
                        <a href="dashboard.php"><button class="btn-menu">
                            <img src="imgs/dashboard.png" alt="" class="menu-icon"/> Dashboard </button></a>
                    </div>
                    <div >
                        <a href="order dash.php"><button class="btn-menu">
                            <img src="imgs/order.png" alt="" class="menu-icon"/>  Orders</button></a>
                    </div>
    
                    <div >
                        <a href="message.php"><button class="btn-menu">
                            <img src="imgs/message.png" alt="" class="menu-icon"/>  Messages</button></a>
                    </div>
                </div>
            </div>
    
            <div class="body-container">
                <div class="body-container-header">

                    <div class="body-container-header-title">
                        <img src="imgs/message.png" alt="" class="icon-header"/> Messages
                    </div>
                    <form action="" method="GET">
                    <div class="body-container-header-search">
                        <input type="text" name="search" value="<?php 
                          if (isset($_GET['search'])){
                            echo $_GET['search'];
                          }?>" placeholder="Search.." class="input-search" />
                        <button class="btn-search">SEARCH</button>

                    </div>
          </form>
                </div>

                <div class="table-display">
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>


                <!-- display table with search button -->
                <?php
                // Connect to the database
                $con = mysqli_connect("localhost", "root", "", "shoes");

                if(isset($_GET['search'])){
                    $filter = $_GET['search'];
                    $query = "SELECT * FROM contact WHERE CONCAT(id, firstName, middleName, lastName, email, subject, message) LIKE '%$filter%' ";

                    $query_run = mysqli_query($con, $query);


                    if(mysqli_num_rows($query_run) > 0){
                        while($row = mysqli_fetch_assoc($query_run)){
                        ?>

                        
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['firstName']; ?></td>
                                <td><?= $row['middleName']; ?></td>
                                <td><?= $row['lastName']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['subject']; ?></td>
                                <td><?= $row['message']; ?></td>
                            </tr>

                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="7">No Record Found</td></tr>';
                    }
                } else {
                ?>

                <!-- display table with no search button -->
                <?php 
                    $conn = mysqli_connect("localhost", "root", "", "shoes");
                    if ($conn ->  connect_error) {
                        die("Connection failed:" . $conn-> connect_error);
                    }

                    $sql = "SELECT * from contact";
                    $display = $conn -> query($sql);

                    if($display -> num_rows > 0) {
                        while ($row_table = $display -> FETCH_ASSOC()) {
                            echo "<tr>
                            <td>" . $row_table["id"] . "</td>
                            <td>" . $row_table["firstName"] . "</td>
                            <td>" . $row_table["middleName"] . "</td>
                            <td>" . $row_table["lastName"] . "</td>
                            <td>" . $row_table["email"] . "</td>
                            <td>" . $row_table["subject"] . "</td>
                            <td>" . $row_table["message"] . "</td>
                            </tr>";
                        }
                    } else {
                        echo '<tr><td colspan="7">No Record Found</td></tr>';
                    }
                    $conn -> close();
                }
                ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>