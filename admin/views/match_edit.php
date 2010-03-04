<link rel="stylesheet" type="text/css" media="all" href="/css/calendar-win2k-cold-1.css" title="win2k-cold-1" />
<link rel="stylesheet" type="text/css" href="/css/style.css"/>
<script type="text/javascript" src="/javascripts/calendar.js"></script>
<script type="text/javascript" src="/lang/calendar-en.js"></script>
<script type="text/javascript" src="/javascripts/calendar-setup.js"></script>

<fieldset>
<form name="form" method="POST" action="./?todo=match_save&no_links=true">
<input type="hidden" name="select_game" value="<?= $select_game?>">
<table width="90%" border="0" cellpadding="2" cellspacing="2">

<tr>
<td>Соперник</td>
<td>
<? 

$arr = array();
$arr['field_name'] 		  	= 'g_team';
$arr['onchange']   		  	= 'self.focus()';
$arr['show_select_title'] 	= 'Противник';
$arr['selected_value'] 		= isset ( $MatchArr['g_team'] ) ? $MatchArr['g_team']: '';	
$arr['select_values'] 		= $TeamsArr;

echo PrepareSelect( $arr ); 
?>
</td>
</tr>

<tr>
<td>Начало</td>
<td>

<input type="text" id="input_date" name="g_date_time" value="<?= isset ( $MatchArr['g_date_time'] ) ? $MatchArr['g_date_time'] : '' ?>" size="20"><button id="button_date" value="Date">
</td>
</tr>

<tr>
<td>Описание</td>
<td>
<input type="text" name="g_remarks" value="<?= isset ( $MatchArr['g_remarks'] ) ? $MatchArr['g_remarks'] : '' ?>" size="60">
</td>
</tr>


<tr>
<td>Результат</td>
<td>
<input type="text" name="g_result" value="<?= isset ( $MatchArr['g_result'] ) ? $MatchArr['g_result'] : '' ?>" size="60">
</td>
</tr>

</table>

<br>
<br>
<center>
<? DrawButton( 'Save', 'document.form.submit();', '/icon/button.gif', '', '' ); ?>
&nbsp;&nbsp;
<? DrawButton( 'Close window', "parent.Windows.closeAll();", '/icon/exit1.gif', '', '' ); ?>
</center>

</form>
</fieldset>

<script type="text/javascript">
Calendar.setup({
    inputField     :    "input_date",      // id of the input field
    ifFormat       :    "%Y-%m-%d %H:%M:%S",       // format of the input field
    showsTime      :    true,            // will display a time selector
    button         :    "button_date",   // trigger for the calendar (button ID)
    singleClick    :    true,           // double-click mode
    timeFormat     :    "24",
    firstDay       :    1
});
</script>