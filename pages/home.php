<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style2.css">
    <title>home</title>
</head>
<body>
    <h1>hello, <?php echo $_SESSION['name']; ?></h1> <br>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
}else{
    header("Location: home.php");
          exit();
}
?>