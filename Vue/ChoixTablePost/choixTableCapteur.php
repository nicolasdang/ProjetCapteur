
<?php
//Tentative de connexion vers la base de données
include("../../Connexion/connexionBDD.php");
if($_POST['affichage'] == "json")
    {require('choixtableCapteurjson.php');}
else if ($_POST['affichage'] == "normal")
    {require('choixtableCapteurnormal.php');}
?>
<html>
        <body>
        <br/>
        <input type="button" value="back" onClick="window.history.back()" />
        </body>
</html>