<?php

require_once("config.php");

$user = @$_COOKIE['user'];

$auth = @$_COOKIE['auth'];

?>

<!Doctype HTML>

<html>

	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?=$cfg['title']?></title>

		<link href="<?=$cfg['patch'];?>/css/bootstrap.min.css" rel="stylesheet">

		<link href="<?=$cfg['patch'];?>/css/style.css" rel="stylesheet">

		<!--[if lt IE 9]>

			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

		<![endif]-->

	</head>

	<body>

		<nav class="navbar navbar-default navbar-fixed-top">

		  <div class="container-fluid">

			<div class="navbar-header">

			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

				<span class="sr-only">Toggle navigation</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

			  </button>

			  <a class="navbar-brand" href="index.php">W-S</a>

			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			  <ul class="nav navbar-nav">

				<li><a href="http://www.wien-subs.ro">[RO] Wien-Subs</a></li>

				<li><a href="http://en.wien-subs.ro">[EN] Wien-Subs</a></li>

				<li><a href="http://proiecte.wien-subs.ro">Proiecte</a></li>

				<li><a href="http://wien-subs.ro/forum">Forum</a></li>

			  </ul>

			  <form class="navbar-form navbar-left" role="search" method='GET' action='search.php'>

				<div class="form-group">

				  <input name='data' type="text" class="form-control" placeholder="Cautare">

				</div>

				<button type="submit" name='action' value='cauta' class="btn btn-default">Cauta</button>

			  </form>

			  <ul class="nav navbar-nav navbar-right">

			  <? if($auth == true)

echo'

				<li class="dropdown">

				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> '.$user.' <span class="caret"></span></a>

				  <ul class="dropdown-menu">

					<li><a href="admin.php">Admin</a></li>

					<li><a style="cursor:pointer" data-toggle="modal" data-target="#Add">Adauga</a></li>

					<li><a href="#">Manager</a></li>

					<li role="separator" class="divider"></li>

					<li><a href="login.php?action=logout">Logout</a></li>

				  </ul>

				</li>

';

else

	echo '<li><a style="cursor:pointer" data-toggle="modal" data-target="#Login">Login</a></li>';?>

			  </ul>

			</div>

		  </div>

		</nav>

<?

if(!$auth == true)

echo '

<!-- Modal -->

<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="Authentification">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

	<form action="login.php" method="POST">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">Authentification</h4>

      </div>

      <div class="modal-body">

		  <div class="form-group">

			<label for="exampleInputEmail1">Username</label>

			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" name="user">

		  </div>

		  <div class="form-group">

			<label for="exampleInputPassword1">Password</label>

			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">

		  </div>

		  <div class="checkbox">

			<label>

			  <input type="checkbox" name="remember" value="true"> Remember me for a week

			</label>

		  </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button class="btn btn-danger" name="action" value="login" type="submit">Login</button>

      </div>

	</form>

    </div>

  </div>

</div>

';

else

echo "

<!-- Add Anime [Modal] -->

<div class='modal fade' id='Add' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>

  <div class='modal-dialog modal-lg' role='document'>

    <div class='modal-content'>

      <div class='modal-header'>

        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>

        <h4 class='modal-title' id='myModalLabel'>Add Pack to site</h4>

      </div>

	<form action='add.php' method='POST'>

      <div class='modal-body'>

  <div class='form-group'>

    <label>Name</label>

    <input type='text' class='form-control' placeholder='Numele Anime' name='nume'>

  </div>

  <div class='form-group'>

    <label>Link Imagine</label>

    <input type='text' class='form-control' placeholder='Link Imagine' name='img'>

  </div>

  <div class='form-group'>

    <label>Link MAL</label>

    <input type='text' class='form-control' placeholder='Link MAL' name='mal'>

  </div>

  <div class='form-group'>

    <label>Link Wien-Subs</label>

    <input type='text' class='form-control' placeholder='Link Wien-Subs' name='ws'>

  </div>

  <div class='form-group'>

    <label>Alias</label>

    <input type='text' class='form-control' placeholder='Ex: DBZ sau S.A.O.' name='alias'>

  </div>

  <div class='form-group'>

    <label>Numar Episoade</label>

    <input type='number' class='form-control' placeholder='Numarul de Episoade' name='eps'>

  </div>

  <div class='form-group'>

    <label>Marime</label>

    <input type='Text' class='form-control' placeholder='Exprimati marima in GB ex: 0.7 sau 1.9 sau 50.4 sau 50' name='size'>

	<p class='help-block'>NU adaugat GB/MB/Byte va rog! doar marimea!</p>

  </div>

  <div class='form-group'>

    <label>Limba</label>

    <input type='Text' class='form-control' placeholder='RO sau EN' name='lang'>

  </div>

  <div class='form-group'>

    <label>Link catre surse</label>

    <textarea class='form-control' rows='6' name='data'></textarea>

	<p class='help-block'>o singura sursa pe rand VA ROG! (dupa ce pui link dai enter)</p>

  </div>

  <div class='form-group'>

    <label>Tipul</label>

	<select class='form-control' name='tip'>

	  <option value='complet'>Complet</option>

	  <option value='OVA'>OVA</option>

	  <option value='ONA'>ONA</option>

	  <option value='manga'>Manga</option>

	</select>

  </div>

      </div>

      <div class='modal-footer'>

        <button type='button' class='btn btn-default' data-dismiss='modal'>Inchide</button>

        <button type='submit' class='btn btn-primary' name='action' value='add'>Adauga Anime</button>

      </div>

    </form>

    </div>

  </div>

</div>

";

?>