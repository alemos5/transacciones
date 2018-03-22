<?php
$this->breadcrumbs=array(
	'Consolidaciones'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Consolidaciones','url'=>array('index')),
array('label'=>'Administrar Consolidaciones','url'=>array('admin')),
);
?>

<span  class="ez">Crear Consolidaciones</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>