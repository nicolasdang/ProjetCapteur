<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- 
	/**
	
	  The Initial Developer of the Original Code is
	  Matthieu  - http://www.programmation-facile.com/
	  Portions created by the Initial Developer are Copyright (C) 2013
	  the Initial Developer. All Rights Reserved.
	
	  Contributor(s) :
	
	 */
	 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document DOM en JavaScript</title>

    <link rel="stylesheet" type="text/css" href="./EsieeStyle2.css">
    
    <script src="script_esiee.js"></script>
   
</head>

<body>

<h1>ESIEE : épi 2 étage 2</h1>

<div id="divCompteur"></div>

<!-- <div id="sensorInfo"><b></b></div> -->

<div id="Zone" 
style = "width:1300px; height:800px;
background:url('http://hamouchr.free.fr/sensenv/fig/planbuilding.png') no-repeat;">

<a href="GraphCapt/graph.php?capteur=capteur2" ><div class="capteur1" title="capteur1" id="capteur1"  style= "position: relative; left: 480px; top: 120px;">
<!-- ISSUE de la requete -->
<!--<span  id="date" > t = 15h36</span> <br>
<span  id="temp" > T = 25&deg;</span><br>
<span  id="hum"  > H = 50 %</span><br>
<span  id="lum" > L = 530 lux</span><br>
<span  id="batt" > B = 76 %</span><br> -->
</div>
</a>
<a  href="GraphCapt/graph.php?capteur=capteur10">
<div class="capteur2" title="capteur2" id="capteur2"  style= "position: relative; left: 1080px; top: -10px;">
<!-- 
<span  id="date" > t = 20h15</span> <br>
<span  id="temp" > T = 28&deg;</span><br>
<span  id="hum" > H = 60 %</span><br>
<span  id="lum" > L = 480 lux</span><br>
<span  id="batt" > B = 85 %</span><br>
-->
</div>
</a>

<div style= "position: relative; left: 250px; top: -80px;">
<img src="fig/termometre.png"/>
<span  id="temp" > T = 48&deg;</span><br>
</div>

</div>

 <script>
rtSensorInfo();
 </script>

</body>
</html>