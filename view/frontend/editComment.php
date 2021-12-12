<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="jumbotron">
    <h1 class="text-center">Mon super blog !</h1>
</div>
<p><a class="btn btn-primary" href="index.php?action=post&amp;id=<?= $comment['post_id'] ?>">Retour au billet</a></p>

<h2 class="alert alert-info">Editer un commentaire</h2>

<form action="index.php?action=editComment&amp;id=<?= $comment['id'] ?>" method="post">
    <div class="form-group row">
        <label for="author" class="col-sm-2 col-form-label">Auteur</label>
        <div class="col-sm-10">
            <input type="text" id="author" name="author" value="<?= htmlspecialchars($comment['author']) ?>" class="form-control" />
        </div>
    </div>
    <div class="form-group row">
        <label for="comment" class="col-sm-2 col-form-label">Commentaire</label><br />
        <div class="col-sm-10">
            <textarea id="comment" name="comment" class="form-control"><?= htmlspecialchars($comment['comment']) ?></textarea>
        </div>
    </div>
    <div>
        <input type="submit" class="btn btn-primary" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>