<?php 

//Tentative de connexion vers la base de données
include("../../Connexion/connexionBDD.php");










 $reponse = $bdd->query('SELECT `donnees`.`IDDonnees`, `capteur esiee`.`Localisation`, `donnees`.`IDCapteur`,`donnees`.`Date`,`donnees`.`TypeData`,`donnees` .`ValeurData`
					 	 FROM `donnees`
					 	  Inner Join `capteur esiee` on `donnees`.`IDCapteur`=`capteur esiee`.`IDCapteur`' );
 
        //on va afficher la table capteur
        while ($donnees = $reponse->fetch())
        print(json_encode($donnees));
?>