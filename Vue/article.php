<?php $title = "Article"; ?>
<?php ob_start(); ?>
<?php require("header.php"); ?>
<main>
    <style>
    <?php require('./Vue/CSS/article.css');
    ?>
    </style>
    <div class="container">
        <div class="row  py-3 position-relative">
            <div class="col-12 col-lg-8">
                <h2><?= $article['titre'] ?></h2>
                <div class="date_auteur">
                    <p><?= $article['date_creation'] ?> | Par <?= $article['auteur'] ?></p>
                    <p><?= $nbcomment ?> commentaire(s)</p>
                </div>
                <figure>
                    <img src="fichiers/<?php echo $article['img']; ?>" alt="" class="img-fluid ">
                    <figcaption><?= $article['contenu'] ?></figcaption>
                </figure>
            </div>
            <div class="col-lg-4 pl-4 col-12 pr-0 d-none d-lg-block  latest-article categorie">
                <div>
                    <h2 class="text-left py-3">CATEGORIES</h2>
                    <ul class="text-left">
                        <li><a href="#">Categorie 1</a></li>
                        <li><a href="#">Categorie 2</a></li>
                    </ul>
                </div>
                <div>
                    <h2 class="py-1 text-left">Articles recents</h2>
                    <div class="latest_article_list ">
                        <?php

                    while ($donnees = $resultat1->fetch()) {
                        $monarticle = new article($donnees);
                    ?>
                        <div class="item text-left">
                            <figure>
                                <img class="img-fluid" src="fichiers/<?php echo $monarticle->getImg(); ?>"
                                    alt="article">
                                <figcaption class="py-2"><a
                                        href="index.php?action=article&Id=<?= $monarticle->getId_billet() ?>"
                                        class="text-dark">
                                        <b><?= $monarticle->getTitre() ?></b> , <?= $monarticle->getDate_creation(); ?>
                                    </a>
                                </figcaption>
                            </figure>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8">
                <ul class="link">
                    <li>
                        <a href="#"><i class="fab fa-facebook"></i> Partager sur Facebook</a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-twitter"></i> Partager sur Twitter</a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-linkedin"></i>Partager sur linkedIn</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-12 col-md-8">
                <h3>commentaires</h3>
                <div class="commentaire">
                    <?php while ($comment = $commentaires->fetch()) {
                        $moncommentaire = new comment($comment);

                    ?>

                    <h6><b><?= $moncommentaire->getAuteur() ?></b>, le <?= $moncommentaire->getDate_creation() ?></h6>
                    <p><?= $moncommentaire->getCommentaire() ?></p>
                    <?php
                    } ?>

                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-12 mb-4 col-md-8">
                <h3>Laisser un commentaire</h3>
                <form action="index.php?action=post&Id=<?= $Id_billet ?>" method="POST">
                    <label class="d-block m-0"> Nom *</label>
                    <input type="text" placeholder="Nom" name="nom" class="mt-0 w-75 mb-2" required>
                    <label class="d-block m-0">Email </label>
                    <input type="text" placeholder="Email" name="email" class="mt-0 w-75 mb-2">
                    <label class="d-block m-0">
                        Commentaire *</label>
                    <textarea name="comment" id="" cols="30" rows="4" placeholder="commentaire" class="mt-0 w-75 mb-2"
                        required></textarea>
                    <p>* champ obligatoire</p>

                    <input type="submit" class="text-black py1 px-2" value="Envoyer">
                </form>
            </div>
        </div>

    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require("./Vue/template.php"); ?>