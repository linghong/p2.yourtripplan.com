<!DOCTYPE html>
<html>
	<head>
		<title><?php if(isset($title)) echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<!-- Common CSS/JSS -->
		<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="/css/app.css" type="text/css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.mim.js"></script>	
		<script src="js/respond.min.js"></script>

		<!-- Controller Specific JS/CSS -->
		<?php if(isset($client_files_head)) echo $client_files_head; ?>
	</head>

	<body>	
		<div class="container">
			<!-- Site Header.................................................Site Header-->
				<!-- row1: Site Name-->
				<header class="row" >
					<a href="/">TripTweets</a>
				</header>

			<!-- Site Main body.............................................Site Main body-->
			<!-- for users who are logged in, add Menu and Content-->
			<?php if($user): ?>
				<!--row2: navigation -->
				<div class="row">
					<nav  class="navbar navbar-default" role="navigation">
					 	<div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
			                    <span class="sr-only">Toggle navigation</span>
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>
			                </button>
		            	</div>
		            	<div class="collapse navbar-collapse" id="collapse">
							<ul class="nav navbar-nav">
								<li><a href='/posts/myposts'>My Posts</a></li>
								<li><a href='/posts/add'>Add Posts</a></li>
								<li><a href='/posts'>View Posts</a></li>
								<li><a href='/posts/users'>User List</a></li>		
								<li><a href = '/users/profile/'>My Profile</a></li>
								<li><a href='/users/avatar'>Add Avata</a></li>
								<li><a href='/users/logout'>Log out</a></li>
							</ul>
						</div>
					</nav>
				</div>

				<!--row3-->
				<div class="row">
					<article class = "col-lg-12 col-md-12">
						<?php if(isset($content)) echo $content; ?>
					</article>
				</div>

			<!-- for users who are not logged in, Sign up or login -->
			<?php else: ?>
				<!--row2-->
				<div class="row background">
					<aside class="col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
						<?php if(isset($content)) echo $content; ?>
					</aside>

					<article class="col-lg-7 col-md-7 ">
						<div id="top" class="col-lg-offset-2 col-md-8 col-md-offset-2 col-md-8 col-sm-5 col-xs-offset-1 col-xs-10 ">
							<?php if(isset($login)) echo $login; ?>
						</div>
						<div id="bottom" class="col-lg-offset-2 col-md-8 col-md-offset-2 col-md-8 col-xs-offset-2 col-sm-5 col-xs-offset-1 col-xs-10 ">
							<?php if(isset($signup)) echo $signup; ?>
						</div>
					</article>
				</div>
				
			<?php endif; ?>

			<!-- Site Footer.............................................Site Footer-->
			<footer>
				© diyvacation since 2014 | Contact | About|Home|
			</footer>

		</div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="js/bootstrp.min.js"></script>

		<?php if(isset($client_files_body)) echo $client_files_body; ?>

	</body>
</html>