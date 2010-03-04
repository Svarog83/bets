<?

$query = "SELECT * FROM game WHERE ";

if ( $select_team )
	$query .= "g_team = '$select_team' && ";
	
$query .= " 1 ORDER BY g_date_time";

$MatchesArr  = array();
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) )
{
	$MatchesArr[] = $row;
}


$PlayersArr = array();

$query = "SELECT gul_game, COUNT(*) AS cnt FROM game_user_link WHERE gul_go = 1 GROUP BY gul_game";
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
while ( $row = mysql_fetch_array ( $result, MYSQL_ASSOC ) )
	$PlayersArr['good'][$row['gul_game']] = $row['cnt'];
	
$TeamsArr = getTeams();