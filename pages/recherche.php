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
    <title>gestion employés</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <a href="pages/ajouter.php" class="btn_add"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
            </svg>Ajouter</a>
            <a href="./pages/logout.php" class="btn_add">Deconnection</a>
            
            
            
    <table>
        <tr id="items">
            <th>nom</th>
            <th>prenom</th>
            <th>date_de_naissance</th>
            <th>ville_d_origine</th>
            <th>formation_de_base</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <!-- <tr>
            <td>KONKOBO</td>
            <td>Sabine</td>
            <td>01/01/1990</td>
            <td>kdg</td>
            <td>D-clic</td>
            <td><a href="pages/modifier.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-pencil" viewBox="0 0 16 16" style="margin-left: 40px;">
                        <path
                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                    </svg></a></td>
            <td><a href="a"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-trash" viewBox="0 0 16 16" style="margin-left: 60px;">
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                        <path
                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                    </svg></a></td>
        </tr> -->
        <?php 
        //inclure la page de connexion
            include_once "../pages/connexion.php";
            
            //requette pour afficher la liste des employés
            $terme=$con->real_escape_string($_GET['search']);
                                 
            $query = "SELECT * FROM employe WHERE id LIKE '%$terme' OR nom LIKE '%$terme%' OR prenom LIKE '%$terme%' OR date_de_naissance LIKE '%$terme%' OR formation_de_base LIKE '%$terme%' OR ville_d_origine LIKE '%$terme%'";
            $query_run = mysqli_query($con, $query);
            if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                ?>
                        <tr>
                            <td><?=$row['nom']?></td>
                            <td><?=$row['prenom']?></td>
                            <td><?=$row['date_de_naissance']?></td>
                            <td><?=$row['ville_d_origine']?></td>
                            <td><?=$row['formation_de_base']?></td>
                            <!-- nous allons mettre l'id de chaque employé dans ce lien -->
                            <td>
                                <a href="pages/modifier.php?id=<?=$row['id']?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-pencil" viewBox="0 0 16 16" style="margin-left: 40px;">
                                    <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a href="pages/supprimer.php?id=<?=$row['id']?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16" style="margin-left: 60px;">
                                    <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                    <path
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>

    
                        <?php
                    }


                }

            ?>
        <?php
}else{
    header("Location: home.php");
          exit();
}
?>
    </table>
    </div>
</body>

</html>