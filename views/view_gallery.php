
<? $component_name = 'navigation'; include( 'include_component.php' ); ?>
 
<!-- end header -->
<div id="wrapper">
	<!-- start page -->
	<div id="page">
		<div id="sidebar1" class="sidebar">
			<ul>
				<? $component_name = 'games'; include( 'include_component.php' ); ?>
			</ul>
		</div>
		
		<? 
		if ( $cache_html ) 
		{
			echo $cache_html;
		}
		else 
		{ 
			start_cache();
		?>
		
		<!-- start content -->
		<div id="content">
			<div class="post">
				<h1 class="title">Фотографии</h1>
				<br>
				Листать можно стрелками на клавиатуре "Вправо" и "Влево".
				<br>
				<div class="entry">
				<? if ( count ( $error_message ) ): ?>
				<? echo implode ( '<br>', $error_message ); ?>
				<? else : ?>
				
				<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" media="screen" />
				<script type="text/javascript" src="/javascripts/jquery.js"></script>
				<script type="text/javascript" src="/javascripts/jquery.easing.1.3.js"></script>
				<script type="text/javascript" src="/javascripts/jquery.fancybox-1.2.1.js"></script>
				
				<script type="text/javascript">
				$(document).ready(function() {
					$("#wrap a").fancybox();
				});
			</script>
			<style>
				html, body {
					font: normal 11px Tahoma;
					color: #333;
				}
				
				a {
					outline: none;	
				}
				
				div #wrap {
					background-color: #E1E1E1;
					padding: 0px;
					width: 450px;
				}
				
				#wrap ul { list-style: none; }
				#wrap ul li { display: inline; }
				#wrap ul img {
					border: 5px solid #E1E1E1;
					border-width: 5px 5px 20px;
				}
				#wrap ul a:hover img {
					border: 5px solid #fff;
					border-width: 5px 5px 20px;
					color: #fff;
				}
				
				#wrap ul a:hover { color: #fff; }
			</style>
								
				
				<div id="wrap">
				<ul>
				<? $i = 0; ?>
				<? foreach ( $ImagesArr AS $image ):?>
					<li>
						<a rel="group" href='/galleries/<?= $directory?>/<?= $image?>' title="<?= isset( $ImageDescr[$image] ) ? $ImageDescr[$image] : ''?>"><img src='/galleries/<?= $directory?>/thumbs/<?= $image?>' alt='' /></a>
					</li>
				<? endforeach;?>
				
				</ul>
				</div>
				
				<? endif;?>
					
				
				</div>
			</div>
		</div>
		<!-- end content -->
		<?
				end_cache( $cache_name );
			}
		?>
		<!-- start sidebars -->
		<div id="sidebar2" class="sidebar" name="form">
			<ul>
				<? $component_name = 'login'; include( 'include_component.php' ); ?>
			</ul>
		</div>
		<!-- end sidebars -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>
