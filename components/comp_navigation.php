<?

$titles_arr = array();

$titles_arr[] = 'Футбольные боги';
$titles_arr[] = 'Мы верим в Ринатоса';
$titles_arr[] = 'Ринатос - наше все. И даже немного больше.';
$titles_arr[] = 'В футбол играют все. А побеждает МИФИ';
$titles_arr[] = 'Скромность украшает человека. Но не команду';
$titles_arr[] = 'Просто любая пафосная фраза';

$rand = rand ( 0, 5 );
$title = isset ( $titles_arr [$rand] ) ? $titles_arr[$rand] : $titles_arr[0];
