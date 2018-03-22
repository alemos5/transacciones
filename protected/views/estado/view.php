<?php
$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->id_estado,
);

$this->menu=array(
array('label'=>'List State','url'=>array('index')),
array('label'=>'Create State','url'=>array('create')),
array('label'=>'Update State','url'=>array('update','id'=>$model->id_estado)),
array('label'=>'Delete State','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_estado),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage State','url'=>array('admin')),
);
?>

<span class="ez">Check State #<?php echo $model->id_estado; ?></span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_estado',
		'nombre',
		'estatus',
),
)); ?>
</div>