<div id="bottom">
<div class="title">New to Triptweets? Sign Up</div>	
<form class="box" role="form" method='POST' action='/users/p_signup'>
	<div class="form-group">
		<label for="firstname">First Name</label>
  		<input type='text' name='first_name' class='form-control' placeholder='First Name'>
	</div>
	<div class="form-group">
		<label for="lastname">Last Name</label>
    	<input type='text' name='last_name' class='form-control' placeholder='Last Name'>
    </div>
    <div class="form-group">
		<label for='email'>Email</label>
    	<input type='email' name='email' class='form-control' placeholder='Your Email'>
    </div>
    <div class="form-group">
		<label for='password'>Password</label>
        <input type='password' name='password' class='form-control' placeholder='Email Password'>
    </div>
    <button type='Submit' class="btn btn-default"> Sign Up</button>
</form>

  <!--If errors - display message-->
    <?php if(isset($error)): ?>
        <div class='error'>
            <p>All fields are required. Please sign up again.</p>
        </div>
    <?php endif; ?>
</div>