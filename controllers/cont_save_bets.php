<?php
if ( !$user_authorized ) redirect( '/no_admission/' );

$MatchResults = get_match_results( $UA['user_id'] );

$match_result = $_REQUEST['match_result'];

if ( is_array ( $match_result ) && count ( $match_result ) )
{
	$MatchesArr = $query_arr = array();
	foreach ( $match_result AS $g_id => $result )
	{
		$result = str_replace ( ':', '-', trim ( $result ) );

		if ( $result && preg_match ( "/[0-9]{1,2}-[0-9]{1,2}/", $result ) && ( !isset ( $MatchResults[$g_id] ) || $result != $MatchResults[$g_id] ) )
		{
			$MatchesArr[] = $g_id;
			
			$query_arr[] = "
				INSERT INTO
			match_result
				SET
			mr_activ 	= 'a',
			mr_game 	= '" . (int) $g_id . "',
			mr_user 	= '" . (int) $UA['user_id'] . "',
			mr_result 	= '" . mysql_real_escape_string( $result ) . "',
			mr_change_time = '" . date ( "Y-m-d H:i:s" ) . "'
			";
		}
	}

	if ( count ( $MatchesArr ) )
	{
		$query = "UPDATE match_result SET mr_activ = 'ch', mr_change_time = '" . date ( "Y-m-d H:i:s" ) . "' WHERE mr_user = '" . $UA['user_id'] . "' && mr_game IN ('" . implode( "', '", $MatchesArr ) . "')";
		$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
	}

	foreach ( $query_arr AS $query )
		$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
}

redirect( "/calendar/");