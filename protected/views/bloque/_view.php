<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_bloque')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bloque),array('view','id'=>$data->id_bloque)); ?>
	<br />

	/*<b><?php echo CHtml::encode($data->getAttributeLabel('bloque')); ?>:</b>
	<?php echo CHtml::encode($data->bloque); ?>
	<br />*/

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>