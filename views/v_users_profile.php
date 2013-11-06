<?php foreach($users as $user): ?>

	First Name: <?=$user['first_name']?><br><br>
	Last Name: <?=$user['last_name']?><br><br>
	Account Created: <?=$user['created']?><br><br>
	Email: <?=$user['email']?><br>
	Avator:<img src='/uploads/avatars/' . $image>

<?php endforeach ?>