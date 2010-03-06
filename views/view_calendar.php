<? $component_name = 'navigation'; include( 'include_component.php' ); ?>
<!-- end header -->
<div id="wrapper">
	<!-- start page -->
	<div id="page">
		<div id="sidebar1" class="sidebar">
			<ul>
			<? $component_name = 'games'; include( 'include_component.php' ); ?>
			</ul>
		</div>

		<!-- start content -->
		<div id="content">
			 <form action="/save_bets/" method="post">
			<div class="post">
				<h1 class="title">Календарь</h1>

				<div class="entry">

					<table cellpadding="2" cellspacing="2" border="1" width="100%">
						<tr>
							<td>No</td>
							<td>Команда 1</td>
							<td>Команда 2</td>
							<td>Дата</td>
							<td>Результат</td>
						<? if ( $user_authorized ): ?>

							<td>Ставки</td>
						<?endif;?>
				</tr>

					<? if ( !count( $MatchesArr ) ):?>
						<tr>
							<td colspan="6">Матчей не найдено</td>
						</tr>
					<?
					else : ?>
					<? $old_tour = 0; ?>
					<? foreach ( $MatchesArr AS $row ): ?>
					<? if ( $old_tour != $row['g_tour'] ):?>
						<tr>
							<td colspan="6" style="font-weight:bold;">Тур <?php echo $row['g_tour']; ?></td>
						</tr>
					<? $old_tour = $row['g_tour']; ?>
					<? endif; ?>

					<? $i++ ?>

						<tr>
							<td><?= $i?></td>
							<td><?= $TeamsArr[$row['g_team1']]?></td>
							<td><?= $TeamsArr[$row['g_team2']]?></td>
							<td style="white-space:nowrap;"><?= $row['g_date_time']?></td>
							<td>&nbsp;<?= $row['g_result']?></td>
						<? if ( $user_authorized ): ?>
							<td><input type="text" size="10" <?= $row['g_date_time'] == $setup_today ? 'readonly title="Скоро матч, ничего менять нельзя!" style="background-color: #C0C0C0;"' : '' ?> name="match_result[<?= $row['g_id']?>]" value="<?= isset ( $MatchResults[$row['g_id']] ) ? $MatchResults[$row['g_id']] : '' ?>"></td>
						<?endif;?>

						</tr>
					<? endforeach; ?>
				<? endif; ?>

					</table>

				</div>
			</div>
			<? if ( $user_authorized ): ?>
			 <input type="submit" value="Save"> 
			<?endif;?>
			</form>
		</div>
		<!-- end content -->

		<!-- start sidebars -->
		<div id="sidebar2" class="sidebar" name="form">
			<ul>
			<? $component_name = 'login'; include( 'include_component.php' ); ?>
			</ul>
		</div>
		<!-- end sidebars -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>
