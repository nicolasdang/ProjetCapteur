
<?php
//Tentative de connexion vers la base de données
include("../../Connexion/connexionBDD.php");

    //Début de consultation des tables
     if ($_POST['table'] == "Donnees")
 {
        //Définition des variables 

            // Définition de la variable capteur choisis
         if(  $_POST['num_capt'] == "tous les capteurs" ) 
        {
            $_numCapt = 'where`IDCapteur` IS NOT NULL' ;
            echo $_numCapt;
        }
        else 
        {
            $_numCapt = 'where`IDCapteur` = ' . $_POST['num_capt'];
            echo $_numCapt;
        }

            //Définition de la variable Types de capteur
         if(  $_POST['type_donn'] == "Tous types" ) 
        {
            $_typedonn = ' AND `TypeData` IS NOT NULL' ;
            echo $_typedonn;
        }
        else 
        {
            $_typedonn = ' AND `TypeData` = "' . $_POST['type_donn'] . '"' ;
            echo $_typedonn;
        }

        //Création de la variable date
            $_Date = ' AND `Date` >= "'  .$_POST['date'] . '"' ;
            echo $_Date;

            $_ordre = ' ORDER BY ' .$_POST['ordre'];





        $reponse = $bdd->query('SELECT * FROM `donnees` ' .$_numCapt .$_typedonn . $_Date .$_ordre );
        //On va afficher la table Passerelle
        while ($donnees = $reponse->fetch())
    {
?>
    <p>  



        Données n° <?php echo $donnees['IDDonnees'];?><br/>
        Réalisé par le capteur n° : <?php echo $donnees['IDCapteur'];?><br/>
        Date d'acquisition': <?php echo $donnees['Date'];?><br/>
        Données de type: <?php echo $donnees['TypeData'];?><br/>
        Valeur': <?php echo $donnees['ValeurData'];?><br/><br/>
        Code JSon :

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