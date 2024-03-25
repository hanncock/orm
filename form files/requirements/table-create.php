<?php
$type     = 'mysql';                // Type of database
$server   = 'localhost';            // Server the database is on
$db       = '';             		// Insert the name of your database
$port     = '';                     // Port is usually 8889 in MAMP and 3306 in XAMPP. No change needed
$charset  = 'utf8mb4';              // UTF-8 encoding using 4 bytes of data per character

$username = 'soke';         			// Insert YOUR database username here
$password = '';         			// Insert YOUR database password here


// DO NOT MAKE ANY CHANGES IN THIS LINE OF CODE
$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset"; // Create DSN


try {                                                               // Try following code
    $pdo = new PDO($dsn, $username, $password);          			// Create PDO object
	
	//SETTING PDO ERROR MODE TO EXCEPTION
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
//This sql code creates a table, called testTable. Test the code to see how it runs, Then moodify code, appropriately	
	// $sql = "CREATE TABLE testTable (id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	// 		firstname VARCHAR(30) NOT NULL, 
	// 		lastname VARCHAR(30) NOT NULL, 
	// 		email VARCHAR(50) NOT NULL UNIQUE);"; 
			$sql = "CREATE TABLE IF NOT EXISTS `mentors`(
        id int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR (30)NOT NULL,
        lastname VARCHAR (30)NOT NULL,
        email VARCHAR (30)NOT NULL UNIQUE,
        telephone VARCHAR (30)NOT NULL,
        address VARCHAR (30)NOT NULL,
        highestDegree VARCHAR (30)NOT NULL,
        graduationYear VARCHAR (30)NOT NULL,
        mentoringinterests VARCHAR (30)NOT NULL
      )";
			
	$pdo->exec($sql);
	
	echo "A new table has been created successfully";
	
} catch (PDOException $e) {                                         // If exception thrown
    throw new PDOException($e->getMessage(), $e->getCode());        // Re-throw exception
}

$pdo = null;     	//Close connection to the database

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Creating a New Table in a database</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
  </head>
  <body>
  
  </body>
</html>