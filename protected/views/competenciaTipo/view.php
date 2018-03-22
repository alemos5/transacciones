<?php
$this->breadcrumbs=array(
	'Competence Type'=>array('index'),
	$model->id_competencia_tipo,
);

$this->menu=array(
array('label'=>'List  Competence Type','url'=>array('index')),
array('label'=>'Create  Competence Type','url'=>array('create')),
array('label'=>'Update  Competence Type','url'=>array('update','id'=>$model->id_competencia_tipo)),
array('label'=>'Delete  Competence Type','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_competencia_tipo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage  Competence Type','url'=>array('admin')),
);
?>

<h1>View  Competence Type #<?php echo $model->id_competencia_tipo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_competencia_tipo',
		'id_copetencia',
		'id_tipo_categoria',
		'costo',
		'estatus',
),
)); ?>
