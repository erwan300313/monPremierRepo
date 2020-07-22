<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Blog</title>
</head>
<body>
    <h1>Mon super blog !</h1>  
    <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $reponse = $bdd->query('SELECT id, titre, contenue, DATE_FORMAT(date_creation, "%d/%m/%y à %hh%i") AS date FROM billets');

        while ($donnees = $reponse->fetch())
        {
    ?>
    <div class="news">
        <h3><?php echo $donnees['titre'];?> publié le <?php echo $donnees['date'];?> </h3>
        <p>
            <?php echo $donnees['contenue'];?><br/>
            <a href="commentaires.php?id_billet=<?php echo $donnees['id'];?>&amp;titre=<?php echo $donnees['titre'];?>&amp;contenue=<?php echo $donnees['contenue'];?>&amp;date=<?php echo $donnees['date'];?>">Commentaires</a>
        </p>
    </div>
    <?php
        }
        $reponse->closeCursor();
    ?>
    
</body>
</html>