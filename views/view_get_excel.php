<?
header( 'Content-type:application/vnd.ms-excel' );
header( 'Content-Disposition:attachment;filename=bets_' . date( "Y-m-d_H-i" ) . '.xls' );
?>

<html>
<head>
	<meta http-equiv="Last-Modified" content="<? echo gmdate( "D, M d Y H:i:s" ) ?> GMT">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name=ProgId content=Excel.Sheet>
	<meta name=Generator content="Microsoft Excel 9">
	<style type="text/css">
		<!--
		.style0 {
			mso-number-format: General;
			vertical-align: bottom;
			white-space: nowrap;
			color: windowtext;
			font-size: 10.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: "Arial Cyr";
		}
		.xl35 {
			mso-style-parent: style0;
			font-family: "Arial Unicode MS", sans-serif;
			mso-number-format: "\@";
			white-space: nowrap;
		}

		-->
	</style>
</head>
<body>
<table cellpadding="2" cellspacing="2" border="1" width="100%">
	<tr style="font-weight:bold;">
		<td width="30">No</td>
		<td width="200">Игра</td>
		<td width="100">Результат</td>
	<? foreach ( $PlayersArr AS $user_id => $v ): ?>

		<td colspan="2" width="100"><?= $v['name']?></td>
	<? endforeach; ?>
	</tr>

<? if ( !count( $MatchesArr ) ):?>

	<tr>
		<td colspan="<?= $colspan?>">Матчей не найдено</td>
	</tr>
<?
else : ?>
<? $old_tour = 0; ?>
<? foreach ( $MatchesArr AS $g_id => $row ): ?>
<? if ( $old_tour != $row['g_tour'] ):?>

	<tr style="font-weight:bold;">
		<td colspan="3">Тур <?php echo $row['g_tour']; ?></td>
	<? foreach ( $PlayersArr AS $user_id => $v ): ?>

		<td colspan="2"><?= $row['g_tour'] <= $v['tour'] ? '+' : '-' ?></td>
	<? endforeach; ?>
	</tr>
<? $old_tour = $row['g_tour']; ?>
<? endif; ?>

<? $i++ ?>

	<tr>
		<td><?= $i?></td>
		<td><?= $TeamsArr[$row['g_team1']] . '-' . $TeamsArr[$row['g_team2']] ?></td>
		<td>&nbsp;<?= $row['g_result']?></td>
	<? foreach ( $PlayersArr AS $user_id => $v ): ?>

		<td width="50"><?= isset ( $ResultsArr[$g_id][$user_id] ) ? $ResultsArr[$g_id][$user_id]['points'] : '0' ?></td>
		<td width="50" class="xl35">
			<?= isset ( $ResultsArr[$g_id][$user_id]['result'] ) ? $ResultsArr[$g_id][$user_id]['result'] : '' ?>
		</td>
	<? endforeach; ?>
	</tr>
<? endforeach; ?>

	<tr style="font-weight:bold; font-size: 14pt; text-align:left;">
		<td colspan="3">TOTAL:</td>
	<? foreach ( $PlayersArr AS $user_id => $v ): ?>

		<td colspan="2"><?= isset ( $sum_total[$user_id] ) ? $sum_total[$user_id] : '0' ?></td>
	<? endforeach; ?>
	</tr>
<? endif; ?>

</table>

</body>
</html>

