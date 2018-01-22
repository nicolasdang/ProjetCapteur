
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" href="css/stylemap.css" />
    <title>Choix Tables</title>

  </head>
  <body>
		<h1> Choix des tables</h1>
		<div id="Lien">
		<ul>

		  	<!-- Lien pour la table données-->
				<li><a href="javascript:visibilite('opt1');">Table Données</a></li>	
				<!-- Lien pour la table Passerelle -->      
				<li><a href="javascript:visibilite('opt2');">Table Passerelle</a></li>
				<!-- Lien pour la table Capteur -->  
				<li><a href="javascript:visibilite('opt3');">Table Capteur</a><br /></li>
		</ul>
		</div>

<?php
	//Va créer la div permettant d'afficher le formulaire donnees
	require("form/divDonnees.php");
	//Va créer la div permettant d'afficher le formulaire passerelle
	require("form/divPasserelle.php");
	//Va créer la div permettant d'afficher le formulaire capteur
	require("form/divCapteur.php");
?>
    <script src="js/fonction.js" type="text/javascript"> </script>
    <div id="graph">
	<p> nous somme dans le graph</P>
	
	<iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/350941/charts/2?bgcolor=%232ECEB9&color=%23d62020&dynamic=true&results=60&title=Field+humidite&type=line&xaxis=time"></iframe>
</div>
</div>	
  </body>
</html>