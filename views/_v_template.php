<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<!-- Common CSS/JSS -->
	<link rel="stylesheet" href="/css/addp.css" type="text/css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.mim.js"></script>	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
<nav>
		<menu>
			<!-- Menu for users who are logged in -->
			<php if($user): ?>
				<li><a href='/post/add'>Add Post</a></li>
				<li><a href='/posts'>View Posts</a></li>
				<li><a href='posts/users'>Follow Users</a></li>
				<li><a href='/users/logout'>Logout</a></li>
				<li><a href='/users/profile'>Profile</a></li>

			<!-- Menu for users who are not logged in -->
			<?php else: ?>
				<li><a href='/users/signup'>Sign up</a></li>
				<li><a href='/users/login'>Log in</a></li>

			<?php endif; ?>
		</menu>
	</nav>



	<?php if(isset($content)) echo $content; ?>


	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>