<div class="content_container">
	<h2>Поезда</h2>
	<a href="addtrain" class="btn">Добавить</a>
	<a href="trains_info" class="btn">Версия для пользователей</a>
	<table border="1">
		<tr class="title">
			<td>ID</td>
			<td>Название</td>
			<td>Информация</td>
			<td>Изображение</td>
			<td>Действие</td>
		</tr>
	<?php
	foreach($model as $el)
	{
		$el->info = nl2br($el->info);
		echo '<tr>';
			echo '<td>'.$el->id.'</td>';
			echo '<td>'.$el->name.'</td>';
			echo '<td><div class="info">'.$el->info.'</div></td>';
			echo '<td><img src="/web/'.$el->image.'"></td>';
			echo '<td><a href="updatetrain?id='.$el->id.'">Редактировать</a><br><a href="deletetrain?id='.$el->id.'">Удалить</a></</td>';				
		echo '</tr>';
	}
	?>
	</table>
</div>