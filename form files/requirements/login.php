<?php
include 'msessions.php';				//Write code to include msessions.php

if ($logged_in == true) {                              // If already logged in
    // header('Location: mentors.php');          			 // Redirect to mentors.php
    header('Location: mentors-insert-example.php');          			 // Redirect to mentors.php
    exit;                                      // Stop further code running
}    


if($_SERVER['REQUEST_METHOD'] == 'POST') {     // If form submitted
			$username_sent	= $_POST['username'];  // complete code for user name sent
			$password_sent	= $_POST['password'];  
      // complete code for user name sent
						// = $_POST['  '];  // complete code for password  sent
            
    if ($username_sent == $username_1 and $password_sent == $password_1) {// Insert code to test credentials for an
																			//authorized user
        $_SESSION["username"] = $username_sent;									
        login();                               // Call login function
        header('Location: mentors-insert-example.php');    						   // Redirect to mentors.php
        // header('Location: mentors.php');    						   // Redirect to mentors.php
        exit;                                  // Stop further code running
    }
	
	elseif ($username_sent == $username_2 and $password_sent == $password_2) {// Insert code to test credentials for an
																			//authorized user
																
        login();                                   // Call login function
        header('  ');    						   // Redirect to mentors.php
        exit;                                     // Stop further code running
    }else{
		echo "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Mentors System Login</title>    
     <meta charset="UTF-8">
	<style>
	body {
		background-color: lightgrey;
		color: red;
	}
	</style>
  </head>
  <body>
    <div >
      <div >
        <header>
          <a href="login.php"><img src="MSUM-Logo.png" alt="MSUM" height="70"></a>
        </header>
        <section>
		//Note that you will need to create a separate file, logout.php, so when that link is clicked, 
		//user is redirected to logout.php
        <?= $logged_in ? '<a href="logout.php">Log Out</a>' : '<a href="login.php">Log In</a>'; ?>
<h1>Login</h1>
<form method="POST" action="login.php">
  Username: <input type="text" name="username"><br><br>
  Password: <input type="password" name="password"><br><br>
  <input type="submit" value="Login">

</form>
   </section>
    </div>
  </body>
</html>