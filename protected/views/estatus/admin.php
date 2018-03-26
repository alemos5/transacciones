<?php
$this->breadcrumbs=array(
	'Estatuses'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Estatus','url'=>array('index')),
array('label'=>'Create Estatus','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('estatus-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span  class="ez">Administración de Estatuses</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'estatus-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
    		'estatus',
		'estatus_titulo',
    array(
    'class'=>'booster.widgets.TbButtonColumn',
    ),
    ),
    )); ?>
</div>