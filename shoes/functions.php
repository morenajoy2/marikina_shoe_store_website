<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'shoes';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// Template header, feel free to customize this
function template_header($title) {
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
		    <a href="index.php?page=contact">Contact</a>
		    <a href="index.php?page=orders">Orders</a>
                </nav>

		<div class="register-icon">
		<div class="container mt-3">
        <a href="index.php?page=readproduct" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Register</a>
    </div>
    <!-- Include Bootstrap Icons library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.0/font/bootstrap-icons.css"></script>
	</div>

            </div>
        </header>
        <main>

EOT;
}


// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year Marikina Shoes</p>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>