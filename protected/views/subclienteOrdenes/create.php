<?php
$this->breadcrumbs=array(
	'Subcliente Ordenes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Ordenes por Subcliente','url'=>array('index')),
array('label'=>'Administrar Ordenes por Subcliente','url'=>array('admin')),
);
?>

<span  class="ez">Crear Ordenes por subclientes</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>