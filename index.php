<?php

include('function.php');

include('header.php');

$status = @$_GET["status"];

echo '

<script>

window.setTimeout(function() {

    $(".alert").fadeTo(500, 0).slideUp(500, function(){

        $(this).remove(); 

    });

}, 3000);

</script>

';

if($status == "welcome")

	echo "<div class='alert alert-success alert-dismissible' role='alert'>

		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>

		  <strong>Welcome!</strong> back, ".$_GET["user"]."

		</div> ";

if($status == "lfailed")

	echo "<div class='alert alert-danger alert-dismissible' role='alert'>

		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>

		  <strong>Failed</strong> I can't find your id & password in database :(

		</div> ";

if($status == "AddSuccess")

	echo "<div class='alert alert-success alert-dismissible' role='alert'>

		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>

		  <strong>Success</strong>Your add ".$_GET["name"]." in database!

		</div> ";

if($status == "AddFailed")

	echo "<div class='alert alert-danger alert-dismissible' role='alert'>

		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>

		  <strong>Failed!</strong> Something its wrong! Please check and try again!

		</div> ";

if($status == "logout")

	echo "<div class='alert alert-warning alert-dismissible' role='alert'>

		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>

		  <strong>Logged Out!</strong> You has been be logged out.

		</div> ";

if($status == "EditSuccess")

	echo "<div class='alert alert-success alert-dismissible' role='alert'>

		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>

		  <strong>Success</strong> You edit successfully entity with name '".$_GET["name"]."'

		</div> ";

if($status == "Deleted")

	echo "<div class='alert alert-success alert-dismissible' role='alert'>

		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>

		  <strong>Success</strong> You deleted successfully entity

		</div> ";

if($status == "Denied")

	echo "<div class='alert alert-danger alert-dismissible' role='alert'>

		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>

		  <strong>Access Denied</strong> You don't have enghout permission to do this action.

		</div> ";

pub();

include('footer.php');

?>