 <?php  
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projetcapteur;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
 
//Insertion dans la table capteurs esiee
$req = $bdd->prepare('INSERT INTO `capteur esiee` (`IdCapteur`, `IdPasserelle`, `Localisation`, `Date`, `TypesMesures`, `ConsoVeille`, `ConsoMarche`) VALUES (NULL, ?, ? ,?, ?, ?, ?)');
$req->execute(array($_GET['IdPasserelle'], $_GET['Localisation'], $_GET['Date'], $_GET['TypesMesures'], $_GET['ConsoVeille'], $_GET['ConsoMarche']));
?>