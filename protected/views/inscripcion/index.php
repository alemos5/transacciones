<?php
$this->breadcrumbs=array(
	'Subscription',
);

$this->menu=array(
//array('label'=>'Crear Inscripción','url'=>array('create')),
//array('label'=>'Administrar Inscripción','url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Subscriptions'); ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>