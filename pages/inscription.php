<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style2.css">
    <title>espace de connection admin</title>
</head>
<body>
    <form action="login.php" method="POST">
        <h2>CONNECTION</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
        <label>Email</label>
        <input type="text" name ="email" placeholder="email">
        <label>Mot de Passe</label>
        <input type="password" name ="password" placeholder="password">
        <button type="submit" href="../index.php"> Connecter</button>
    </form>
</body>
</html>