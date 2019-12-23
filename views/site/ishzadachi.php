<div class="content-container">
	<h2>Исходящие задачи:</h2>
	 <div class="sotrudniki">
<?php 
foreach ($model as $el) {
	if ($el->process != 'выполнено'
	){
	echo "<div class=human>
<a href='zadacha?id=".$el->id."'> ".$el->name. "   -   " .$el->start. "   -   " .$el->end."</a>
<hr>

</div>";}
}
?>
	 </div>
	</div>
