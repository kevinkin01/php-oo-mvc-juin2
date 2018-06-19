<?php
# aaa097 - create Article view form
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Ajouter un article</title>
</head>
<body>
<h1>Admin - Ajouter un article</h1>
<?php
include "View/menu.view.php";
?>
<h2>Bienvenue <?=$_SESSION['thename']?></h2>
<form action="" name="oneName" method="post">
    <input type="text" name="thetitle" placeholder="Le titre" required><br>
    <textarea name="thetext" placeholder="Votre texte" required></textarea><br>
    <input type="hidden" name="utilIdutil" value="<?=$_SESSION['idutil']?>">
    <!-- # aaa098 choose datetime picker -->
    <input type="datetime" name="thedate" value="<?=date("Y-m-d H:i:s")?>"><br>
    <input type="submit" value="Envoyer">
</form>
</body>
</html>
