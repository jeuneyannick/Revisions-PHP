<?php 
setcookie('pseudo', $_POST['pseudo'], time()+ 365*24*3600, null, null, false, true); 
try
{
 $connexion = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8','root', 'root', 
 array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} 
catch(Exception $e) 
{
    die('Erreur:' . $e->getMessage());
}

//Traitement du formulaire 

//Vérification des champs 

 if(isset($_POST['pseudo']) AND isset($_POST['message']))
 {
    if( strlen($_POST['pseudo'])> 1 AND strlen($_POST['pseudo'])<=255)
    {
       $insert = $connexion->prepare('INSERT INTO tchat (pseudo,message) VALUES (:pseudo,:message)');
       $insert->execute(
           array(
               'pseudo' => $_POST['pseudo'], 
               'message' => $_POST['message']

           )
           ); 
           header('Location: mini_chat.php'); 
        
    }

 }

?>