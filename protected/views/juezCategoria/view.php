<?php
$this->breadcrumbs=array(
	'Juez Categorias'=>array('index'),
	$model->id_juez_categoria,
);

$this->menu=array(
array('label'=>'List JuezCategoria','url'=>array('index')),
array('label'=>'Create JuezCategoria','url'=>array('create')),
array('label'=>'Update JuezCategoria','url'=>array('update','id'=>$model->id_juez_categoria)),
array('label'=>'Delete JuezCategoria','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_juez_categoria),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage JuezCategoria','url'=>array('admin')),
);
?>

<h1>View JuezCategoria #<?php echo $model->id_juez_categoria; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_juez_categoria',
		'id_juez',
		'id_competencia',
		'id_categoria',
),
)); ?>
