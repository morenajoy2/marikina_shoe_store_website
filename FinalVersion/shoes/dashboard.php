<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
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
                margin:10px;
                font-style: bold;

                font-size: 40px;
                color:white;
            }

            .subtitle{
                font-size: 15px;
                padding-top: 20px;
                background-color: #778da9;
            }

            .main-body{
                margin:20px;
                margin-top: -10px;
            }

            .main-body h3{
                padding:10px;
                margin-left:10px;
                color: white
            }

            .row {
                color:white;
                position: relative;
                justify-content: center;
                

            }

            .row-1 {
                padding:10px;
                display:flex;
                margin:5px;
                margin-bottom:8px;

            }
            .row-title{
                background: #b7d1f3;
                padding:15px;
            }

            .row-title p{
                background: #b7d1f3;
                font-size: 20px;
            }

            .row-subtitle{
                background: #b7d1f3;
                padding:25px;
            }

            .row-subtitle h2{
                font-size: 25px;
                display:flex;
            }
            .row-2{
                background: #b7d1f3;
                padding-left:22px; 
            }
            .row-2-user{
                background: #b7d1f3;
                padding-left:22px;
                margin-bottom:23px;
            }
            .row-3 {
                background: #b7d1f3;
                font-size:12px;
                color: black;
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
                    <a href="index.php"><button class="logout-btn">Return</button></a>
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
                         Hi, Admin!
                        <p class="subtitle">Ready to start your day with some orders?</p>
                    </div>
                    
                </div>

                <div class="main-body">
                    <h3>Overview<h3>
                    
                    <div class="row">
                        <div class="row-1">
                            <div class="row-title">
                                <p>Total Users</p>
                                    <?php
                                        include("php/config.php");
                                        $dash_user_query = "SELECT * from users";
                                        $dash_user_query_run = mysqli_query($con, $dash_user_query);

                                        if($user_total = mysqli_num_rows($dash_user_query_run)) {
                                            echo '<h2 class="row-subtitle h2">'.$user_total.'</h2>';
                                        } else {
                                            echo '<h2 class="row-subtitle h2">0</h2>';
                                        }
                                    ?>
                                <div class="row-2-user">
                                    <a class="row-3" href="#"></a>
                                </div>
                            </div>
                            
                            
                            <div class="row-title">
                            <p>Total Products</p>
                                
                            <?php
                                include("php/config.php");
                                $dash_products_query = "SELECT * from products";
                                $dash_products_query_run = mysqli_query($con, $dash_products_query);

                                if($products_total = mysqli_num_rows($dash_products_query_run)) {
                                    echo '<h2 class="row-subtitle h2">'.$products_total.'</h2>';
                                } else {
                                    echo '<h2 class="row-subtitle h2">0</h2>';
                                }
                            ?>
                            <div class="row-2">
                                <a class="row-3" href="readproduct.php">View</a>
                            </div>
                            </div>
                            
                        
                            
                            <div class="row-title">
                                <p>Total Messages</p>
                            <?php
                                include("php/config.php");
                                $dash_message_query = "SELECT * from contact";
                                $dash_message_query_run = mysqli_query($con, $dash_message_query);

                                if($message_total = mysqli_num_rows($dash_message_query_run)) {
                                    echo '<h2 class="row-subtitle h2">'.$message_total.'</h2>';
                                } else {
                                    echo '<h2 class="row-subtitle h2">0</h2>';
                                }
                            ?>
                            <div class="row-2">
                                <a class="row-3" href="message.php">View</a>
                            </div>
                            </div>
                            
                        
                            
                            <div class="row-title">
                            <p>Total Orders</p> 
                            <?php
                                include("php/config.php");
                                $dash_orders_query = "SELECT * from orders"; 
                                $dash_orders_query_run = mysqli_query($con, $dash_orders_query);

                                if($orders_total = mysqli_num_rows($dash_orders_query_run)) {
                                    echo '<h2 class="row-subtitle h2">'.$orders_total.'</h2>';
                                } else {
                                    echo '<h2 class="row-subtitle h2">0</h2>';
                                }
                            ?>
                            <div class="row-2">
                                <a class="row-3" href="myorder.php">View</a>
                            </div>
                            </div>

                            <div class="row-title">
                                <p>Income</p> 
                                <?php
                                    include("php/config.php");
                                    $dash_totalprice_query = "SELECT price, quantity FROM orders"; 
                                    $dash_totalprice_query_run = mysqli_query($con, $dash_totalprice_query);
                                    $totalprice = 0;

                                    if(mysqli_num_rows($dash_totalprice_query_run) > 0) {
                                        while($row = mysqli_fetch_assoc($dash_totalprice_query_run)) {
                                            // Calculate total price for each order and sum them up
                                            $totalprice += $row['quantity'] * $row['price'];
                                        }
                                        echo '<h2 class="row-subtitle h2"> $'.$totalprice.'</h2>';
                                    } else {
                                        echo '<h2 class="row-subtitle h2">0</h2>';
                                    }
                                ?>
                                <div class="row-2-user">
                                    <a class="row-3" href="#"></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>