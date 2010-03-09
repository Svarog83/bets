<?
if ( !count ( $ResultsArr ) )
    echo 'Ставок пока нет';
else
{
?>
<table cellpadding="2" cellspacing="2" border="1" width="100%">
<tr>
    <td width="90%">Имя</td>
    <td width="10%">Ставка</td>
</tr>
    <? foreach ( $ResultsArr AS $row ): ?>
    <tr>
    <td style="white-space:nowrap;"><?= $row['user_name'] . ' ' . $row['user_fam'] ?></td>
    <td><?= $row['mr_result']  ?></td>
</tr>
    <? endforeach; ?>
</table>

<?
}


