<div class="content_container">
	<h2>Расписание</h2>
	<?php 
	if(Yii::$app->session['id'] == 1)
	{
		echo '<a href="addtimetable" class="btn">Добавить</a>';
	}
	?>
	
	<table border='1'>
		<tr class="title">
			<?php
			$today = date("Y-m-d H:i:s", strtotime("+3 hours"));
			if(Yii::$app->session['id'] == 1)
			{
				echo '<td>ID</td>';
			}
			?>
			<td>Поезд</td>
			<td>Откуда</td>
			<td>Куда</td>
			<td>Дата и время отбытия</td>
			<td>Дата и время прибытия</td>
			<td>Статус</td>
			<td>Количество билетов</td>
			<td>Билеты</td>
			<?php 
			if(Yii::$app->session['id'] == 1)
			{
				echo '<td>Действие</td>';
			}
			?>
			
		</tr>
		<tr>
			<?php
			foreach($model as $el)
			{
				echo '<tr>';
					if(Yii::$app->session['id'] == 1)
					{
						echo '<td>'.$el->id.'</td>';
					}
					echo '<td><a href="train_info?id='.$el->train->id.'">'.$el->train->name.'</a></td>';
					foreach($stations as $station)
					{
						if($station->id == $el->id_from)
							echo '<td>'.$station->name.'</td>';
					}
					foreach($stations as $station)
					{
						if($station->id == $el->id_to)
							echo '<td>'.$station->name.'</td>';
					}
					echo '<td>'.$el->date_start.'</td>';
					echo '<td>'.$el->date_end.'</td>';
					if($el->date_start < $today && $el->date_end > $today)
					{
						echo '<td>В пути</td>';
						echo '<td>'.$el->count.'</td>';
						echo '<td>Поезд уже в пути</td>';
					}
					else if($today > $el->date_end)
					{
						echo '<td>На месте</td>';
						echo '<td>'.$el->count.'</td>';
						echo '<td>Поезд уже на месте</td>';
					}
					else
					{
						echo '<td>Ожидает</td>';
						echo '<td>'.$el->count.'</td>';
						if($el->count == 0)
							echo '<td>Нет в наличии</td>';
						else
							echo '<td><a href="ticket?id='.$el->id.'&status=Покупка">Купить</a><br><a href="ticket?id='.$el->id.'&status=Бронь">Забронировать</a></td>';
					}
					
					if(Yii::$app->session['id'] == 1)
					{
						echo '<td><a href="updatetimetable?id='.$el->id.'">Редактировать</a><br><a href="deletetimetable?id='.$el->id.'">Удалить</a></</td>';
					}					
				echo '</tr>';
			}
			?>
		</tr>
	</table>
</div>

