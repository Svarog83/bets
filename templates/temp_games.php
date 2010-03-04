	<li>
		<h2>Ближайшие матчи</h2>
		<ul>
			<? foreach ( $cMatchesArr AS $row ): ?>
			<li>
				<? if ( $user_authorized ): ?>
				<a href="/check_game/<?= $row['g_id'] ?>/" title="Отметиться на игру">
				<? endif;?>
				
				<?= getTeamName( $row['g_team'] ) . ' ' . date ( "Y-m-d H:i", strtotime ( $row['g_date_time'] ) ) ?>
			
				<? if ( isset ( $cMarksArr[$row['g_id']] ) && $cMarksArr[$row['g_id']]['gul_go'] ) : ?>
				<img src="/icon/button.gif" title="Я буду!">
				<? elseif ( !isset ( $cMarksArr[$row['g_id']] ) ) : ?>
				<img src="/icon/help.gif" title="Еще не отметился">
				<? elseif ( isset ( $cMarksArr[$row['g_id']] ) && !$cMarksArr[$row['g_id']]['gul_go'] ) : ?>
				<img src="/icon/exit.gif" title="Не иду">
						<? endif; ?>
			
				<? if ( $user_authorized ): ?>
				</a>
				<? endif;?>
			</li>
			<? endforeach; ?>
		</ul>
	</li>
