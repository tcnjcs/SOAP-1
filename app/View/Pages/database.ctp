<div class="container">
	<div class="row-fluid">
		<h1>Connect Brownfield and Pollutant</h1>
			Brownfield IDs
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
			<option value='<?php echo(htmlspecialchars($myrow['pi_num'])); ?>'/>
				<?php echo(htmlspecialchars($myrow['pi_num']));?>
			</option>
			<?php
			    }
			?>
		</select>
	</div>
</div>