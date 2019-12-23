<div class="content-container">
	<h2>Мои задачи:</h2>
	 <div class="sotrudniki">
<?php 
foreach ($model as $el) {
	if ($el->tasks->process != 'выполнено'
	){
	echo "<div class=human>
<a href='vypol?id=".$el->tasks->id."'> " .$el->tasks->name. "  -	" .$el->tasks->start. "  -  " .$el->tasks->end."</a>
<hr>

</div>";
}}
?>
	 </div>
	</div>
