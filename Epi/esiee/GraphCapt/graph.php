<?php 
$_capteur = $_GET["capteur"];
switch($_capteur)
{


case "capteur2":
echo "Graphique du capteur2 <br/>";
?>

<iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/apps/matlab_visualizations/186558"></iframe>
<?php
break;
case "capteur10":

echo "Graphique du capteur10 <br/>";
?>
<iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/apps/matlab_visualizations/201887"></iframe>
<?php 
break;
}
?>