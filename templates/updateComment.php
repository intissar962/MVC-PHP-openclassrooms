<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
    	<h1>Le super blog de l'AVBN !</h1>
    	<p><a href="index.php?action=post&id=<?= $comment->post ?>">Retour au billet :</a></p>
           	
            <h2>Modifier le commentaire</h2>
			<form method = "POST" action="index.php?action=updateComment&id=<?= $comment->post ?>">
				<p>
					<label for="author">Auteur</label><br>
					<input type="text" id="author" name="author" value="<?= htmlspecialchars($comment->author); ?>">
				</p>
				<p>
					<label for="comment">Commentaire</label><br>
					<textarea type="text" id="comment" name="comment"><?= htmlspecialchars($comment->comment); ?></textarea>
				</p>
				<p>
					<input type = "submit" value = "Soumettre">
				</p>
			</form>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>