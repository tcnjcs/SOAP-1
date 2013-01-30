
<div class="container">
	<div class="row-fluid">
		<h1>Brownfield Query Builder</h1>
		<form action="#" method="#">
			<select>
<?php
	$db = pg_connect('host=csprojects.tcnj.edu port=5432 dbname=team4d user=team4d password=pulimood'); 
	$query = "SELECT * FROM brownfields LIMIT 10";
    $result = pg_query($query);
    if (!$result) {
    	echo "Problem with query " . $query . "<br/>";
    	echo pg_last_error();
    	exit();
	}
    	while($myrow = pg_fetch_assoc($result)) {
?>
		<option name="county" value='<?php echo(htmlspecialchars($myrow['county'])); ?>'/>
		<?php echo(htmlspecialchars($myrow['county']));?>
		</option>
		<?php
		}
		?>
			</select>
			<select>
<?php
	$db = pg_connect('host=csprojects.tcnj.edu port=5432 dbname=team4d user=team4d password=pulimood'); 
	$query = "SELECT * FROM brownfields LIMIT 10";
    $result = pg_query($query);
    if (!$result) {
    	echo "Problem with query " . $query . "<br/>";
    	echo pg_last_error();
    	exit();
	}
    while($myrow = pg_fetch_assoc($result)) {
?>
			    while($myrow = pg_fetch_assoc($result)) {
			?>
			<option name="pi_name" value='<?php echo(htmlspecialchars($myrow['pi_name'])); ?>'/>
				<?php echo(htmlspecialchars($myrow['pi_name']));?>
			</option>
			<?php
			    }
			?>
		</select>
		<input class="btn" type="submit" value="Query"/>
	</form>
	</div>
</div>