	<!-- Va afficher les caractéristique pour questionner la table Passerelle-->
		<div id="opt2" class="divs">
		<form action="Vue/ChoixTablePost/choixTablePasserelle.php" method="post" >
	       	<input type="radio" name="table" value="Passerelle" checked id="Passerelle"/>
	        <label for="Donnees" >Passerelle</label> 
	        <p>
	            <!-- Réalisation de la liste des passerelle -->
	        Passerelle: 
	        <SELECT name="num_pass" value="num_pass" size="1">
	        <option> toutes les passerelles </option>
	        <?php
	        $reponse2 = $bdd->query('SELECT DISTINCT IDPasserelle FROM `passerelle` order by IDPasserelle ');
	        while ($donnees = $reponse2->fetch())
	        {
	        ?>
	                   <OPTION > <?php echo $donnees['IDPasserelle']; ?> </option>  
	        <?php
	        }    
	        ?>
	        </SELECT>
	        </p>
	            <!-- Réalisation de la liste des lieux-->
	        <p>
	        Localisation : 
	        <SELECT name="type_lieux" value="type_lieux"size="1">
	        <OPTION>Tous lieux</option>  
	        <?php
	         $reponse = $bdd->query('SELECT DISTINCT `Localisation`FROM `passerelle` order by `Localisation` ASC ');
	         
	        while ($donnees = $reponse->fetch())
	        {
	        ?>
	                   <OPTION > <?php echo $donnees['Localisation']; ?> </option>  
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

	        <OPTION>Passerelle</OPTION>
	        <OPTION>Localisation</OPTION>
	        <OPTION>TypeData</OPTION>
	       	</SELECT>
	        </p>

		     <p>
			       Veuillez choisir le type d'affichage :<br />
			       <input type="radio" name="affichage" value="json" id="json" /> <label for="json">json</label>
			       <input type="radio" name="affichage" value="normal" id="normal" /> <label for="normal">normal</label><br />
			 </p> 
			 
	        <input type="submit" value="Envoyer" />

	 	</form>
		</div> 

