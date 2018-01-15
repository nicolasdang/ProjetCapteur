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
//Insertion de valeurs dans la table passerelle
$req = $bdd->prepare('INSERT INTO passerelle (`IDPasserelle`, `Localisation`, `date`) VALUES (NULL,?, ?)');
$req->execute(array($_POST['Localisation'], $_POST['DateInstal']));


//Redirection vers le formulaire
header('Location: form_insert.php');

?>