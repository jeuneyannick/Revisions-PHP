<?php

//Connexion de la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root', 'root',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) 
{
    die('Erreur:' . $e->getMessage());
}
//$bdd->exec('INSERT INTO jeux_video(nom,possesseur,console,prix,nbre_joueurs_max,commentaires)VALUES ("Battlefield 1942" , "Patrick", "PC", 45,50,"2nde guerre mondiale" )' );

//echo ' Le jeu a bien été ajouté !'; 

// requête préparée avec marqueurs
//$req = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ?');
//$req->execute(
    //array(
        //$_GET['possesseur']
    //)
//);

//s'il y en a plusieurs, mettre dans le bon ordre

$requete = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prix_max ORDER BY prix');
$requete->execute(
    array(
        'possesseur' => $_GET['possesseur'], 
        'prix_max' => $_GET['prix_max']
        )
);
$donnees = $requete->fetchAll(PDO::FETCH_ASSOC); 

echo '<ul>';
foreach ($donnees as $data)
{
	echo '<li>' . $data['nom'] . ' (' . $data['prix'] . ' EUR)</li>';
}
echo '</ul>';

$requete->closeCursor();


//requête UPDATE
$update = $bdd->exec('UPDATE jeux_video SET  nbre_joueurs_max = 7, commentaires = "Jeu de foot sensationnel à ne pas manquer" WHERE nom = "FIFA 2019" '); 

$nb_modifs = $bdd->exec('UPDATE jeux_video SET nbre_joueurs_max = 6, possesseur = "Mathieu" WHERE possesseur = "Michel"'); 
echo $nb_modifs . ' entrées ont été modifiés'; 

//requête préparée UPDATE avec des variables
//$update_prepare = $bdd->prepare('UPDATE jeux_video SET prix = :nvp_prix, nbre_joueurs_max = :nv_nb_joueurs WHERE nom = :nom_jeu');
//$update_prepare->execute(
    //array(
        //'nvp_prix' => $nvp_prix, 
        //'nbre_joueurs_max' => $nv_nb_joueurs, 
        //'nom_jeu' => $nom_jeu
    //));

    //requête DELETE
$delete = $bdd->exec('DELETE  FROM jeux_video WHERE possesseur = "Florent"'); 
?>