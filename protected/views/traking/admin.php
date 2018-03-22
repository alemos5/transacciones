<?php
$this->breadcrumbs=array(
	'Trakings'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar Tracking','url'=>array('index')),
array('label'=>'Crear Tracking','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('traking-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez">Administrar Tracking</span>



<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'traking-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
//		'id_traking',
		'traking',
		'fecha',
//		'id_usuario',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>