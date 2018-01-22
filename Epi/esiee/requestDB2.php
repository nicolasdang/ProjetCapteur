<?php header("Access-Control-Allow-Origin: *"); ?>
<?php
		
	$query = ""; 
	$_historique=false;
	include 'init.php';
	
	if (isset($_REQUEST['operation']))
	{$_Operation = 0 + $_REQUEST['operation'];} // le 0+ pour s'assurer que $Operation soit un entier
	
	if (isset($_REQUEST['historique']))
	{$_historique = $_REQUEST['historique'];
	} 
	
	if (isset($_REQUEST['temp']))
	{$_temp = $_REQUEST['temp'];
	} 
	
	if (isset($_REQUEST['hum']))
	{$_hum = $_REQUEST['hum'];
	} 
	
	if (isset($_REQUEST['lum']))
	{$_lum = $_REQUEST['lum'];
	} 
	
   if (isset($_REQUEST['batt']))
	{$_batt = $_REQUEST['batt'];
	} 

	if (isset($_REQUEST['idCap']))
	{$_idCap = $_REQUEST['idCap'];
	} 
	
	// Les types d'opérations géré
	$_Update_Sensors = 1; // 
	$_GetList = 2; // 
	
	//Les types de sensors
	$_sensor_temperature = 'Temperature';
	$_sensor_cov = 'Cov';
	$_sensor_co2 = 'CO2';
	$_sensor_humidite= 'Humidite';
	$_sensor_batterie= 'Batterie';
	$_sensor_luminosite = 'Luminosite';
	
	$temp_value=-1;
	$hum_value=-1;
	$lum_value=-1;
	$batt_value=-1;
	$id_capteur=$_idCap;
	$date;
	$type;
	$value=-1;
	
	$battBrut=0.0;
	$temperatureBrut=0.0;
	
	


	init();
	//$Toto = getTemp(300, 256);
	//echo "toto = ".$Toto;
	
	$link = mysqli_connect($server_address,$user_db,$password_db,$name_db) or die("Error " . mysqli_error($link)); 
	
	if ($_historique=='true')
		 { 
			    $result = $link->query(sql_listByDate($_idCap, $_temp,$_hum,$_lum,$_batt));
		    } 
   else	
	     {
	     	//$query3 = sql_getLastValues(1)." UNION ".sql_getLastValues(2).";";
			$query3 = sql_getLastValues($_idCap).";";
	     	$result = $link->query($query3);
	     	} 
	
	$output = "";
		//$output []='{"Operation":"'.$_Operation.'"}';

	while ($row = $result->fetch_assoc()) {
		
		$current_id =$row['id_identification'];
		$date=$row['Date'];
		$type=$row['Sensor'];
		
		
		switch($row['Sensor']){
			
		case "Temperature":{   $temperatureBrut = $row['Valeurs'];
							//echo 'temp brut = '.$temperatureBrut;
		                       //$temp_value = round(getTemp($temperatureBrut, $battBrut),1);
							 // $temp_value = round(interpreteTemp($current_id,  $temperatureBrut),1);
									$row['Valeurs']=$temp_value;
									$value=$temp_value;
									$date=$row['Date'];
									//printSensorInfo($current_id,$date, $temp_value,$hum_value, $lum_value,$batt_value);
									//if ($_historique!='true')
										//echo "".implode(getSensorInfo2($current_id,$date, $temp_value,$hum_value, $lum_value,$batt_value));		
									break;
									};
		case "Humidite": {$row['Valeurs']=round(interpreteHum($row['Valeurs']),0);
								$hum_value=$row['Valeurs'];
								$value=$hum_value;						
								break;}
		case "Luminosite": {$row['Valeurs']=round(interpreteLum($row['Valeurs']),0);
									$lum_value=$row['Valeurs'];
									$value=$lum_value;						   
								   break;}
		case "Batterie":{
								$battBrut = $row['Valeurs'];
								//echo 'batt brut = '.$battBrut;
								$row['Valeurs']=round(interpreteBatt($row['Valeurs'],3));
									$batt_value=$row['Valeurs'];
									$value=$batt_value;													   
								   break;
								}						   	
		default: ;
	
		}
		
		if ($_historique=='true')
				echo  "".implode(getSensorRow($current_id, $date, $type, $value));		
		//$output=$output.getSensorRow($current_id,$date, $temp_value,$hum_value, $lum_value,$batt_value);			
		else 
		$output []=$row;
	
		}
	$temp_value = round(getTemp($temperatureBrut, $battBrut),1);
	if ($_historique!='true')
										echo "".implode(getSensorInfo2($current_id,$date, $temp_value,$hum_value, $lum_value,$batt_value));	
	//print(json_encode($output));
	//echo "test".json_encode($output);
	if ($_historique=='true') 
		{//echo "result2 =".$output;
		 //echo "test".json_encode($output);
		 }
	
	$link ->close();

	function init(){
	
	}

		function getTemp($temperatureBrut, $battBrut){	
		
//		global $Vbatt, $vccfactor, $A1, $A2, $eps0, $A3, $A4, $n;
// DONNEES Interprétation
	$Vbatt=0.0; 	
	$T=25;	
	$RR=6190.0;
	$RR5=910.0;
	$RRg=6490.0;
	$vz=0.68;    
	$eps0=0.15;

	$m=0.2566;
	$n=-256.63;
	
	$vccfactor;
	
	$G= 1.0+(100.0 * 1000.0/ $RRg); //16.4

	$A1=0.0;
	$A4=0.0;
	$A2=0.0;
	$A3=0.0;
	
	$vccfactor=1024.0*$vz;
	
	$G= 16.4 ; //1.0+(100.0 * 1000.0/ RRg);

	$A1=-$m*($RR+$RR5);
	$A4=-1024.0*$G;
	$A2= $m*$RR5*$A4;
	$A3= 1.0+ ($RR5 / $RR ); //1.147;
	

		$T=-1;
		if ($battBrut!=0) { 
		
		$Vbatt = $vccfactor / $battBrut;
		//echo 'vbatt = '.$Vbatt;
		
		if ($Vbatt>0)
			$T=(   ($A1*$temperatureBrut + $A2* ( ($Vbatt-$eps0) / $Vbatt)     ) / ($A3*$temperatureBrut + $A4*( ($Vbatt-$eps0) /$Vbatt )) )   + $n ;
		}
		$T = $Vbatt/3.0;
		return $T;
	}

	
	function sql_listByDate($_idCap, $_temp,$_hum,$_lum,$_batt){
		//$query = 'SELECT * FROM `acqdata` WHERE id_identification="'.$_REQUEST['id_identification'].'"';
	 $query = "SELECT * FROM  `acqdata` WHERE 1";
    if ($_temp=='false')
		   { $query=$query." AND `acqdata`.Sensor!='Temperature'";		     
		   }
	     								
    if ($_hum=='false')
		   { $query=$query." AND `acqdata`.Sensor!='Humidite'";		     
		   }
	
    if ($_lum=='false')
		   { $query=$query." AND `acqdata`.Sensor!='Luminosite'";		     
		   }
	     		
    if ($_batt=='false')
		   { $query=$query." AND `acqdata`.Sensor!='Batterie'";		     
		   }
	
	 if($_idCap!='0')
	 	   { 
	 	     //echo "capteur $_idCap :";
	 	     $query=$query." AND `acqdata`.`id_identification`=$_idCap";//."6".";";		     
		   }
	
   
    $query=$query." ORDER BY  `acqdata`.`Date` DESC LIMIT 0 , 60";
    
    return $query;
   }
   	
   function sql_getLastValues2(){
	// récupérer la dernière mise à jour, tout capteur confondu 
	
	return $query2 = "SELECT * \n"
    . "FROM `acqdata` \n"
    . "where `acqdata`.Date=(SELECT MAX(`acqdata`.Date ) FROM `acqdata`)\n"
    . "LIMIT 0 , 30\n"
    . "";
		}
		
	function sql_getLastValues($id){
		
		return $query="SELECT * 
			FROM (
			SELECT * 
			FROM  `acqdata` 
			WHERE  `acqdata`.id_identification =".$id."
					)t
			WHERE DATE = ( 
              SELECT MAX( DATE ) 
              FROM (
                    SELECT * 
                    FROM  `acqdata` 
                    WHERE  `acqdata`.id_identification =".$id."
                   )t2 
             )"  ;
	}
		
		
	function interpreteTemp($capteurId, $tempBrut){
		//return ($tempBrut-72)/4;
		if ($capteurId=="2"){
		$a=0.065;
		$b=-18.676;
		} elseif ($capteurId=="1"){
		$a=0.065;
		$b=-18.676;
		}elseif ($capteurId=="2"){
		$a=0.065;
		$b=-18.676;
		}
		else {
		$a=0.261;
		$b=-19.046;
		}
		return ($a*$tempBrut)+$b;
	}
	

	
	function interpreteLum($lumBrut){
		//echo "lum".$lumBrut;
		$a=0.586;
		$b=0;
		return ($a*$lumBrut)+$b;
	}
	function interpreteHum($humBrut){
		$a=0.1535;
		$b=-23.82;
		return ($a*$humBrut)+$b;
	}
	
	function interpreteBatt($battBrut){
		return $battBrut*0.46;
	}
	
	function printSensorInfo($current_id,$date, $temp_value,$hum_value, $lum_value,$batt_value){
		echo "<br><b><h4 color=\"red\">Capteur N° ".$current_id;
		if ($current_id==6) echo " (exterieur) </h4></b> <br>";
		else 	echo " (interieur) </h4></b> <br>";	
		echo "Date: ".$date;
		echo "<br><ul>
			<li> Temperature = ".$temp_value."°C </li>
			<li> Humidite = ".$hum_value."%</li>
			<li> Luminosite = ".$lum_value." lux</li>
			<li> Niveau batterie = ".$batt_value."%</li>
   			</ul><br>";
		//echo "<br>  Temperature=".$temp_value."°C , Hum=".$hum_value."%, Lum=".$lum_value." lux, batt=".$batt_value."%.<br>";
		}
		
		function getSensorInfo($current_id,$date, $temp_value,$hum_value, $lum_value,$batt_value){
		$info = null;
		$info[]= "<br><b><h4 color=\"red\">Capteur N° ".$current_id;
		if ($current_id==6) $info[]= " (exterieur) </h4></b> <br>";
		else 	$info[]=" (interieur) </h4></b> <br>";	
		$info[]="Date: ".$date;
		$info[]="<br><ul>
			<li> Temperature = ".$temp_value."°C </li>
			<li> Humidite = ".$hum_value."%</li>
			<li> Luminosite = ".$lum_value." lux</li>
			<li> Niveau batterie = ".$batt_value."%</li>
   			</ul><br>";
		//echo "<br>  Temperature=".$temp_value."°C , Hum=".$hum_value."%, Lum=".$lum_value." lux, batt=".$batt_value."%.<br>";
		return $info;
		}
		
		function getSensorInfo2($current_id,$date, $temp_value,$hum_value, $lum_value,$batt_value){
		$info = null;
		
				$info[]= "<span  id=\"date\" > t =".$date."</span> <br>
				  <span  id=\"temp\" > T =".$temp_value."&deg;</span><br>
				  <span  id=\"hum\"  > H =".$hum_value."%</span><br>
				  <span  id=\"lum\" > L =".$lum_value." lux</span><br>
				  <span  id=\"batt\" > B =".$batt_value."%</span><br>";

		return $info;
		
		}
		
		function getSensorRow($current_id,$date, $type, $value){
		$info = null;
		$info[]= "<br>".$current_id;
		$info[]=" (".$date;
	/*	$info[]="
			 Temperature = ".$temp_value."°C 
			 Humidite = ".$hum_value."%
			 Luminosite = ".$lum_value." lux
			 Niveau batterie = ".$batt_value."%
   		 ";*/
   		$info[]=")  ====>
			   ".$type."=
			 ".$value."
   		 ";	 
		//echo "<br>  Temperature=".$temp_value."°C , Hum=".$hum_value."%, Lum=".$lum_value." lux, batt=".$batt_value."%.<br>";
		return $info;
		}
?>