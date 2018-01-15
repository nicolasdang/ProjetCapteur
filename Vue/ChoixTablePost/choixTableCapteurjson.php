
<?php
//Tentative de connexion vers la base de données
include("../../Connexion/connexionBDD.php");

    //Début de consultation des tables
    //Consultation de la table Capteur

    if($_POST['table'] == "capteur")
    {
         //Définition des variables 

        // Définition de la variable capteur choisis
         if(  $_POST['num_capt'] == "tous les capteurs" ) 
        { $_numCapt = 'where`IdCapteur` IS NOT NULL' ;           }
        else 
        { $_numCapt = 'where`IdCapteur` = ' . $_POST['num_capt'];     }

        //Définition de la variable Localisation
         if(  $_POST['type_lieux'] == "Tous lieux" ) 
        { $_typeloc = ' AND `Localisation` IS NOT NULL' ;       }
        else 
        { $_typeloc = ' AND `Localisation` = "' . $_POST['type_lieux'] . '"' ;    }

        //Définition de la variable Passerelle
         if(  $_POST['type_passerelle'] == "Toutes les passerelles" ) 
        {   $_typepass = ' AND `IdPasserelle` IS NOT NULL' ;    }
        else 
        {   $_typepass = ' AND `IdPasserelle` = "' . $_POST['type_passerelle'] . '"' ; }

        //Définition de la variable TypesMesures
         if(  $_POST['type_mesures'] == "Tous les types de mesures" ) 
        {   $_typemesures = ' AND `TypesMesures` IS NOT NULL' ; }
        else 
        {$_typemesures = ' AND `TypesMesures` = "' . $_POST['type_mesures'] . '"' ;}        //Création de la variable date
            $_Date = ' AND `Date` >= "'  .$_POST['date'] . '"' ;
            $_ordre = ' ORDER BY ' .$_POST['ordre'];


        //Préparation de la requete
        $reponse = $bdd->query('SELECT * FROM `capteur esiee`' .$_numCapt .$_typeloc .$_typepass .$_typemesures .$_Date .$_ordre);
        //on va afficher la table capteur
        while ($donnees = $reponse->fetch())
        print(json_encode($donnees));



$reponse->closeCursor();
    }
?>