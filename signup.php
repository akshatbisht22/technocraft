<?php include 'conn.php';
    session_start();
    
    if(isset($_SESSION['maroemail'])){
        echo '<meta http-equiv="refresh" content="0; url=dashboard.php">';
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="signup.css">
</head>
<body>
    
    <div id="container">
        <form method="post">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $meranaam = $_POST['usname'];
                $emaal = $_POST['signem'];
                $pehlapass = $_POST['signcrpass'];
                $badkapass = $_POST['signconpass'];
                
                $sql = "select * from `userdata` where email='$emaal'";
                $result = mysqli_query($connquery, $sql);
            
                $no = mysqli_num_rows($result);
                if($no == 0){
                    if ($pehlapass == $badkapass) {
                        $ins = "insert into `userdata` (`sno`, `username`, `email`, `password`, `date`) VALUES (NULL, '$meranaam', '$emaal', '$pehlapass', current_timestamp())";
                        $ins_exe = mysqli_query($connquery,$ins);

                        session_start();
                        $_SESSION['maronaam'] = $meranaam;
                        $_SESSION['maroemail'] = $emaal;
                        $_SESSION['maropass'] = $pehlapass;

                        echo '<meta http-equiv="refresh" content="0; url=dashboard.php">';
                    }else{
                        echo '<div id="notmatchpass">Passwords do not match</div>';
                    }
                }else{
                    echo '<div id="notmatchpass">Account already exists. Login</div>';
                }
            }
        ?>
            <br>
            <h2>SignUp </h2>
            <input type="text" name="usname" placeholder="Create a Username" required/>
            <input type="email" name="signem" placeholder="Email Address" required/>
            <input type="password" name="signcrpass" placeholder="Create a Password" required/>
            <input type="password" name="signconpass" placeholder="Conform Password" required/>
            <br>
            <input type="checkbox"required/> I agree to the Terms and Conditions
            <br><br>
            <input type="submit" value="SignUp"><a href="login.php">Login to Existing Account</a>
        </form>
    </div>

</body>
</html>