<?php
    include 'msessions.php';
    echo "welcome".$_SESSION['username'];
    ?>
    <form method="POST" action="mentors-insert.php">
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
        <input type="checkbox" id="CIT" name="CIT" value="CIT">
        <label > Computer Information Technology</label><br>
        <input type="checkbox" id="CIS" name="CIS" value="CIS">
        <label > Computer Information Systems</label><br><br>
        <br><br>

        <input type="reset" > 
        <input type="submit" value="Save">

    </form>
    <?php
?>
