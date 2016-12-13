<?php
require_once("config.php");
require_once("function.php");
include("header.php");
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

if(getaccess(@$_COOKIE['auth'] < 2))
{
	header("Location:index.php?status=Denied");
}
if($_COOKIE['auth'] == false)
{
	header("Location:index.php?status=Denied");
}
if($status == "added")
	echo "<div class='alert alert-success alert-dismissible' role='alert'>
		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		  <strong>Added!</strong> User [ ".$_GET["user"]." ] was added successfully
		</div> ";
?>
<div id="wapper">
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	  <div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
		  <h4 class="panel-title">
			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			  Add User
			</a>
		  </h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
		  <div class="panel-body">
			<form action="add.php" method="POST">
			  <div class="form-group">
				<label for="exampleInputEmail1">User</label>
				<input type="text" class="form-control" id="exampleInputEmail1" placeholder="User" name="user">
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Password</label>
				<input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="pass">
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
			  </div>
			  <center><button type="submit" class="btn btn-success" name="action" value="adduser">Add this User!</button></center>
			</form>
		  </div>
		</div>
	  </div>
	  <div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingTwo">
		  <h4 class="panel-title">
			<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			  Edit Access
			</a>
		  </h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		  <div class="panel-body">
			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
		  </div>
		</div>
	  </div>
	</div>
</div>
<?
include("footer.php");
?>