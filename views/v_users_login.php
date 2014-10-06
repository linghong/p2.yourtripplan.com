<div id="top"> 
<div class='title'>Log in</div>
<form class='box' role='form' method='POST' action='/users/p_login'>
	<div class='form-group'>
		<label for='email'>Email</label>
   		<input type='email' name='email' class='form-control' placeholder='Enter email'>
   	</div>
	<div class='form-group'>
		<label for='password'>Password</label>
   		<input type='password' name='password' class='form-control' placeholder='Enter password'>
   	</div>

    <!--If errors - display message-->
    <?php if(isset($error)): ?>
        <div class='error'>
            <p>Login failed. Please double check your email and password.</p>
        </div>
    <?php endif; ?>

   <button type='Submit' class='btn btn-default'> Log in</button>
   
</form>
</div>