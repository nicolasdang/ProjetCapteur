
<?php
//Tentative de connexion vers la base de données
include("../../Connexion/connexionBDD.php");

    //Début de consultation des tables
     if ($_POST['table'] == "Donnees")
 {
        //Définition des variables 

            // Définition de la variable capteur choisis
         if(  $_POST['num_capt'] == "tous les capteurs" ) 
        {   $_numCapt = 'where`IDCapteur` IS NOT NULL' ;        }
        else 
        {   $_numCapt = 'where`IDCapteur` = ' . $_POST['num_capt'];        }

            //Définition de la variable Types de capteur
         if(  $_POST['type_donn'] == "Tous types" ) 
        {   $_typedonn = ' AND `TypeData` IS NOT NULL' ;        }
        else 
        {   $_typedonn = ' AND `TypeData` = "' . $_POST['type_donn'] . '"' ;        }

        //Création de la variable date
            $_Date = ' AND `Date` >= "'  .$_POST['date'] . '"' ;
            $_ordre = ' ORDER BY ' .$_POST['ordre'];





        $reponse = $bdd->query('SELECT * FROM `donnees` ' .$_numCapt .$_typedonn . $_Date .$_ordre );
        //On va afficher la table Passerelle
        while ($donnees = $reponse->fetch())
    {
        print(json_encode($donnees));
    }


$reponse->closeCursor();

    }
?>


