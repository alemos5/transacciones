<?php
$this->breadcrumbs=array(
	'Tipo Productos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List TipoProducto','url'=>array('index')),
array('label'=>'Create TipoProducto','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tipo-producto-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span  class="ez">Administración de Tipo Productos</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'tipo-producto-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
    		//'id_tipo_producto',
		'tipo_producto',
		//'estatus',
        array(
            'filter'=>CHtml::listData(Estatus::model()->findAll(),'estatus','estatus_titulo'),
            'name'=>'estatus',
            'type'=>'raw',
            'value'=>'$data->idEstatus->estatus_titulo',
        ),
    array(
    'class'=>'booster.widgets.TbButtonColumn',
    ),
    ),
    )); ?>
</div>