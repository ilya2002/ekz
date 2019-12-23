<div class="content-container">
	<h2>Сотрудники</h2>
	 <div class="sotrudniki">
<?php 
foreach ($model as $el) {
	echo "<div class=human>
<a href='cabinet?id=".$el->id."'> ".$el->fio. " - " .$el->post->name."</a>
<hr>
</div>";
}
?>
	 </div>
	</div>
