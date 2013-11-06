<h2>Log in</h2>
<form class="box" method='POST' action='/users/p_login'>
   Email: <input type='text' name='email'><br><br>

   password: <input type='password' name='password'><br><br>

   <?php if(isset($error)): ?>
   		<div class='error'>
   			Login failed. Please double check your email and password.
   		</div>
   		<br>
   	<?php endif; ?>

   <input type='Submit' value='Log in'>
   
</form>