
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
        {
            $_numCapt = 'where`IdCapteur` IS NOT NULL' ;
            echo $_numCapt;
        }
        else 
        {
            $_numCapt = 'where`IdCapteur` = ' . $_POST['num_capt'];
            echo $_numCapt;
        }

        //Définition de la variable Localisation
         if(  $_POST['type_lieux'] == "Tous lieux" ) 
        {
            $_typeloc = ' AND `Localisation` IS NOT NULL' ;
            echo $_typeloc;
        }
        else 
        {
            $_typeloc = ' AND `Localisation` = "' . $_POST['type_lieux'] . '"' ;
            echo $_typeloc;
        }

        //Définition de la variable Passerelle
         if(  $_POST['type_passerelle'] == "Toutes les passerelles" ) 
        {
            $_typepass = ' AND `IdPasserelle` IS NOT NULL' ;
            echo $_typepass;
        }
        else 
        {
            $_typepass = ' AND `IdPasserelle` = "' . $_POST['type_passerelle'] . '"' ;
            echo $_typepass;
        }

        //Définition de la variable TypesMesures
         if(  $_POST['type_mesures'] == "Tous les types de mesures" ) 
        {
            $_typemesures = ' AND `TypesMesures` IS NOT NULL' ;
            echo $_typemesures ;
        }
        else 
        {
            $_typemesures = ' AND `TypesMesures` = "' . $_POST['type_mesures'] . '"' ;
            echo $_typemesures ;
        }
        //Création de la variable date
            $_Date = ' AND `Date` >= "'  .$_POST['date'] . '"' ;
            echo $_Date;

            $_ordre = ' ORDER BY ' .$_POST['ordre'];


        //Préparation de la requete
        $reponse = $bdd->query('SELECT * FROM `capteur esiee`' .$_numCapt .$_typeloc .$_typepass .$_typemesures .$_Date .$_ordre);
        //on va afficher la table capteur
        while ($donnees = $reponse->fetch())
    {
?>
    <p>  
        Capteur n° <?php echo $donnees['IdCapteur'];?><br/>
        Lié à la passerelle n°: <?php echo $donnees['IdPasserelle'];?><br/>
        lieu : <?php echo $donnees['Localisation'];?><br/>
        Date de mise en place : <?php echo $donnees['Date'];?><br/>
        Type de mesures : <?php echo $donnees['TypesMesures'];?><br/>
        Consommation en mode Veille : <?php echo $donnees['ConsoVeille'];?><br/>
        Consommation en mode Marche : <?php echo $donnees['ConsoMarche'];?><br/><br/>
        Code JSON : 
    </p>

<?php 
        print(json_encode($donnees));
}


$reponse->closeCursor();
    }
?>