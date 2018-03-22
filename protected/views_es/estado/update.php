<?php
$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->id_estado=>array('view','id'=>$model->id_estado),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Estado','url'=>array('index')),
	array('label'=>'Crear Estado','url'=>array('create')),
	array('label'=>'VerEstado','url'=>array('view','id'=>$model->id_estado)),
	array('label'=>'Administrar Estado','url'=>array('admin')),
	);
	?>

	
        <span class="ez">Actualización del Estado <?php echo $model->id_estado; ?></span>
<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>