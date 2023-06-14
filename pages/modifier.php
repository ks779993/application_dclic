<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php 

          //conexion à la base de donnée
          require_once "connexion.php";
           //on recupère le id dans le lien
           $id = $_GET['id'];
           //requète pour afficher les infos d'un employé
           $req = mysqli_query($con , "SELECT * FROM employe WHERE id = $id");
           $row = mysqli_fetch_assoc($req);

         //verifier que le bouton ajouter a bien été cliqué
         if(isset($_POST['button'])){
            //extraction des informations envoyer dans des variables par la methode POST
            extract(($_POST));
            //verifier que tous les champs on été bien remplis
            if(isset($nom) && isset($prenom) && isset($date_de_naissance) && isset($ville_d_origine) && isset($formation_de_base)) {
                //requete de modification
                $req = mysqli_query($con , "UPDATE employe SET nom = '$nom' , prenom = '$prenom' , date_de_naissance = '$date_de_naissance' , ville_d_origine = '$ville_d_origine' , formation_de_base = '$formation_de_base' WHERE id = $id");
        
                if($req){//si la requète a été traité avec succès , on fait une redirection 
                }else{//si non
                     $message = "employe non modifier";

        }
    }else{
        // si non
        $message = "Veuillez remplir tous les champs !";
    }
    }
    
    ?>
    <div class="form">
        <a href="../INDEX.php" class="back_btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
           </svg>Retour</a>
        <h2>Modifier l'employé: <?$row['nom']?></h2>
        <p class="erreur_message">
           <?php
           if(isset($message)){
            echo $message;
            }
           ?>
        </p>
        <form action="" method="POST">
            <label>nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">
            <label>prenom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>" >
            <label>date de naissance</label>
            <input type="date" name="date_de_naissance" value="<?=$row['date_de_naissance']?>">
            <label>ville d'origine</label>
            <input type="text" name="ville_d_origine" value="<?=$row['ville_d_origine']?>">
            <label>formation de base</label>
            <input type="text" name="formation_de_base" value="<?=$row['formation_de_base']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>