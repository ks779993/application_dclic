<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <?php 
    //verifier que le bouton ajouter a bien été cliqué
    if(isset($_POST['button'])){
    //extraction des informations envoyer dans des variables par la methode POST
    extract(($_POST));
    //verifier que tous les champs on été bien remplis
    if(isset($nom) && isset($prenom) && isset($date_de_naissance) && isset($ville_d_origine) && isset($formation_de_base)) {
        //conexion à la base de donnée
        require_once "connexion.php";
        //requète d'ajout
        $req = mysqli_query($con , "INSERT INTO employe VALUES(NULL, '$nom', '$prenom', '$date_de_naissance', '$ville_d_origine', '$formation_de_base')");
        if($req){//si la requète a été traité avec succès , on fait une redirection 
        }else{//si non
            $message = "employe non ajouté";

        }
    }else{
        //si non
        $message = "Veuillez remplir tous les champs !";
    }
    }
    
    ?>
    <div class="form">
        <a href="../index.php" class="back_btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
           </svg>Retour</a>
        <h2>Ajouter un employé</h2>
        <p class="erreur_message">
            <?php
            //si la variable message existe , affichons son contenu
            if(isset($message)){
                echo "$message";
            }
            ?> 
        </p>
        <form action="" method="POST">
            <label>nom</label>
            <input type="text" name="nom">
            <label>prenom</label>
            <input type="text" name="prenom">
            <label>date_de_naissance</label>
            <input type="date" name="date_de_naissance">
            <label>ville_d_origine</label>
            <input type="text" name="ville_d_origine">
            <label>formation_de_base</label>
            <input type="text" name="formation_de_base">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>