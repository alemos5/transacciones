<?php
$this->breadcrumbs=array(
	'Bancos'=>array('index'),
	$model->id_banco=>array('view','id'=>$model->id_banco),
	'Update',
);

$this->menu=array(
array('label'=>'Listar Banco','url'=>array('index')),
array('label'=>'Crear Banco','url'=>array('create')),
array('label'=>'Detallar Banco','url'=>array('view','id'=>$model->id_banco)),
array('label'=>'Administración Banco','url'=>array('admin')),
);
?>

<span  class="ez">Actualizar Banco <?php echo $model->id_banco; ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?></div>
