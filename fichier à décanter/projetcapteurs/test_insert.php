<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projetcapteurs;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


//Insert dans la table passerelle (test)
$bdd->exec('INSERT INTO passerelle(Localisation, DateInstal) VALUES(\'Epi 360\', \'2017-05-25\')');

//Insert dans la table dbesiee (test)
$bdd->exec('INSERT INTO dbesiee(TypeCapteur, DateInst, Localisation, TypeMesure, ConsoVeille, ConsoMarche) VALUES (\'Poussoir\', \'2017-12-04\', \'5ème étage\', \'Luminosité\', 25, 40)');

//Insert dans la table dbdonnee (test)
$bdd->exec('INSERT INTO dbdonnee(TypeData, ValeurData, DateAcq) VALUES(\'Lumière\', 240, \'2017-12-04\')');

echo "Insert Reussi";

?>