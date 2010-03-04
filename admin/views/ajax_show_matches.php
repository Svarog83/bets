<table cellpadding="2" cellspacing="2" border="1" width="600">
<tr>
	<td>No</td>
	<td>Противник</td>
	<td>Идут</td>
	<td>Дата</td>
	<td>Комментарии</td>
	<td>Результат</td>
	<td>Список</td>
	<td>Редактировать</td>
</tr>

<? if ( !count ( $MatchesArr ) ):?>
<tr><td colspan="6">Матчей не найдено</td></tr>
<? else : ?>
	<? foreach ( $MatchesArr AS $row ): ?>
	<? $i++ ?>
	<tr>
		<td><?= $i?></td>
		<td><?= $TeamsArr[$row['g_team']]?></td>
		<td style="color:green;"><?= isset( $PlayersArr['good'][$row['g_id']] ) ? $PlayersArr['good'][$row['g_id']] : 0 ?></td>
		<td><?= $row['g_date_time']?></td>
		<td>&nbsp;<?= $row['g_remarks']?></td>
		<td>&nbsp;<?= $row['g_result']?></td>
		<td align="center"><img src="/icon/analyse.gif" title="Посмотреть игроков" style="cursor:pointer;" onclick="ShowWindow('./?todo=match_players&select_game=<?= $row['g_id']?>&no_links=1', 'Игроки', 800, 600);"></td>
		<td align="center"><img src="/icon/edit.gif" title="Edit" style="cursor:pointer;" onclick="ShowWindow('./?todo=match_edit&select_game=<?= $row['g_id']?>&no_links=1', 'Edit game', 600, 500);"></td>
	</tr>
	<? endforeach; ?>
<? endif; ?>

</table>