1. How to run the program
   
    - in your machine start a localserver instance on any available port to run the php files 
        i.e (php -S localhost:8000)
   
    - import the information.sql file into your database

   
    - connection setting for database are available in the connection.php file
        i.e change the pre-set config to your current config usage(host,username,password,database_name)

    - run the index.php files
        i.e localhost:8000/index.php
    
    -on succesfull running it will display a login screen and you can input the static username and password   
        username = admin,  
        password = root

    -On succesful login it will redirect you to the data entry form where yu can fill the form and submit the values to the database

    -Below the form is a represenatation of data inserted in the db, if no data exists it will be blank


2. Files include:
    -connection.php => has connection settings to the database
    -index.php => has the logic logic and input fields
    -addmentor.ph => contains the form to insert a mentor_gender
    -insert.php => contains logic function to save the form to a database

    information.sql => this is the current database in use you can import it to your database 