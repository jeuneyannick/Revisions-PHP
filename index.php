<?

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page php</title>
</head>
<body>
<p> Bonjour je t'envoie l'adresse de mon site <a href="bonjour.php?nom=Bley&prenom=Yannick&repeter=9"> Mon site</a> 
</p>
    
 <form action="bonjour.php" method="post" enctype="multipart/form-data">
    <label for="nom">Nom</label><br />
    <input type="text" name="nom"><br />
    <label for="prenom">Prenom</label><br />
    <input type="text" name="prenom"><br />
    <label for="metier">Vous êtes </label><br />
    <select name="metier"><br />
        <option value="metier1" selected="selected">Développeur Web </option>
        <option value="metier2">WebDesigner </option>
        <option value="metier3">Graphiste </option>
    </select><br />
    <input type="checkbox" name="case" id="case" /> <label for="case">En recherche d'emploi ?</label><br />


    <input type="file" name="monfichier"><br />
    <input type=submit>

   
 
  </form>

</body>
</html>