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

$req = $bdd->prepare('INSERT INTO donnees (`IDDonnees`, `IDCapteur`, `Date`, `TypeData`, `ValeurData`) VALUES (NULL, ?, ?, ?, ?)');
$req->execute(array($_GET['IDCapteur'], $_GET['Date'], $_GET['TypeData'], $_GET['ValeurData']));
?>