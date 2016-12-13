<?php
require_once("config.php");
function welcomemail($mail, $user, $pass)
{
	$to = $mail;
}
function getaccess($user)
{
	global $sql;
	$user = $sql->real_escape_string($user);
	$result = $sql->query("SELECT * FROM `user` WHERE `user`='$user' AND `access` > 3");
	if($result->num_rows > 0)
	{
		$row = $result->fetch_row();
		return $row["5"];
	}
}
function pub()
{
	global $sql, $auth;
	$data = $sql->query("select * from download");
		while($row = $data->fetch_row())
		{
			echo "
					<div id='item'>
						<meta name='keywords' content='".$row["3"]."'>
						<span class='cat ".$row["4"]."'>".$row["4"]."</span>
						<span class='cat size'>".$row["8"]." GB</span>
						<span class='cat eps'>".$row["9"]."</span>
						<a style='cursor:pointer' data-toggle='modal' data-target='#".$row["0"]."'>
							<img alt='".$row["1"]."' src='".$row["2"]."' title='".$row["3"]."' />
						</a>
						<p>
							<a style='cursor:pointer' data-toggle='modal' data-target='#".$row["0"]."'>".$row["1"]."</a>
						</p>
					</div>
			<!-- [".$row['1']."] - Modal -->
			<div class='modal fade' id='".$row['0']."' tabindex='-1' role='dialog' aria-labelledby='".$row['1']."'>
			  <div class='modal-dialog modal-lg' role='document'>
				<div class='modal-content'>
				  <div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title' id='myModalLabel'>".$row['1']."</h4>
				  </div>
				  <div class='modal-body'>
					<center><h1>".$row["1"]."</h1></center>
					<hr/>
					<table class='table table-hover'>
						<thead>
							<tr>
								<td>Name</td>
								<td>Type</td>
								<td>Eps</td>
								<td>Size</td>
								<td>M.A.L.</td>
								<td>Wien-Subs</td>
								<td>Langue</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>".$row["1"]."</td>
								<td>".$row["4"]."</td>
								<td>".$row["9"]."</td>
								<td>".$row["8"]." GB</td>
								<td><a href='".$row["6"]."'>To MAL</a></td>
								<td><a href='".$row["7"]."'>To W-S</a></td>
								<td>".$row["10"]."</td>
						</tbody>
					</table>
					<div class='well well-lg'>
					".download($row["5"])."
					</div>
				  </div>
				  <div class='modal-footer'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
					if($auth == true)
						echo "<button type='button' class='btn btn-danger'><a href='edit.php?id=".$row["0"]."' style='text-decoration:none; color:white;'>Edit Enity</a></button>";
		echo "
				  </div>
				</div>
			  </div>
			</div>
			";
		}
}

function search($data)
{
	global $sql, $auth;
	$keys = $sql->real_escape_string($data);
	$sqldo = $sql->query("select * from `download` where `nume` like '%$keys%' OR `tag` like '%$keys%'");
	if($sqldo->num_rows > 0)
	{
		while($row = $sqldo->fetch_row())
		{
			echo "
					<div id='item'>
						<meta name='keywords' content='".$row["3"]."'>
						<span class='cat ".$row["4"]."'>".$row["4"]."</span>
						<span class='cat size'>".$row["8"]." GB</span>
						<a style='cursor:pointer' data-toggle='modal' data-target='#".$row["0"]."'>
							<img alt='".$row["1"]."' src='".$row["2"]."' title='".$row["3"]."' />
						</a>
						<p>
							<a style='cursor:pointer' data-toggle='modal' data-target='#".$row["0"]."'>".$row["1"]."</a>
						</p>
					</div>
			<!-- [".$row['1']."] - Modal -->
			<div class='modal fade' id='".$row['0']."' tabindex='-1' role='dialog' aria-labelledby='".$row['1']."'>
			  <div class='modal-dialog modal-lg' role='document'>
				<div class='modal-content'>
				  <div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title' id='myModalLabel'>".$row['1']."</h4>
				  </div>
				  <div class='modal-body'>
					<center><h1>".$row["1"]."</h1></center>
					<hr/>
					<table class='table table-hover'>
						<thead>
							<tr>
								<td>Name</td>
								<td>Type</td>
								<td>Eps</td>
								<td>Size</td>
								<td>M.A.L.</td>
								<td>Wien-Subs</td>
								<td>Langue</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>".$row["1"]."</td>
								<td>".$row["4"]."</td>
								<td>".$row["9"]."</td>
								<td>".$row["8"]." GB</td>
								<td><a href='".$row["6"]."'>To MAL</a></td>
								<td><a href='".$row["7"]."'>To W-S</a></td>
								<td>".$row["10"]."</td>
						</tbody>
					</table>
					<div class='well well-lg'>
					".download($row["5"])."
					</div>
				  </div>
				  <div class='modal-footer'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
					if($auth == true)
						echo "<button type='button' class='btn btn-danger'><a href='edit.php?id=".$row["0"]."' style='text-decoration:none; color:white;'>Edit Enity</a></button>";
		echo "
				  </div>
				</div>
			  </div>
			</div>
			";
		}
	}
	else
		echo "<center><h1 style='color:tomato'>Nu sau gasit rezultate</h1></center>";
}

function download($data)
{
	$thi = null;
	$th = explode("\n", $data);
	foreach($th as $dlink)
	{
		$thi .= "<a href='$dlink'> $dlink </a> <br/>";
	}
	return $thi;
}