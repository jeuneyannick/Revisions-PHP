<?php
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
}
catch(Exception $e)
{
    die('Erreur :'. $e->getMessage()); 
}


//Fonctions scalaires

// SELECT UPPER POUR METTRE EN MAJUSCULE 
$upper = $bdd->query('SELECT UPPER(nom) AS upper_name FROM jeux_video');

  $uppername = $upper->fetchAll(PDO::FETCH_ASSOC); 
  foreach($uppername as $uppername_value)
  {
      echo $uppername_value['upper_name']. '<br />'; 
  }
//SELECT LOWER POUR AFFICHER EN MINUSCULES
$lower = $bdd->query('SELECT LOWER(nom) AS lower_name FROM jeux_video'); 

  $lowername = $lower->fetchAll(PDO::FETCH_ASSOC); 
  foreach($lowername as $lowername_value)
  {
      echo $lowername_value['lower_name']. '<br />'; 
  }
  //compter le nombre de caractères
  //SELECT LENGTH(nom) AS longueur_nom FROM jeux_video

  //ROUND : arrondir un nombre décimal 
  //SELECT ROUND(prix, 2) AS prix_arrondi FROM jeux_video


  //Fonctions d'agrégat
  //font des opérations sur plusieurs entrées pour en retourner une seule valeur
  //SELECT AVG: calculer la moyenne
$moyenne = $bdd->query('SELECT AVG(prix) AS prix_moyen FROM jeux_video'); 
 
$prix_moyen = $moyenne->fetchAll(PDO::FETCH_ASSOC); 
foreach($prix_moyen as $value)
{
    echo "<p> Le prix moyen est de " . $value['prix_moyen'] . "  EUROS" ; 
}                         
//SELECT SUM : Additioner toutes les valeurs 

$sum = $bdd->query('SELECT SUM(prix) AS total_price FROM jeux_video WHERE possesseur = "Mathieu"'); 
echo "<pre>"; 
print_r($sum); 
echo "</pre>"; 
$prix_total = $sum->fetchAll(PDO::FETCH_ASSOC); 
foreach($prix_total as $prix)
{
    echo "<p> Le prix total des jeux de Michel est de " . $prix['total_price'] . " EUROS"; 
}
//SELECT MAX: retourne la valeur maximale 

$maximum = $bdd->query('SELECT MAX')