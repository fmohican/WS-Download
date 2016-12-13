<?php
require_once("config.php");
require_once("function.php");
include("header.php");
$id = $_GET["id"];
$data = $sql->query("Select * from download where `id`='$id' limit 1");
$row = $data->fetch_row();
?>
<div id="wapper">
	<form action='add.php' method='POST'>
	  <div class='form-group'>
		<label>Name</label>
		<input type='text' class='form-control' placeholder='Numele Anime' name='nume' value='<?=$row["1"];?>'>
	  </div>
	  <div class='form-group'>
		<label>Link Imagine</label>
		<input type='text' class='form-control' placeholder='Link Imagine' name='img' value='<?=$row["2"];?>'>
	  </div>
	  <div class='form-group'>
		<label>Link MAL</label>
		<input type='text' class='form-control' placeholder='Link MAL' name='mal' value='<?=$row["6"];?>'>
	  </div>
	  <div class='form-group'>
		<label>Link Wien-Subs</label>
		<input type='text' class='form-control' placeholder='Link Wien-Subs' name='ws' value='<?=$row["7"];?>'>
	  </div>
	  <div class='form-group'>
		<label>Alias</label>
		<input type='text' class='form-control' placeholder='Ex: DBZ sau S.A.O.' name='alias' value='<?=$row["3"];?>'>
	  </div>
	  <div class='form-group'>
		<label>Numar Episoade</label>
		<input type='number' class='form-control' placeholder='Numarul de Episoade' name='eps' value='<?=$row["9"];?>'>
	  </div>
	  <div class='form-group'>
		<label>Marime</label>
		<input type='Text' class='form-control' placeholder='Exprimati marima in GB ex: 0.7 sau 1.9 sau 50.4 sau 50' name='size' value='<?=$row["8"];?>'>
		<p class='help-block'>NU adaugat GB/MB/Byte va rog! doar marimea!</p>
	  </div>
	  <div class='form-group'>
		<label>Limba</label>
		<input type='Text' class='form-control' placeholder='RO sau EN' name='lang' value='<?=$row["10"];?>'>
	  </div>
	  <div class='form-group'>
		<label>Link catre surse</label>
		<textarea class='form-control' rows='6' name='data'><?=$row["5"];?></textarea>
		<p class='help-block'>o singura sursa pe rand VA ROG! (dupa ce pui link dai enter)</p>
	  </div>
	  <div class='form-group'>
		<label>Tipul</label>
		<select class='form-control' name='tip'>
		  <option value='complet'>Complet</option>
		  <option value='OVA'>OVA</option>
		  <option value='ONA'>ONA</option>
		  <option value='manga'>Manga</option>
		  <option value='movie'>Movie</option>
		</select>
	  </div>
<center>
		<input type="hidden" name='id' value='<?=$id;?>'>
		<button type='submit' class='btn btn-primary' name='action' value='update'>Save changes</button>
	</form>

	<form action='add.php' method="POST">
		<div class="checkbox">
			<label>
				<input type="checkbox" id="check" onclick = "document.getElementById('postme').disabled=false;"> I want to delete this!
			</label>
		</div>
				<input type="hidden" name='id' value='<?=$id;?>'>
				<input type="hidden" name='name' value='<?=$row["1"];?>'>
				<button type='submit' id="postme" class='btn btn-danger' name='action' value='delete' disabled>Delete Enity</button>
	</form>
</center>
</div>
<?
include("footer.php");
?>