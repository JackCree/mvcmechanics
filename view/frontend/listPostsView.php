<!--Define the title of the page -->
<?php  
    $title = 'Mon blog'; 
?>
<!--Define the content of the page -->
<?php 
    //Memorize all elements to put into the HTML file
    ob_start(); 
?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
    while ($data = $posts->fetch())
{
?>       

    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts -> closeCursor();
?>
<?php 
    //Get all the elements into the the content variable as html elements
    $content= ob_get_clean(); 
?>
<!-- Call the template and get the title and the content inside it to print it -->
<?php 
    require ('template.php');
?>



