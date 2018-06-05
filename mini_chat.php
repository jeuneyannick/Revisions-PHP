<?php
//1 Connexion à la base de données 
try
{
 $connexion = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8','root', 'root', 
 array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} 
catch(Exception $e) 
{
    die('Erreur:' . $e->getMessage());
}
//Requete pour afficher les dix messages les plus récents ainsi que les pseudos.
$req_message = $connexion->query('SELECT pseudo, message FROM tchat ORDER BY ID DESC LIMIT 0, 10');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minchat interactif</title>
</head>
<body>
    <form action="minichat_post.php" method="post">
     <label for="pseudo"><strong>Pseudo</strong></label><br />
     <input type="text" name="pseudo" value= <?php 
        if(isset($_COOKIE['pseudo']))
        {
            echo $_COOKIE['pseudo']; 
        }
        
        
     ?> /></br />

     <label for="message"><strong>Message</strong></label><br />
     <textarea name="message" id="" cols="30" rows="10"></textarea><br />
     <input type="submit" value="Envoyer">
    </form>
    
    <?php 
      $msg = $req_message->fetchAll(PDO::FETCH_ASSOC); 
      foreach( $msg as $msg_value)
      {
          echo '<div> Pseudo :' . htmlspecialchars($msg_value['pseudo']). '</div>'; 
          echo '<div> Message :' . htmlspecialchars($msg_value['message']) . '</div><br />'; 

      }
    ?>
     
</body>
</html>