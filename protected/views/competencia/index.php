<?php
$this->breadcrumbs=array(
	'Competences',
);

$this->menu=array(
array('label'=>__('Create Competences'),'url'=>array('create')),
array('label'=>__('Manage Competences'),'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __(Competences); ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>