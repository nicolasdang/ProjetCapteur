<?php 

//Tentative de connexion vers la base de données
include("../../Connexion/connexionBDD.php");










 $reponse = $bdd->query('SELECT *
					 	 FROM `donnees`
					 	 order by Date DESC
					 	 LIMIT 10' );
 
        //on va afficher la table capteur
        while ($donnees = $reponse->fetch())
        {print(json_encode($donnees));}
   	    echo"<br/><br/>";

?>