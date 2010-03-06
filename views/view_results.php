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

		<!-- start content -->
		<div id="content">
			<div class="post">
			<h1 class="title">Результаты</h1>
				<div class="entry">
				Здесь будет показываться, сколько бутылок пива я выиграл.<br>
					Только Илья должен сделать свою функцию.

				</div>
			</div>
		</div>
		<!-- end content -->

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

