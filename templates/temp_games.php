    <li>
		<h2>Тур <?php echo $S_TOUR?></h2>
		<ul>
			<? foreach ( $cMatchesArr AS $row ): ?>
			<li>
				<?= getTeamName( $row['g_team1'] ) . '-' . getTeamName( $row['g_team2'] )  ?>
				<b><?= isset ( $cMatchResults[$row['g_id']] ) ? $cMatchResults[$row['g_id']] : '-' ?></b>
			</li>
			<? endforeach; ?>
		</ul>
	</li>
