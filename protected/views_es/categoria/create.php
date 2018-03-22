<?php
$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Categorías','url'=>array('index')),
array('label'=>'Administrar Categorías','url'=>array('admin')),
);
?>


<span class="ez">Crear una nueva categoría</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'categoriaItems'=>$categoriaItems)); ?>
</div>