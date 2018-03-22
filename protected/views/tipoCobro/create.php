<?php
$this->breadcrumbs=array(
	'Tipo Cobros'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Tipos de Cobros','url'=>array('index')),
array('label'=>'Administrar Tipos de Cobros','url'=>array('admin')),
);
?>

<span  class="ez">Crear un nuevo Tipo de Cobro</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>