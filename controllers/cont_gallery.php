<?
$error_message = array();
$directory = preg_replace( "/[^0-9a-z_\-]/i", "", $GLOBAL_PARAMS[1] );

$path_full =  $_SERVER['DOCUMENT_ROOT'] . '/galleries/' . $directory . '/';
$path_thumbs = $_SERVER['DOCUMENT_ROOT'] . '/galleries/' . $directory . '/thumbs/';

$cache_html = '';

$ImagesArr = $ImageDescr = array();
if ( is_dir( $path_full ) && is_dir( $path_thumbs ) )
{
	 $time_ch 		= filemtime ( $path_full );
	 $cache_name 	= "$directory-$time_ch.cache";
	 
	 if( !cache_exists ( $cache_name ) )
	 {
		 if ( $dh = opendir ( $path_full ) ) 
		 {
	        while ( ( $file = readdir( $dh ) ) !== false) 
	        {
	            if ( is_file( $path_full . $file ) && is_file( $path_thumbs .$file ) )
	            {
	            	$ImagesArr[] = $file;
	            	$size = getimagesize( $path_full . $file, $info);
					if(isset($info['APP13']))
					{
					    $iptc 				= iptcparse( $info['APP13'] );
					    $ImageDescr[$file] 	= win2utf ( $iptc['2#005'][0] );
					}
	            }
	        }
	        closedir($dh);
	     }
	 }
	 else 
	 {
	 	$cache_html = get_cache( $cache_name );
	 }
}

sort( $ImagesArr, SORT_STRING );

if ( !count ( $ImagesArr ) && !$cache_html )
	$error_message[] = 'Такая галерея не найдена';
