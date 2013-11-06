<?php  foreach($posts as $post): ?>


	<strong><?=$post['first_name']?>  posted:</strong>

	<div class="post">
	<?=$post['content']?>
	</div>


<?php endforeach; ?>