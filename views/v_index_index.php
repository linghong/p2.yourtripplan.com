<?php if($user):?>
<p>
	Hello <?=$user->first_name;?>! You have successfully logged in.
</p>
<?php else: ?>
<p>
	Welcome to my site. Please sign up or log in. 
</p>
<?php endif; ?>