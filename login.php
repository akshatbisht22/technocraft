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
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <div id="container">
        <form method="post">
            <h2>Login </h2>
            <input type="email" name="logem" placeholder="Email Address" required/>
            <input type="password" name="logpass" placeholder="Password" required/>
            <br>
            <input type="submit" value="Login">
            <a href="signup.php">Create a New Account</a>
        </form>
    </div>
    <?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $emal = $_POST["logem"];
    $password = $_POST["logpass"]; 
    
    $sql = "select * from `userdata` where email='$emal'";
    $result = mysqli_query($connquery, $sql);

    $no = mysqli_num_rows($result);
    if($no == 1){
        while($row=mysqli_fetch_assoc($result)){
            if ($password == $row['password']){ 
                $login = true;

                session_start();
                $_SESSION['maroemail'] = $emal;
                $_SESSION['maropass'] = $password;
                echo '<meta http-equiv="refresh" content="0; url=dashboard.php">';
            } 
            else{
                echo '<script>alert("Invalid Credentials")</script>';
            }}}else{
                echo '<script>alert("No Account Found")</script>';
        }
    }
    
?>

</body>
</html>