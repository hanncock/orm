<?php
$type     = 'mysql';                 // Type of database
$server   = 'localhost';             // Server the database is on
$db       = 'mentors';             // Name of the database
$port     = '';                      // Port is usually 8889 in MAMP and 3306 in XAMPP
$charset  = 'utf8mb4';               // UTF-8 encoding using 4 bytes of data per character

$username = 'soke';         // Enter YOUR username here
$password = '';         // Enter YOUR password here


$first_name     = '';
$last_name     = '';
$eml = '';
$new_id = '';
$b = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $first_name   = $_POST['firstname'];			
	$last_name   = $_POST['lastname'];			//Modify code appropriately
  $eml = $_POST['email'];					//Modify code appropriately
  $phone = $_POST['phone'];					//Modify code appropriately
  $address = $_POST['address'];					//Modify code appropriately
  $highestDegree = $_POST['education'];					//Modify code appropriately
  $graduationYear = $_POST['graduationYear'];					//Modify code appropriately
  $mentoringinterests = [$_POST['CS'],$_POST['Sec'],$_POST['CIT'],$_POST['CIS']];					//Modify code appropriately
										


// DO NOT CHANGE ANYTHING BENEATH THIS LINE
$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset"; // Create DSN
try {                                                               // Try following code
    $pdo = new PDO($dsn, $username, $password);           // Create PDO object
	
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//SQL statement to insert new mentor in database table
	//Modify code appropriately to include necessary fields

	$sql = "INSERT INTO mentors 
    (firstname, lastname, email, telephone, address, highestDegree, graduationYear, mentoringinterests)
      VALUES 
   ('$first_name', '$last_name', '$eml','$phone','$address','$highestDegree','$graduationYear','$mentoringinterests');";
			
			
	$b = $pdo->exec($sql);
	
	//This is used to get ID of teh last insert
	$new_id = $pdo->lastInsertId();
	
	
} catch (PDOException $e) {                                         // If exception thrown
    throw new PDOException($e->getMessage(), $e->getCode());   
    return $e->getMessage();     // Re-throw exception
}

$pdo = null;     	//Close connection to database
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Assignment 4</title>
    
     <meta charset="UTF-8">
	<style>
	body{color: "red";}
	</style>
  </head>
  <body>
    <div >
      <div >
        <header>
          <a href="index.php"><img src="MSUM-Logo.png" alt="MSUM" height="70"></a>
        </header>
        <section>

<form action="" method="POST">
        Name:<br>
        <input type="text" name="firstname" placeholder="first name"><input type="text" name="lastname" placeholder="last name"><br><br>

        Email:<br>
        <input type="email" name="email" placeholder="email"><br><br>

        Telephone:<br>
        <input type="tel" id="phone" name="phone" ><br><br>

        Address:<br>
        <textarea id="address" name="address" rows="4" cols="50"></textarea><br><br>

        <p>Highest Degree:</p>
        <input type="radio" id="Bachelors" name="education" value="Bachelors">
        <label >Bachelors</label><br>
        <input type="radio" id="Msc." name="education" value="Msc.">
        <label >Msc.</label><br>
        <input type="radio" id="PhD" name="education" value="PhD">
        <label >PhD.</label>
        <br>  <br>

        Graduation Year;
        <select id="graduationYear" name="graduationYear">
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
        </select><br><br>

        Mentoring Interest:<br>
        <input type="checkbox" id="CS" name="CS" value="CS">
        <label > Computer Science</label><br>
        <input type="checkbox" id="Sec" name="Sec" value="Sec">
        <label > Cybersecurity</label><br>
        <input type="checkbox" id="CIS" name="CIS" value="CIS">
        <label > Computer Information Systems</label><br>
        <input type="checkbox" id="CIS" name="CIS" value="CIS">
        <label > Computer Information Systems</label><br><br>
        <br><br>

        <input type="reset" > 
        <input type="submit" value="Save">

</form>

<?php if($b==1){
	 	
	echo 'New Record is saved. The ID is: ';
	echo $new_id;
	echo '. You may enter next record';
	}
?>
      </section>
      </div>
    </div>
  </body>
</html>