<div class="content_container">
	<h2>История поездок</h2>
	<?php 
	foreach($model as $el)
	{
		echo '<div class="history_ticket">';
		foreach($stations as $station)
		{
			if($station->id == $el->id_from)
				echo '<p>Откуда: '.$station->name.'</p>';
		}
		foreach($stations as $station)
		{
			if($station->id == $el->id_to)
				echo '<p>Куда: '.$station->name.'</p>';
		}
		echo '<p>Вагон: '.$el->traintype->name.'</p>';
		echo '<p>Дата и время покупки: '.$el->date_buy.'</p>';
		echo '<p>Дата и время поездки: '.$el->date_start.'</p>';
		echo '<p>Цена билета: '.$el->price.' руб.</p>';
		echo '</div>';
	}
	?>
</div>