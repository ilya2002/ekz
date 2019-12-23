<div class="content_container" >
	<h2><?= 'Логин: '.$model->login ?></h2>
	<h2><?= 'Ф.И.О.: '.$model->fio ?></h2>
	<a href="logout" class="btn">Выйти</a>
		<?php 
		if(Yii::$app->session['id'] == '1')
		{
			echo "<ul>
					<a href='station'><li>Станции</li></a>
					<a href='train'><li>Поезда</li></a>
					<a href='timetable'><li>Расписание</li></a>
					<a href='tickets'><li>Билеты</li></a>
				</ul>";
		}
		else
		{
			echo "<ul>
					<a href='history?id=".$model->id."'><li>История поездок</li></a>
					<a href='trains_info'><li>Поезда</li></a>
					<a href='timetable'><li>Расписание</li></a>
					<a href='book?id=".$model->id."'><li>Забронированные билеты</li></a>
				</ul>";
		}
		?>
</div>