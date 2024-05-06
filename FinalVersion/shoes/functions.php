<?php
if (!function_exists('pdo_connect_mysql')) {
    function pdo_connect_mysql() {
        // Update the details below with your MySQL details
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'shoes';
        try {
            return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        } catch (PDOException $exception) {
            exit('Failed to connect to database!');
        }
    }
}
if (!function_exists('template_header')) {
    // Template header, feel free to customize this
    function template_header($title) {
        // Check if the user is logged in
        if (isset($_SESSION['id'])) {
            // If logged in, display the header for logged-in users
            echo <<<EOT
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <title>$title</title>
                    <link href="style.css" rel="stylesheet" type="text/css">
                    <link href="style2.css" rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                    <style>
                        .btn-group {
                            display: flex;
                            gap: 10px;
                        }
                        .btn-group a:last-child {
                            white-space: nowrap;
                        }
                    </style>
                </head>
                <body>
                    <header>
                        <div class="content-wrapper">
                            <h1>Marikina Shoes</h1>
                            <nav>
                                <a href="index.php">Home</a>
                                <a href="index.php?page=products">Product</a>
                                <a href="index.php?page=about">About</a>
                                <a href="index.php?page=contact">Contact</a>
                                <a href="index.php?page=orders">Orders</a>
                            </nav>
            
                            <div class="register-icon">
                                <div class="container mt-3 btn-group">
                                    <a href="Login.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Account</a>
EOT;
            // Check if the user is an admin
            if (isset($_SESSION['admin']) && $_SESSION['admin']) {
                echo '<a href="dashboard.php" class="btn btn-outline-secondary"><i class="bi bi-house-door"></i> Dashboard</a>';
                echo '<a href="readproduct.php" class="btn btn-outline-secondary"><i class="bi bi-gear"></i>Manage Products</a>';
            }
            echo <<<EOT
                                </div>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.0/font/bootstrap-icons.css"></script>
                            </div>
                        </div>
                    </header>
                    <main>
            EOT;
        } else {
            // If not logged in, display the regular header
            echo <<<EOT
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <title>$title</title>
                    <link href="style.css" rel="stylesheet" type="text/css">
                    <link href="style2.css" rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                </head>
                <body>
                    <header>
                        <div class="content-wrapper">
                            <h1>Marikina Shoes</h1>
                            <nav>
                                <a href="index.php">Home</a>
                                <a href="index.php?page=products">Product</a>
                                <a href="index.php?page=about">About</a>
                                <a href="index.php?page=orders">Orders</a>
                            </nav>
            
                            <div class="register-icon">
                                <div class="container mt-3 btn-group">
                                    <a href="#" onclick="showLoginMessage()" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Account</a>
                                </div>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.0/font/bootstrap-icons.css"></script>
                            </div>
                        </div>
                    </header>
                    <main>
                    <script>
                        function showLoginMessage() {
                            window.location.href = 'Login.php';
                        }
                    </script>
            EOT;
        }
    }
}

if (!function_exists('template_footer')) {
    function template_footer() {
        $year = date('Y');
        echo <<<EOT
        </main>
        <footer class="footer" style="display: block;">
            <style>
                body {
                    color: #0D1B2A;
                    font-family: Arial, Helvetica, sans-serif;
                }
                .footer {
                    background-color: #FFFFFF;
                    padding-top: 20px;
                    width: 100%;
                    position: relative;
                    bottom: 0;
                }
                
                .footer-container {
                    max-width: 1440px;
                    padding-left: 48px;
                    padding-right: 48px;
                    width: 100%;
                    margin-left: auto;
                    margin-right: auto;
                }
                hr {
                    margin-top: 3%;
                }
                .footer-links {
                    width: auto;
                    position: relative;
                    display: flex;
                    height: 100%;
                }
                .logo {
                    padding-top: 0;
                    display: flex;
                    justify-content: flex-end;
                    width: 50%;
                }
                .footer-legal {
                    flex-direction: row;
                    display: flex;
                    align-items: flex-start;
                    padding-top: 27px;
                }
                .footer-legal-link {
                    margin-top: 0;
                    margin-left: 36px;
                }
                a {
                    text-decoration: none;
                    color: #0D1B2A;
                }
                a:hover {
                    text-decoration: underline;
                }
                .admin {
                    margin-left: 36px;
                }
            </style>
            <div class="footer-container">
                <div class="follow-us-on">
                    <h2>FOLLOW US ON</h2>
                    <p>See Social Media<p>                    
                </div>
                <hr>
                <div class="footer-links">
                    <div class="footer-legal">
                        <a class="footer-legal-link">FAQ</a>
                        <a class="footer-legal-link">Privacy Notice</a>
                        <a class="footer-legal-link">Cookie Notice</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
EOT;
    }
}
?>