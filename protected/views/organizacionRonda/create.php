<?php
$this->breadcrumbs=array(
	'Organizacion Rondas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List OrganizacionRonda','url'=>array('index')),
array('label'=>'Manage OrganizacionRonda','url'=>array('admin')),
array('label'=>'Final','url'=>array('organizacionRonda/final')),
array('label'=>'Semifinal','url'=>array('organizacionRonda/semifinal')),
array('label'=>'Play off','url'=>array('organizacionRonda/eliminatoria')),
);
?>

<span class="ez"><?php echo __('Create Event organization'); ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>