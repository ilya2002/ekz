<div class="content_container">
	<h2>Станции</h2>
	<a href="addstation" class="btn">Добавить</a>
	<table border='1'>
		<tr class="title">
			<td>ID</td>
			<td>Название</td>
			<td>Действие</td>
		</tr>
		<tr>
			<?php
			foreach($model as $el)
			{
				echo '<tr>';
					echo '<td>'.$el->id.'</td>';
					echo '<td>'.$el->name.'</td>';
					echo '<td><a href="updatestation?id='.$el->id.'">Редактировать</a><br><a href="deletestation?id='.$el->id.'">Удалить</a></</td>';					
				echo '</tr>';
			}
			?>
		</tr>
	</table>
</div>