<?php
$this->breadcrumbs=array(
	'Organizacion Rondas',
);

$this->menu=array(
array('label'=>'Create OrganizacionRonda','url'=>array('create')),
array('label'=>'Manage OrganizacionRonda','url'=>array('admin')),
array('label'=>'Final','url'=>array('organizacionRonda/final')),
array('label'=>'Semifinal','url'=>array('organizacionRonda/semifinal')),
array('label'=>'Play off','url'=>array('organizacionRonda/eliminatoria')),
);
?>

<span class="ez"><?php echo __('Event organization'); ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>