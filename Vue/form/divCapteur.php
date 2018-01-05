
		<!-- Va afficher les caractéristique pour questionner la table capteur -->
		<div id="opt3" class="divs">
		<form action="Vue/ChoixTablePost/choixTableCapteur.php" method="post">
	       	<input type="radio" name="table" value="capteur" checked id="capteur"/>
	        <label for="capteur" >Capteur</label> 


	        <p>
	            <!-- Réalisation de la liste des capteurs -->
	        Capteur: 
	        <SELECT name="num_capt" value="num_capt" size="1">
	        <option> tous les capteurs </option>
	        <?php
	         
	        $reponse2 = $bdd->query('SELECT DISTINCT idCapteur FROM `capteur esiee` order by idCapteur ');
	         
	        while ($donnees = $reponse2->fetch())
	        	{
	        ?>
	             <OPTION > <?php echo $donnees['idCapteur']; ?>
	        <?php
	        	}    
	        ?>
	        </SELECT>	        
	        </p>
	            <!-- Réalisation de la liste des lieux-->
	        <p>
	        Localisation : 
	        <SELECT name="type_lieux" value="type_lieux"size="1">
	        <OPTION>Tous lieux </option>
	        
	        <?php
	         $reponse = $bdd->query('SELECT DISTINCT `Localisation`FROM `capteur esiee` order by `Localisation` ASC ');
	         
	        while ($donnees = $reponse->fetch())
	        {
	        ?>
	              <OPTION > <?php echo $donnees['Localisation']; ?>
	        <?php
	        }    
	        ?>
	        </SELECT>
	        </p>
	            <!-- Réalisation de la liste des Passerelle-->
	        <p>
	        Passerelle: 
	        <SELECT name="type_passerelle" value="type_passerelle"size="1">
	        <OPTION>Toutes les passerelles</option>
	        
	        <?php
	         $reponse = $bdd->query('SELECT DISTINCT `IdPasserelle`FROM `capteur esiee` order by `IdPasserelle` ASC ');
	         
	        while ($donnees = $reponse->fetch())
	        {
	        ?>
	                   <OPTION > <?php echo $donnees['IdPasserelle']; ?>
	        <?php
	        }    
	        ?>
	        </SELECT>
	        </p>
	            <!-- Réalisation de la liste des types de mesures-->
	        <p>
	        Types de Mesures : 
	        <SELECT name="type_mesures" value="type_mesures"size="1">
	        <OPTION>Tous les types de mesures</option>       
	        <?php
	         $reponse = $bdd->query('SELECT DISTINCT `TypesMesures`FROM `capteur esiee` order by `TypesMesures` ASC ');
	         
	        while ($donnees = $reponse->fetch())
	        {
	        ?>
	                   <OPTION > <?php echo $donnees['TypesMesures']; ?>
	        <?php
	        }    
	        ?>
	        </SELECT>
	        </p>
	         <!-- trie par date-->
	        <p>
	       Date : 
	       <input type="datetime-local"  name="date">
	        </p>
	        <!-- Ordonner les données -->
	        <p>
	        Trier par : 
	        <SELECT name="ordre" value="ordre">
	        <OPTION>idCapteur</OPTION>
	        <OPTION>idPasserelle</OPTION>
	        <OPTION>Localisation</OPTION>
	        <OPTION>TypesMesures</OPTION>
	        <OPTION>Date</OPTION>
	    	</SELECT>
	        </p>

	        <input type="submit" value="Envoyer" />

	 	</form>
		</div> 