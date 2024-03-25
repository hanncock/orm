<?php
    require 'connection.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $mgender = $_POST['mgender'];
    $language = $_POST['language'];
    $personalinfo = $_POST['personalinfo'];
    $future = $_POST['future'];
    $expectation = $_POST['expectation'];

    $sql ="INSERT INTO mentors (fName,lName,gender,mentor_gender,language,personal_info,five_year_expectation,mentoring_expectation) 
                VALUES
            ('$fname','$lname','$gender','$mgender','$language','$personalinfo','$future','$expectation')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: addmentor.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
?>