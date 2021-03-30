<?php $title = "Add article"; ?>
<?php ob_start(); ?>
<?php require_once("./Vue/header.php"); ?>
<style>
<?php require_once("./Vue/CSS/ajouter_article.css");
?>
</style>
<!-- Section: form gradient -->
<main>
    <div class="container">
        <div class="row py-4">
            <div class="col-12 col-md-6">
                <form action="index.php?action=add" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Formulaire</legend>
                        <label class="m-0">Auteur *</label><br>
                        <input class="mb-2 w-100" type="text" name="auteur" required><br>
                        <label class="m-0">Titre *</label><br>
                        <input class="mb-2 w-100" type="text" name="titre" required><br>
                        <label class="m-0">contenu *</label><br>
                        <textarea name="contenu " class="mb-2 w-100" rows="5" required></textarea>
                        <input class="mb-2 w-100" type="hidden" name="MAX_FILE_SIZE" value="2097152">
                        <p class="m-0">Choisissez une photo avec une taille inférieure à 2 Mo</p><br>

                        <input type="submit" value="Envoyer" class=" px-2">
                    </fieldset>
                    <p>* champ obligatoire</p>
                </form>

            </div>
        </div>
    </div>
</main>
<!-- Section: form gradient -->


<?php $content = ob_get_clean(); ?>
<?php require("./Vue/template.php"); ?>