<?php
# aaa009
/**
 * Admin controller
 */

# aaa086 test session
/*echo "<pre>";
var_dump($_SESSION);
echo "</pre>";*/

# aaa087 Managers
$ArticleM = new ArticleManager($pdo);
$UtilM = new UtilManager($pdo);

# aaa087 deconnect
if(isset($_GET['deconnect'])) {
    $UtilM->deconnect();

# aaa095 create article
}elseif(isset($_GET['post'])) {

    # aaa096 form not submitted
    if (empty($_POST)) {
        # aaa097 - view form
        require "View/createArticleAdmin.view.php";
    } else {
        $newArticle = new Article($_POST);
        # aaa101 - insert into DB
        $succes = $ArticleM->createArticle($newArticle);
        if ($succes) {
            header("Location: ./");
        } else {
            # aaa102 - view form with error
            $error = "Article non inséré, veuillez recommencer";
            require "View/createArticleAdmin.view.php";
        }
    }
# aaa109 update an article
}elseif(isset($_GET['update'])&&ctype_digit($_GET['update'])){

    $idarticle = (int) $_GET['update'];

    # aaa114 END

    # aaa110 get one article by idarticle
    $recup = $ArticleM->oneArticle($idarticle);
    if($recup) {
        $recup2 = new Article($recup);
    }

    # aaa111 view
    require_once "View/updateArticleAdmin.view.php";

# aaa089 homepage admin
}else{
    # aaa107
    $idutil = (int) $_SESSION['idutil'];
    $recup = $ArticleM->listArticleUtil($idutil);
    if(!$recup){
        $affiche = "Vous n'avez pas encore écris d'articles";
    }else{
        foreach($recup AS $item){
            $affiche[]= new Article($item);
        }
    }
    # aaa091
    require_once "View/indexAdmin.view.php";
}