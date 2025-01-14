<?php $content = "Blog"; ?>
<?php ob_start(); ?>
<?php require("header.php"); ?>
<?php $title = "Blog accueil"; ?>
<main>
    <div class="container-fluid">
        <div class="row image d-flex flex-column justify-content-center align-items-flex-start text-center">
            <div class="col-12  text1">
                <h2>SUIVEZ-moi dans MON aventure</h2>
                <a href="index.php?action=blog"
                    class="d-block py-1 center-div my-2 text2 border border-dark fw-bolder text-decoration-none text-dark">Lire
                    le
                    blog</a>
                <a href="#"
                    class="d-block py-1 px-3  center-div my-2 text3 border border-dark fw-bolder text-decoration-none text-dark">visionner
                    sur youtube</a>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row link_social_network">
            <div class="col-12">
                <h2>Retouvez moi sur</h2>
            </div>
            <div class="col-12 link">
                <div class="twitter">
                    <div class="shadow">
                        <h5>
                            <a href="#">twitter</a>
                        </h5>
                    </div>
                </div>
                <div class="youtube">
                    <div class="shadow">
                        <h5>
                            <a href="#">youtube</a>
                        </h5>
                    </div>
                </div>
                <div class="instagram">
                    <div class="shadow">
                        <h5>
                            <a href="#">instagram</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 py-1">
                <h2 class="text-center py-3">Articles recents</h2>
                <div class="latest_article_list">
                    <?php
                    while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        $monarticle = new article($donnees);
                    ?>
                    <div class="item">
                        <figure class="py-1">
                            <img class="img-fluid" src="fichiers/<?php echo $monarticle->getImg(); ?>" alt="article">
                            <figcaption class="py-2"><a
                                    href="index.php?action=article&Id=<?= $monarticle->getId_billet(); ?>">
                                    <b><?= $monarticle->getTitre(); ?></b> , <?= $monarticle->getDate_creation(); ?>
                                </a>

                            </figcaption>
                        </figure>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-8 a_propos px-2 py-4">
                <h2 class="text-center py-1">A propos</h2>
                <div class="row content">
                    <img src="Vue/CSS/image2.jpg" alt="" class="img-fluid col-md-12 col-lg-6">
                    <div class="text col-md-12 col-lg-6">
                        <p class="pt-4">
                            Ceci est un paragraphe. Survolez-moi avec votre souris d'ordinateur et cliquez une fois
                            pour que le menu s'affiche. Double-cliquez pour éditer directement le texte. Vous pouvez
                            aussi me déplacer n'importe où sur la page par la méthode du «Glisser et Déposer»
                        </p>
                        <p>
                            Ceci est un paragraphe. Survolez-moi avec votre souris d'ordinateur et cliquez une fois
                            pour que le menu s'affiche. Double-cliquez pour éditer directement le texte. Vous pouvez
                            aussi me déplacer n'importe où sur la page par la méthode du «Glisser et Déposer»
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require("Vue/template.php"); ?>