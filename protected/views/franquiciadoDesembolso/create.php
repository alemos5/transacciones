<?php
$this->breadcrumbs=array(
	'Franquiciado Desembolsos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Desembolso Franquiciado','url'=>array('index')),
array('label'=>'Administrar Desembolso Franquiciado','url'=>array('admin')),
);
?>

<span class="ez">Create Desembolsos Franquiciado </span>
<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>