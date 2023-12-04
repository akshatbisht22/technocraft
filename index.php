<?php include 'conn.php';
    session_start();
    
    if(isset($_SESSION['maroemail'])){
        echo '<meta http-equiv="refresh" content="0; url=dashboard.php">';
    }

?>
<!DOCTYPE html>
<html onkeypress="scr()" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Registration Project</title>

    <link rel="stylesheet" href="index.css">
</head>
<body>

    <script>
        function scr(){
            window.scrollBy(0,999)
        }
    </script>
    <div id="top" onclick="scr()">
        <h1>WELCOME TO THE TECHNOCRAFT EXHIBITION</h1>
        <p>Scroll down &downarrow;</p>
    </div>


    <br><br><br><br><br>
    
    <div id="mid" class="s">
        <p>AKSHAT PRESENTS</p>
        <h1 id="midh1">DASHBOARD SYSTEM WITH AUTHENTICATION</h1>
        <p id="midp">Made with PHP , MySQL , Javascript and CSS</p>
        <button><a href="login.php">START</a></button>
    </div>
    
    
</body>
</html>