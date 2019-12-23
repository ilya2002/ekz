<div class="content_container">
	<h2>Поезда</h2>
	<div class="train_info">
	<?php
	foreach($model as $el)
	{
		echo "<div class='train'>
				<img src='/web/".$el->image."' width='200px'>
				<a href='train_info?id=".$el->id."'>".$el->name."</a>
			</div>";
	}
	?>
	</div>
</div>
