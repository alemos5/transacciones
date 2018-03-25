<?php
$this->breadcrumbs=array(
	'Monedas'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Moneda','url'=>array('index')),
array('label'=>'Create Moneda','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('moneda-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span  class="ez">Administración de Monedas</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'moneda-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
    		'id_moneda',
		'moneda',
		'alias',
		'estatus',
    array(
    'class'=>'booster.widgets.TbButtonColumn',
    ),
    ),
    )); ?>
</div>