<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Projet Capteurs</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
    <form action="insert.php" method="post">
        <p>
        <label for="Localisation">Localisation</label> : <input type="text" name="Localisation" id="Localisation" /><br />
        <label for="DateInstal">Date d'ajout</label> :  <input type="text" name="DateInstal" id="DateInstal" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dangn;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT IDPasserelle, Localisation, date FROM passerelle ORDER BY IDPasserelle DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p>'
                . 'ID de la passerelle : ' . htmlspecialchars($donnees['IDPasserelle']) . '<br>'
                . 'Localisation de la passerelle : '  . htmlspecialchars($donnees['Localisation']) . '<br>'
                . "Date d'installation :" . htmlspecialchars($donnees['date']) . '</p>';
}

$reponse->closeCursor();

?>
    </body>
</html>