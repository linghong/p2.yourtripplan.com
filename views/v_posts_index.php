<?php  foreach($posts as $post): ?>

<article>

	<strong><?=$post['first_name']?>posted</strong>

	<p><?=$post['content']?></p>
</article>

<?php endforeach; ?>