<div class="content_container">
	<h2>Билеты</h2>
	
	<table border='1'>
		<tr class="title">
			<td>ID</td>
			<td>Вагон</td>
			<td>Откуда</td>
			<td>Куда</td>
			<td>Дата и время отбытия</td>
			<td>Дата и время прибытия</td>
			<td>Ф.И.О</td>
			<td>Серия паспорта</td>
			<td>Дата рождения</td>
			<td>Тип билета</td>
			<td>Дата заказа</td>
			<td>Номер банковской карты</td>
			<td>cvc</td>
			<td>Статус</td>
			<td>Действие</td>	
		</tr>
		<tr>
			<?php
			$today = date("Y-m-d H:i:s", strtotime("+3 hours"));
			foreach($model as $el)
			{
				if($el->date_end >= $today ||
					(($el->status != 'Отменено' || $el->status != 'Срок брони истёк') &&
					$el->date_end >= date("Y-m-d H:i:s", strtotime($el->date_end."+1 days"))))
                {
					echo '<tr>';
						echo '<td>'.$el->id.'</td>';
						echo '<td>'.$el->traintype->name.'</td>';
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
						echo '<td>'.$el->fio.'</td>';
						echo '<td>'.$el->passport.'</td>';
						echo '<td>'.$el->birthday.'</td>';
						echo '<td>'.$el->tickettype->name.'</td>';
						echo '<td>'.$el->date_buy.'</td>';
						echo '<td>'.$el->card.'</td>';
						echo '<td>'.$el->cvc.'</td>';
						
						if($el->status == 'Бронь')
						{
							if($today >= date("Y-m-d H:i:s", strtotime($el->date_buy."+1 days")))
							{
								$el->status = 'Срок брони истёк';
								$el->save();
								echo '<td>'.$el->status.'</td>';
							}
							else
							{
								echo '<td>'.$el->status.'</td>';
							}
						}
						else
						{
							echo '<td>'.$el->status.'</td>';
						}
						
						if($el->status == 'Бронь')
						{
							echo '<td><a href="confirm_ticket?id='.$el->id.'&status=Отменено">Отменить</a></td>';
						}
						else if($el->status == 'Отменено' || $el->status == 'Продано' || $el->status == 'Срок брони истёк')
						{
							echo '<td></td>';
						}
						else
						{
							echo '<td><a href="confirm_ticket?id='.$el->id.'&status=Продано">Потвердить</a></td>';
						}
					echo '</tr>';
				}
			}
			?>
		</tr>
	</table>
</div>

