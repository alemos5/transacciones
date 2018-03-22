<?php
$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->id_estado=>array('view','id'=>$model->id_estado),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'List State','url'=>array('index')),
	array('label'=>'Create State','url'=>array('create')),
	array('label'=>'Check State','url'=>array('view','id'=>$model->id_estado)),
	array('label'=>'Manage State','url'=>array('admin')),
	);
	?>

	
        <span class="ez">Update of the State <?php echo $model->id_estado; ?></span>
<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>