
				<!--  Va afficher les différent filtre poour les caractéristique de la table-->
			   <div id="opt1" class="divs">
		       <form action="Vue/ChoixTablePost/choixTableDonnees.php" method="post" >
	       	   <input type="radio" name="table" value="Donnees" id="Donnees"checked/>
		       <label for="Donnees" >Donnees</label> 
		        <p>
		            <!-- Réalisation de la liste des capteurs -->
		        capteur : 
		        <SELECT name="num_capt" value="num_capt" size="1">
		        <option> tous les capteurs </option>
		        <?php		         
		        $reponse = $bdd->query('SELECT DISTINCT IDCapteur FROM `donnees` order by IDCapteur  ');
		        while ($donnees = $reponse->fetch())
		        {
		        ?>
		                   <OPTION > <?php echo $donnees['IDCapteur']; ?></option>  
		        <?php
		        }    
		        ?>
		        </SELECT>       
		        </p>
		            <!-- Réalisation de la liste des types de données-->
		        <p>
		        type de données : 
		        <SELECT name="type_donn" value="type_donn"size="1">
		        <OPTION>Tous types		 </option>        
		        <?php
		         $reponse = $bdd->query('SELECT DISTINCT `TypeData`FROM `donnees` order by `TypeData` ASC ');
		         
		        while ($donnees = $reponse->fetch())
		        {
		        ?>
		                   <OPTION > <?php echo $donnees['TypeData']; ?></option>  
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
		        <OPTION>IDCapteur</OPTION>
		        <OPTION>Date</OPTION>
		        <OPTION>TypeData</OPTION>
		        </SELECT>
		        </p>
		        <input type="submit" value="Envoyer" />
		 	</form>
			</div>   