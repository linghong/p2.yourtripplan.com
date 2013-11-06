<h1> List of All Users</h1>
<?php foreach($users as $user): ?>

<div class="user">
	<?=$user['first_name']?> <?=$user['last_name']?>
    <?php if(isset($connections[$user['user_id']])):?>
		<a href='/posts/unfollow/<?=$user['user_id'] ?>'>   Unfollow</a>
	<?php else: ?>
		<a href = '/posts/follow/<?=$user['user_id'] ?>'>   Follow</a>
	<?php endif; ?>
</div>

<?php endforeach ?>