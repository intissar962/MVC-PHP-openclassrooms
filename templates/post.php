<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
    	<h1>Le super blog de l'AVBN !</h1>
    	<p><a href="index.php">Retour à la liste des billets :</a></p>
        	<div class="news">
            	<h3>
                	<?= htmlspecialchars($post->title); ?>
                	<em>le <?= $post->french_creation_date; ?></em>
            	</h3>
            	<p>
                	<?= nl2br(htmlspecialchars($post->content));?>
            	</p>
        	</div>
            <h2>Commentaires</h2>
			<form method = "POST" action="index.php?action=addComment&id=<?= $post->id ?>">
				<p>
					<label for="author">Auteur</label><br>
					<input type="text" id="author" name="author">
				</p>
				<p>
					<label for="comment">Commentaire</label><br>
					<textarea type="text" id="comment" name="comment"></textarea>
				</p>
				<p>
					<input type = "submit" value = "Soumettre">
				</p>
			</form>

            <?php foreach ($comments as $comment) { ?>
                <div class="comments">
                    <p>
                        <b><?= htmlspecialchars($comment->author); ?></b> 
                        le <?= htmlspecialchars($comment->french_creation_date); ?> 
						<a href="index.php?action=updateComment&id=<?= $comment->id ?>">(Modifier)</a>
                    </p>
                    <p> <?= htmlspecialchars($comment->comment); ?> </p>
                </div>
    	<?php
    	} // The end of the posts loop.
    	?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>