<?
$cMatchesArr = array();
$query = "SELECT * FROM game WHERE g_date_time >= '" . date ( "Y-m-d H:i:s" ) . "' ORDER BY g_date_time LIMIT 3";
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
while ( $row = mysql_fetch_array ( $result, MYSQL_ASSOC ) )
	$cMatchesArr[] = $row;
	
$cMarksArr = array();

$query = "SELECT gul_game, gul_id, gul_go, gul_remarks FROM game_user_link WHERE gul_user = '" . $UA['user_id'] . "'";
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
while ( $row = mysql_fetch_array ( $result, MYSQL_ASSOC ) )
{
	$cMarksArr[$row['gul_game']] = $row;
}
