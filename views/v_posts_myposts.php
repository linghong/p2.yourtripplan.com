<?php  foreach($posts as $post): ?>


	<strong><?=$post['first_name']?>  posted on</strong>
	<time>
		<?=Time::display($post['created'])?>
	</time>
	<strong>:</strong>
	<div class="post">
	<?=$post['content']?>
	</div>

<?php endforeach; ?>