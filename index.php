<?
$user_authorized = false;
require_once( $_SERVER['DOCUMENT_ROOT'] . '/incl_main/config_main.php' );

$GLOBAL_PARAMS = array();
if ( isset ( $_SERVER['REDIRECT_URL'] ) ) 
{
	$GLOBAL_PARAMS = explode( '/', trim ( $_SERVER['REDIRECT_URL'], '/' ) );
	if ( isset ( $GLOBAL_PARAMS[0] ) ) 
		$todo = $GLOBAL_PARAMS[0];
}

$setup_cache_reset = ( isset ( $cache_reset ) ? (int)$cache_reset : 0 );

if ( $todo != 'login' )
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/incl_main/check_security.php' );
	
$setup_time_start = microtime( true );

/*if ( !$todo && !$user_authorized )
    $todo = 'not_login';
else if ( !$todo && $user_authorized )
	$todo = 'list_users';*/


/*?>$_REQUEST<pre><?= print_r ( $_REQUEST ) ?></pre><?
exit();*/


$dir_views = './views/';
$dir_controllers = './controllers/';

if ( !isset ( $todo ) || !$todo )
	$todo = 'index';

$todo = preg_replace( "/[^0-9a-z_]/", '', $todo );

$controller = 'cont_' . $todo . '.php';
$view       = 'view_' . $todo . '.php';

if ( $controller && file_exists( $dir_controllers . $controller ) )
    require_once( $dir_controllers . $controller );

require_once( 'header.php' );

//for debugging
if ( $local_server )
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/incl_main/dBug.php' );  
    
if ( file_exists( $dir_views . $view ) )
    $file_name = $dir_views . $view;
else 
    $file_name = $dir_views . 'wrong_action.php';
    
require_once( $file_name );


$time_exec 	= microtime( true ) - $setup_time_start;

require_once( 'footer.php' );