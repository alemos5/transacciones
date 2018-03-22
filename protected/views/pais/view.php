<?php
$this->breadcrumbs=array(
	'Paises'=>array('index'),
	$model->id_pais,
);

$this->menu=array(
array('label'=>'Listar País','url'=>array('index')),
array('label'=>'Crear País','url'=>array('create')),
array('label'=>'Actualizar País','url'=>array('update','id'=>$model->id_pais)),
array('label'=>'Eliminar País','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pais),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Paises','url'=>array('admin')),
);
?>

<span  class="ez">Detallar País</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_pais',
		'Code',
		'pais',
		'nombre_largo',
		'Continent',
		'Region',
		'SurfaceArea',
		'IndepYear',
		'Population',
		'LifeExpectancy',
		'GNP',
		'GNPOld',
		'LocalName',
		'GovernmentForm',
		'HeadOfState',
		'Capital',
		'codigo',
		'calling_code',
		'permitido',
),
)); ?>
</div>
