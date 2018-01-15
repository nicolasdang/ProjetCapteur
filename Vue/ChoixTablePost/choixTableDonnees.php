
<?php
//Tentative de connexion vers la base de données
include("../../Connexion/connexionBDD.php");

if($_POST['affichage'] == "json")
    {require('choixtableDonneesjson.php');}
else if ($_POST['affichage'] == "normal")
    {require('choixtableDonneesnormal.php');}

?>


<html>  
        <body>
            <br/>
        <input type="button" value="back" onClick="window.history.back()" />
        </body>
</html>