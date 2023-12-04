<?php include 'conn.php'; 
session_start();

if(!isset($_SESSION['maroemail'])){
    echo '<meta http-equiv="refresh" content="0; url=login.php">';
}

$eml = $_SESSION['maroemail']; 

$select = "select * from `userdata` where email='$eml'";
$select_exe = mysqli_query($connquery,$select);

$fetch = mysqli_fetch_assoc($select_exe);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div id="container">
        <h2>Dashboard</h2>  
        <p>Welcome  <?php echo $fetch['username']?></p>
        <br><br>
        <h3>Account Details</h3>
        <p>Username :  <?php echo $fetch['username']?></p>
        <p>Email Address : <?php echo $fetch['email']?> </p>
        <p>Date of Creation :  <?php echo $fetch['date']?></p>
        <br><br>
        <a href="logout.php">Logout</a>
        <br><br><br><br>
    </div>
</body>
</html>