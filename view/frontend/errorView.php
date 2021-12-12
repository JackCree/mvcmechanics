<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <div>
        <h1 class="text-center">Oups ! Une erreur est survenue !</h1>
    </div>
    <p class="alert alert-danger"><?= $errorMessage ?></p>

    <a class="btn btn-primary" href="index.php">Retourner à l'accueil</a>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



    