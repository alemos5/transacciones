<?php
$this->breadcrumbs=array(
	'Estados'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Estado','url'=>array('index')),
array('label'=>'Administrar Estado','url'=>array('admin')),
);
?>

<span class="ez">Crear Estado</span>
<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>