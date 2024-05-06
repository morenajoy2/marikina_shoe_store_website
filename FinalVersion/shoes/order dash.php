<!DOCTYPE html>
<html>
    <head>
        <title>Orders</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            * {
                margin:auto;
                padding:auto;
                background-color: #0d1b2a;
                font-family: 'Poppins', sans-serif;
            }

            .dash-container{
                /* padding:5px; */
                padding-top:20px;
                /* margin:30px; */
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
                /* margin-left: 280px; */
                margin: auto;
                padding:20px;
            }

            .date b{
                color: rgba(119, 141, 169, 1);
            }

            .logout .logout-btn {
                /* margin: 10px 20px; */
                padding: 10px 20px;
                /* margin-left: 420px;
                margin-top: 10px; */
                margin:auto;
                background-color: #778da9;
                color: white;
                font-size: 15px;
            }

            .body-center{
                display:flex;
            }

            .side-menu{
                /* padding:5px; */
                padding:auto;
                /* margin:30px; */
                flex-direction: column;
            }

            .side-menu-leftcolumn{
                /* display: flex; */
                padding:auto;
                padding:5px;
                padding-left:40px;
                /* margin:30px; */
            }

            
            .btn-menu {
                padding: 10px;
                /* margin: 20px; */
                font-size: 18px;
                font-family: Inter, sans-serif;
                /* margin: auto 0; */
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
                /* margin-right:160px; */
                margin:auto;

                font-size: 40px;
                color:white;
                /* margin-bottom: 5px; */
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
                /* margin-left:160px; */
                font-size: 42px;
                /* margin-bottom: 5px; */
            }

            .input-search{
                padding:10px;
                font-size: 15px;
                width: 250px;
                color: white;
                border: none;
                background-color: #778da9;
                /* margin: 5px; */
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
                /* margin-top: 20px; */
            
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
                        <img src="imgs/order.png" alt="" class="icon-header"/> Orders
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
                        <th>Title</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Image</th>
                    </tr>

                <?php
                // Connect to the database
                require 'functions.php';
                $pdo = pdo_connect_mysql();

                $stmt = $pdo->query('
                SELECT o.*, u.Email AS email, u.MobileNumber AS mobile_number
                FROM orders o
                JOIN users u ON o.email = u.Email
                ');
                // Fetch all columns from the orders table
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $row['Title'] . '</td>';
                    echo '<td>' . $row['Brand'] . '</td>';
                    echo '<td>' . $row['Price'] . '</td>';
                    echo '<td>' . $row['Quantity'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['mobile_number'] . '</td>';
                    echo '<td><img src="imgs/' . $row['img'] . '" width="50" height="50" alt="' . $row['Title'] . '"></td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>


