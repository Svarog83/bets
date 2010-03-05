    <li>
		<h2>Тур <?php echo $S_TOUR?></h2>
		<ul>
			<? foreach ( $cMatchesArr AS $row ): ?>
			<li>
				<? if ( $user_authorized && 0 ): ?>
				<a href="/check_game/<?= $row['g_id'] ?>/" title="Отметиться на игру">
				<? endif;?>
				
				<?= getTeamName( $row['g_team1'] ) . '-' . getTeamName( $row['g_team2'] ) .'<br>' . $row['g_date_time']  ?>
			
				<? if ( $user_authorized && 0 ): ?>
				</a>
				<? endif;?>
			</li>
			<? endforeach; ?>
		</ul>
	</li>
