
<?php
//Tentative de connexion vers la base de données
include("../../Connexion/connexionBDD.php");

    //Début de consultation des tables

    // Consultation de la table Passerelle
    if($_POST['table'] == "Passerelle")
    {

        $reponse = $bdd->query('SELECT * FROM `passerelle`  ');
        //On va afficher la table Passerelle
        while ($donnees = $reponse->fetch())
    {
?>
    <p>  
        Passerelle n° <?php echo $donnees['IDPasserelle'];?><br/>
        lieu : <?php echo $donnees['Localisation'];?><br/>
        Date de mise en place : <?php echo $donnees['date'];?><br/><br/>
        Code JSON :

    </p>

    <?php 
    print(json_encode($donnees));
    }


$reponse->closeCursor();

    }

?>


<html>
        <head>
            
        </head>
        <body>
        <input type="button" value="back" onClick="window.history.back()" />
        </body>
</html>