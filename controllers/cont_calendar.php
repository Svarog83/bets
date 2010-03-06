<?
$query = "SELECT * FROM game WHERE 1 ORDER BY g_tour, g_date_time";

$MatchesArr  = array();
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) )
{
	$MatchesArr[] = $row;
}

$TeamsArr = getTeams();
$MatchResults = ( $user_authorized ? get_match_results ( $UA['user_id'] ) : array() );
