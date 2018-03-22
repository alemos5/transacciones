<?php
$this->breadcrumbs=array(
	'Tipo Pagos'=>array('index'),
	$model->id_tipo_pago=>array('view','id'=>$model->id_tipo_pago),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoPago','url'=>array('index')),
	array('label'=>'Create TipoPago','url'=>array('create')),
	array('label'=>'View TipoPago','url'=>array('view','id'=>$model->id_tipo_pago)),
	array('label'=>'Manage TipoPago','url'=>array('admin')),
	);
	?>

	<h1>Update TipoPago <?php echo $model->id_tipo_pago; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>