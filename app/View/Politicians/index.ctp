<div class="span2">
	<?php echo $this->element('sidebar'); ?>
</div>
<div class="span10">
	<ul class="thumbnails">
	<?php foreach ($politicians as $politician): ?>
		<li class="span3">
			<div class="thumbnail">
				<img src="<?php echo $politician['Politician']['imageurl']; ?>" alt=""/>
				<div class="caption" style="text-align:center;">
					<h3 style="color:#F5F3DC;"><?php echo $politician['Politician']['name']; ?></h3>
					<h4 style="color:#F5F3DC;">
						<?php
							if ($politician['Politician']['party'] === "D")
								echo 'Democrat';
							else if ($politician['Politician']['party'] === "R")
								echo 'Republican';
							else if ($politician['Politician']['party'] === "I")
								echo 'Independent';
							else if ($politician['Politician']['party'] === "O")
								echo 'Other';
						?>
					</h4>
					<h4 style="color:#F5F3DC;"><?php echo 'District Number: '.$politician['Politician']['district_num'].''; ?></h4>
					<br>
					<p>
						<a href="#" class="btn btn-primary">E-mail</a>
						<a href="#" class="btn">Call</a>
					</p>
				</div>
			</div>
		</li>
	<?php endforeach; ?>
	</ul>
	<!-- <?php echo $this->Facebook->comments(); ?> -->
</div>

