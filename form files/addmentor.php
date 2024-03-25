
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    <form method="POST" action='insert.php'> 
    <centre><h3>Mentorship Details</h3></centre>    
    <div>
            Name:<br>
            <input type="text" name="fname" placeholder="first nateame"><input type="text" name="lname" placeholder="last name">

            Your Gender
            <select name="gender" >
                <option value="--">--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br><br>

            Preferred Mentor Gender
            <select name="mgender" >
                <option value="--">--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br><br>

            Language Proficiencies
            <input type="text" name="language" placeholder="language">

            <div>
                <h3>Your Personal information</h3><br>
                Tell us something about yourself<br>
                <textarea id="personalinfo" name="personalinfo" rows="4" cols="50"></textarea><br><br>

                where do you see yourself in five years<br>
                <textarea id="future" name="future" rows="4" cols="50"></textarea><br><br>

                What are your expectations in this mentoring program<br>
                <textarea id="expectation" name="expectation" rows="4" cols="50"></textarea><br>
            </div>

            <br><br>
            <input type="submit" value="Save Mentorship info">
        </div>
    </form>

    <div>
        <h2>Mentors List</h2>
        <?php
            require 'connection.php';
            $sql1 = "SELECT * FROM mentors";
            $res = $conn->query($sql1);
            ?>
            <table>
                <tr>
                    <th>Names</th>
                    <th>Gender</th>
                    <th> Mentor gender</th>
                    <th>Proficient languages</th>
                    <th>Personal Info</th>
                    <th>5 year expecation</th>
                    <th>Mentorship expecation</th>
                </tr>
            
            <?php
            if($res->num_rows > 0){
                while ($row = $res->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>". $row['fName'].$row['lName']."</td>";
                    echo "<td>". $row['gender']."</td>";
                    echo "<td>". $row['language']."</td>";
                    echo "<td>". $row['mentor_gender']."</td>";
                    echo "<td>". $row['personal_info']."</td>";
                    echo "<td>". $row['five_year_expectation']."</td>";
                    echo "<td>". $row['five_year_expectation']."</td>";
                    echo "</tr><br>";
                }
            }
            echo "</table>";
        ?>
    </div>