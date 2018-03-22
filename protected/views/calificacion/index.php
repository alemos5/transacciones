<?php
$this->breadcrumbs=array(
	'Qualification',
);

$this->menu=array(
array('label'=>'Create Qualification','url'=>array('create')),
array('label'=>'Manage Qualification','url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Grade history'); ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>
