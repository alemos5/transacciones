<?php
$this->breadcrumbs=array(
	'Clientes Subclientes'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Subcliente','url'=>array('index')),
array('label'=>'Administrar Subcliente','url'=>array('admin')),
);
?>

<span  class="ez">Crear Subclientes</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>