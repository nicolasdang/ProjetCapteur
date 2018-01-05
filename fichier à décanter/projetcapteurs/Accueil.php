<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
    <form action="choixTable_post.php" method="post">

         <!-- Permets de choisir la table que l'on veut consulter -->
        <p>
        Veuillez choisir une table : 
        <input type="radio" name="table" value="capteur" id="capteur"/>
        <label for="capteur" >Capteur</label> 
        
        <input type="radio" name="table" value="Passerelle" id="Passerelle"/>
        <label for="Passerelle" >Passerelle</label> 
        
        <input type="radio" name="table" value="Donnees" id="Donnees"/>
        <label for="Donnees" >Donnees</label> 

 
    </p>
            <!-- Chargement de la base de donnée pour récuperer les variables -->
             <?php   try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=dangn;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }   
            ?>

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
                   <OPTION > <?php echo $donnees['IDCapteur']; ?>
        <?php
        }    
        ?>
        </SELECT>
        
        </p>
            <!-- Réalisation de la liste des types de données-->
        <p>
        type de données : 
        <SELECT name="type_donn" value="type_donn"size="1">
        <OPTION>Tous types
        
        <?php
         $reponse = $bdd->query('SELECT DISTINCT `TypeData`FROM `donnees` order by `TypeData` ASC ');
         
        while ($donnees = $reponse->fetch())
        {
        ?>
                   <OPTION > <?php echo $donnees['TypeData']; ?>
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
        <SELECT name="ordre" value="ordre">

        <OPTION>IDCapteur</OPTION>
        <OPTION>Date</OPTION>
        <OPTION>TypeData</OPTION>
        </p>


        <input type="submit" value="Envoyer" />

    </form>
    </body>
</html>












