<?php
$this->breadcrumbs=array(
	'Tipo Categorias'=>array('index'),
	$model->id_tipo_categoria,
);

$this->menu=array(
array('label'=>'List TipoCategoria','url'=>array('index')),
array('label'=>'Create TipoCategoria','url'=>array('create')),
array('label'=>'Update TipoCategoria','url'=>array('update','id'=>$model->id_tipo_categoria)),
array('label'=>'Delete TipoCategoria','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_categoria),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TipoCategoria','url'=>array('admin')),
);
?>

<h1>View TipoCategoria #<?php echo $model->id_tipo_categoria; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tipo_categoria',
		'tipo',
		'descripcion',
),
)); ?>
