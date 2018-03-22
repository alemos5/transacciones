<?php
$this->breadcrumbs=array(
	'Competences'=>array('index'),
	$model->id_copetencia,
);

$this->menu=array(
array('label'=>__('Competence List'),'url'=>array('index')),
array('label'=>__('Create Competence'),'url'=>array('create')),
array('label'=>__('Update Competence'),'url'=>array('update','id'=>$model->id_copetencia)),
array('label'=>__('Delete Competence'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_copetencia),'confirm'=>__('Are you sure you want to delete this item?'))),
array('label'=>__('Manage Competence'),'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('View Competencia #'); ?><?php echo $model->id_copetencia; ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>array(
            'id_copetencia',
            'visible',
            'estatus',
            'img',
            'descripcion',
            'fecha_copetencia',
            'valor_competido',
        ),
    )); ?>

</div>



