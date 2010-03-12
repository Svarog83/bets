<?
if ( !checkRights ( array ( 'user' ) ) ) redirect( '/no_admission/' );
//TODO Кеширование. Хранить сумму очков по турам, каждый раз не считать.
$TeamsArr = getTeams();

$PlayersArr = array();
$query = "SELECT user_id, user_name, user_fam, user_last_tour FROM user WHERE user_state = 'a' ORDER BY user_name";
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) )
	$PlayersArr[$row['user_id']] = array ( 'name' => $row['user_name'], 'tour' => $row['user_last_tour'] );

$colspan = 3 + count ( $PlayersArr );

$MatchesArr = array();
if ( !isset ( $to_excel ) )
	$query = "SELECT * FROM game WHERE g_result != '' ORDER BY g_tour, g_date_time, g_id";
else
	$query = "SELECT * FROM game WHERE g_tour <= '" . $UA['user_last_tour'] . "' ORDER BY g_tour, g_date_time, g_id";
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );

$arr_t = array();
while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) )
{
	$MatchesArr[$row['g_id']] = $row;
	$arr_t[] = $row['g_id'];
}

$sum_tour = $sum_total = array();
$ResultsArr = array();
$query = "
	SELECT
mr_game,
mr_user,
mr_result
    FROM
match_result
    WHERE
mr_game IN ( '" . implode( "', '", $arr_t ) . "' ) &&
mr_activ = 'a'
";
$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) )
{
	$real_result	= $MatchesArr[$row['mr_game']]['g_result'];
	$g_tour 		= $MatchesArr[$row['mr_game']]['g_tour'];
	$points 		= $real_result && $row['mr_result'] ? CalculatePoints( $real_result, $row['mr_result'] ) : 0;

	if ( !isset ( $sum_tour[$g_tour][$row['mr_user']] ) )
		$sum_tour[$g_tour][$row['mr_user']] = 0;

	if ( !isset ( $sum_total[$row['mr_user']] ) )
		$sum_total[$row['mr_user']] = 0;

	$sum_tour[$g_tour][$row['mr_user']] += $points;
	$sum_total[$row['mr_user']] += $points;

	$ResultsArr[$row['mr_game']][$row['mr_user']] = array ( 
							'result' => $row['mr_result'],
							'game' => $row['mr_game'],
							'points' => $points );
}