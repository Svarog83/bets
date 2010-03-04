<?
$select_game = ( isset ( $select_game ) ? intval( $select_game ) : 0 );

if ( is_array( $check_user ) && $select_game )
{

	$query = "SELECT * FROM game WHERE g_id = '$select_game'";
	$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
	$MatchArr = mysql_fetch_array( $result, MYSQL_ASSOC );
		
	$query = "SELECT * FROM user WHERE user_id IN ('" . implode ( "','", $check_user ) . "') && user_email != ''";
	$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );




$time = strtotime( $MatchArr['g_date_time'] );

$message = '
Привет, REPLACE_NAME!

' . date ( "Y-m-d", $time ) . ' в ' . date ( "H:i", $time ) . ' состоится игра против команды "' . getTeamName( $MatchArr['g_team'] ) . '"
' . ( $MatchArr['g_remarks'] ? '(Доп. информация: ' . $MatchArr['g_remarks'] .')' : '' ) . '

Нужно отметиться на сайте.

Подробности можно узнать по адресу:
' . $www_main_full . '/check_game/'.$select_game.'/

' . ( $form_message ? 
'
Комментарии:
-----------------
' . str_replace ( '<br>', "\n", html_entity_decode( $form_message, ENT_QUOTES ) ) . '
-----------------

' :'' ) . '
Для входа на сайт использовать:

Логин: REPLACE_LOGIN
REPLACE_PASS

Спасибо.

';

	$arr_t = array();

	while ( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) )
	{
		$headers = 'From: Sergey Vetko <S.Vetko@fcmifi.ru>' . "\r\n" .
		'Reply-To: S.Vetko@fcmifi.ru' . "\r\n" .
		'Content-type: text/plain; charset=utf-8';
		
		$password = ( $row['user_pwd'] == '9e3669d19b675bd57058fd4664205d2a' ? 'Пароль: v (лучше сменить его!)' : '' );
		
		$mess = str_replace( "REPLACE_NAME", $row['user_name'], $message );
		$mess = str_replace( "REPLACE_LOGIN", $row['user_login'], $mess );
		$mess = str_replace( "REPLACE_PASS", $password, $mess );
		
		
		mail ( $row['user_email'], 'Мифи. Матч против команды ' . getTeamName( $MatchArr['g_team'] ) , $mess, $headers );
		
		$arr_t[] = $row['user_id'];
	}
	
	if ( count ( $arr_t ) )
	{
		$query = "DELETE FROM email WHERE em_game = '$select_game' && em_user IN (' " . implode( "','", $arr_t ) . "')";
		$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
		
		foreach ( $arr_t AS $user_id )
		{
			$query = "INSERT INTO email SET em_game = '$select_game', em_user='$user_id' ";
			$result = mysql_query( $query ) or eu( __FILE__, __LINE__, $query );
		}
	}
}

$controller = 'match_players.php';

if ( $controller && file_exists( $dir_controllers . $controller ) )
    require_once( $dir_controllers . $controller );


