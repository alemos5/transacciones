<?php
$this->breadcrumbs=array(
	'Tipo Cobros'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Tipos de Cobro','url'=>array('index')),
array('label'=>'Crear Tipo de Cobro','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tipo-cobro-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<span class="ez">Administración de Tipos de Cobro</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tipo-cobro-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_tipo_cobro',
		'tipo_cobro',
//		'estatus',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>