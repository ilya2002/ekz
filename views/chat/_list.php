<?php
/**
 * @var yiiwebView $this
 * @var yiidbActiveQuery $messagesQuery
 */
?>
<?= yiiwidgetsListView::widget([
    'itemView' => '_row',
    'layout' => '{items}',
    'dataProvider' => new yiidataActiveDataProvider([
        'query' => $messagesQuery,
        'pagination' => false
    ])
]) ?>