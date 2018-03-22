<?php
/* @var $this EscuelaController */
/* @var $data Escuela */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_escuela')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_escuela), array('view', 'id'=>$data->id_escuela)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('escuela')); ?>:</b>
	<?php echo CHtml::encode($data->escuela); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>