<div class="content_container">
	<h2>Забронированные билеты</h2>
	<?php 
	foreach($model as $el)
	{
		if($el->status != 'Отменено' || $el->status != 'Срок брони истёк')
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
			echo '<p>Дата и время прибытия поезда: '.$el->date_start.'</p>';
			echo '<p>Дата и время отбытия поезда: '.$el->date_end.'</p>';
			echo '<p>Цена билета: '.$el->price.' руб.</p>';
			echo '<a href="payment?id_to='.$el->id_to.
						'&id_from='.$el->id_from.
						'&date_start='.$el->date_start.
						'&date_end='.$el->date_end.
						'&id_traintype='.$el->id_traintype.
						'&fio='.$el->fio.
						'&birthday='.$el->birthday.
						'&phone='.$el->phone.
						'&id_tickettype='.$el->id_tickettype.
						'&passport='.$el->passport.
						'&price='.$el->price.'" class="btn">Оплатить</a>';
			echo '<a href="confirm_ticket?id='.$el->id.'&status=Отменено" class="btn">Отменить</a>';
			echo '</div>';
		}
	}
	?>
</div>