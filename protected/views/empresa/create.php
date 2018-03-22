<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Empresas','url'=>array('index')),
array('label'=>'Administrar Empresas','url'=>array('admin')),
);
?>

<span  class="ez">Crear una nueva empresa</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>