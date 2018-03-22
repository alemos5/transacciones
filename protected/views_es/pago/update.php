<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->id_pago=>array('view','id'=>$model->id_pago),
	'Actualizar',
);

	$this->menu=array(
//	array('label'=>'Listar Pagos Reportados','url'=>array('index')),
//	array('label'=>'Reportar Pago','url'=>array('create')),
//	array('label'=>'Detallar Pago','url'=>array('view','id'=>$model->id_pago)),
//	array('label'=>'Administrar Pagos','url'=>array('admin')),
	);
	?>

	<span class="ez">Actualizar Pagos</span>

        <div class="pd-inner">
            <?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
        </div>