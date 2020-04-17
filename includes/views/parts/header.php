<!DOCTYPE html>
<html lang="de">
<head>
	<title><?php echo $this->title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">

	<?php if($this->current == "login"): ?>
		<link href="css/login.css" rel="stylesheet">
        <link href="css/registrierung.css" rel="stylesheet">
    <?php elseif($this->current == "scoreboard"): ?>
        <link href="css/scoreboard.css" rel="stylesheet">
    <?php elseif($this->current == "home"): ?>
        <link href="css/home.css" rel="stylesheet">
    <?php elseif($this->current == "game"): ?>
        <link href="css/game.css" rel="stylesheet">
    <?php elseif($this->current == "rules"): ?>
        <link href="css/rules.css" rel="stylesheet">
    <?php elseif($this->current == "logout"): ?>
        <link href="css/logout.css" rel="stylesheet">
    <?php elseif($this->current == "404"): ?>
        <link href="css/404.css" rel="stylesheet">
    <?php else: ?>
        <link href="css/main.css" rel="stylesheet">
    <?php endif; ?>

    <link href="css/headerFooter.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<?php if($this->current == "index"): ?>
		<script type="text/javascript" src="js/core.js"></script>
	<?php elseif($this->current == "register"): ?>
		<script type="text/javascript" src="js/register.js"></script>
	<?php elseif($this->current == "login"): ?>
		<script type="text/javascript" src="js/toastr.min.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
	<?php endif; ?>

</head>
<body>
<header>
	<div class="inner">
		<div class="logo">
		</div>
        <?php if(LOGGED_IN == true): ?>
			<nav class="navbar navbar-default myNavbar">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="/webdev-project-haudenmaulwurf/home" class="navbar-brand active">Hau den Maulwurf</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


						<ul class="nav navbar-nav navbar-right">
							<li><a href="logout">(Abmelden)</a></li>
						</ul>

						<p class="navbar-text navbar-right">Angemeldet als <strong class="username"><?php echo $this->username; ?></strong></p>

					</div>
				</div>
			</nav>

        <?php else: ?>
			 <!--<nav class="mainnav">
				<ul class="nav nav-pills">
					<li<?php if($this->current == "login"): ?>class="active"<?php endif; ?>><a href="login">Login</a></li>
				</ul>
			</nav> -->
		<?php endif;  ?>

	</div>
</header>