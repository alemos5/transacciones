<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Empresas','url'=>array('index')),
array('label'=>'Crear Empresa','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('empresa-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez">Administración de Empresas</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'empresa-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_empresa',
		'empresa',
		'descripcion',
//		'estatus',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>