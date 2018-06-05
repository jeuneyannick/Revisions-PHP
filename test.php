<?php

//Connexion de la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root', 'root');
} catch(Exception $e) 
{
    die('Erreur:' . $e->getMessage());
}

//Requête pour tous sélectionner dans la table de la base de données query()
$reponse = $bdd->query('SELECT * FROM jeux_video');


//Manière d'afficher des données avec la boucle foreach
 $data = $reponse->fetchAll(PDO::FETCH_ASSOC); 
    foreach($data as $data_value) 
     {
    ?>
 <p>
     <strong>Jeu</strong> : <?php echo $data_value['nom']; ?><br />
     Le possesseur de ce jeu est : <?php echo $data_value['possesseur']; ?>, et il le vend à <?php echo $data_value['prix']; ?> euros !<br />
     Ce jeu fonctionne sur <?php echo $data_value['console']; ?> et on peut y jouer à <?php echo $data_value['nbre_joueurs_max']; ?> au maximum<br />
     <?php echo $data_value['possesseur']; ?> a laissé ces commentaires sur <?php echo $data_value['nom']; ?> : <em><?php echo $data_value['commentaires']; ?></em>
    </p>
 <?php

     }
 $reponse->closeCursor();//termine l'éxécution de la requête

  $reponse_name = $bdd->query('SELECT nom FROM jeux_video WHERE id= 10');
    
   $name = $reponse_name->fetch(PDO::FETCH_ASSOC); 

     foreach($name as $name_value)
     {
      ?>
      <p>
         <em>J'aime particulièrement ce jeu : <?php echo $name_value?></em>
    <?php
     }

       $reponse_name->closeCursor(); 

       $data_patrick = $bdd->query('SELECT nom, possesseur FROM jeux_video WHERE possesseur = \'Patrick\' AND prix < 20'); 
    

       $patrick = $data_patrick->fetchAll(PDO::FETCH_ASSOC); 

       foreach($patrick as $value)
       {
     ?>
       <br />
       <?php echo '<p>'. $value['nom'] . ' appartient à ' . $value['possesseur'] . '</p>';?>
         
       
       <?php
       }
       $data_patrick->closeCursor(); 


       $reponse_asc = $bdd->query('SELECT nom, prix FROM jeux_video ORDER BY  prix DESC'); 

      $ASC = $reponse_asc->fetchAll(PDO::FETCH_ASSOC); 

        foreach($ASC as $data_asc)
        { 
       ?> 
        <br />
       <?php echo '<p>'. $data_asc['nom'] . ' coûte  ' . $data_asc['prix'] . '</p>';?>
        
        <?php
        }
        $reponse_asc->closeCursor(); 

        $limit_data = $bdd->query('SELECT nom FROM jeux_video LIMIT 0, 10');
         echo '<p> Voici les 20 premiers jeux vidéos de la table jeux_video </p>'; 
         
         $limit = $limit_data->fetchAll(PDO::FETCH_ASSOC); 
         //echo '<pre>'; 
         //print_r($limit); 
         //echo '</pre>'; 
          foreach($limit as $limit_value)
          {
        ?>
          
          <?php echo '<br />' . $limit_value['nom'];  ?>
         
         <?php
          }
         $limit_data->closeCursor(); 

          $multiple_data = $bdd->query('SELECT nom, possesseur, console, prix FROM jeux_video WHERE console = \'xbox\' OR console = \'PS2\' ORDER BY prix DESC  LIMIT 0,10 '); 

              $multiple = $multiple_data->fetchAll(PDO::FETCH_ASSOC); 

              foreach($multiple as $multiple_value)
              {
              ?>
                 <?php echo '<p> ' . $multiple_value['nom'] . " " . $multiple_value['possesseur'] . " " . $multiple_value['console'] . " " . $multiple_value['prix'] . '</p>'; ?>

              <?php
              }
             
              $multiple_data->closeCursor(); 
              ?>
          