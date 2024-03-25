<!Doctype html>
    <head>
    </head>
    </body>
        <?php
            
            $user = 'admin';
            $password = 'root';

            $current_user;

            if(!$current_user){
                ?>
                <div id="login">
                    <form method = "POST">
                        <h2>Login with provided credentials to continue</h2>
                        <br>
                        Username: <input type="text" name="name"><br><br>
                        Password: <input type="password" name="password"><br><br>
                        <cr><input type="submit" value="Login">
                    </form>
                </div>
                <?php
                if(!$_POST['name']){

                }else{
                if($_POST['name'] == $user && $_POST['password'] == $password){
                    $current_user = $_POST['name'];
                    ?>
                
                    <h1> <?php echo "welcome \t" . $current_user ?></h1>
                    <?php header("Location: addmentor.php"); ?>
                    <?php
                }elseif($_POST['name'] != $user && $_POST['password'] != $password){
                    echo "<h2 style='color:red'>Wrong credentials</h2>";
                }
            }
            }

        ?>
    </body>
</html>