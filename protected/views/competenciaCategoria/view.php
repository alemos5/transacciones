<?php
$this->breadcrumbs=array(
	'Competence Category'=>array('index'),
	$model->id_competencia_categoria,
);

$this->menu=array(
array('label'=>'List  Competence Category','url'=>array('index')),
array('label'=>'Create  Competence Category','url'=>array('create')),
array('label'=>'Update  Competence Category','url'=>array('update','id'=>$model->id_competencia_categoria)),
array('label'=>'Delete  Competence Category','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_competencia_categoria),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage  Competence Category','url'=>array('admin')),
);
?>

<h1>View  Competence Category #<?php echo $model->id_competencia_categoria; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_competencia_categoria',
		'id_copetencia',
		'costo',
		'id_categoria',
),
)); ?>
