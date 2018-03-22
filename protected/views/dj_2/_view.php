<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_dj')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_dj),array('view','id'=>$data->id_dj)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('opcion')); ?>:</b>
	<?php echo CHtml::encode($data->opcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>