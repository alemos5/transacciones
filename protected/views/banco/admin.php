<?php
$this->breadcrumbs=array(
	'Bancos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Banco','url'=>array('index')),
array('label'=>'Create Banco','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('banco-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span  class="ez">Administración de Bancos</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'banco-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
            //'id_banco',
		//'id_pais',
		'banco',
        array(
            'filter'=>CHtml::listData(Pais::model()->findAll(),'id_pais','pais'),
            'name'=>'id_pais',
            'type'=>'raw',
            'value'=>'$data->idPais->pais',
        ),
        //'banco',
        //'siglas',
        //'estatus',
        array(
            'filter'=>CHtml::listData(Estatus::model()->findAll(),'estatus','estatus_titulo'),
            'name'=>'estatus',
            'type'=>'raw',
            'value'=>'$data->idEstatus->estatus_titulo',
        ),
		'siglas',
		//'estatus',
    array(
    'class'=>'booster.widgets.TbButtonColumn',
    ),
    ),
    )); ?>
</div>